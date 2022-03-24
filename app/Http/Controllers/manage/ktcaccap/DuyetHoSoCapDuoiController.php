<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\DanhMuc\dmdanhhieutd;
use App\dmdonvi;
use App\dmloaihinhkt;
use App\DSDiaBan;
use App\DSDonVi;
use App\Model\manage\ktcaccap\DangKyTd;
use App\Model\manage\ktcaccap\DangKyTd_KhenThuong;
use App\Model\manage\ktcaccap\DangKyTd_TieuChuan;
use App\Model\manage\ktcaccap\dangkytdct;
use App\Model\manage\ktcaccap\LapHoSoTd;
use App\Model\manage\ktcaccap\LapHoSoTd_KhenThuong;
use App\model\manage\ktcaccap\laphosotdct;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use App\model\manage\qltailieu\qlphongtrao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DuyetHoSoCapDuoiController extends Controller
{
    public function ThongTin(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $m_donvi = DSDonVi::all();
            $m_diaban = DSDiaBan::all();
            $inputs['madonvi'] = $inputs['madonvi'] ?? $m_donvi->first()->madonvi;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = DangKyTd::where('madonvi',$inputs['madonvi'])->get();
            $model_HoSo = LapHoSoTd::all();
            $ngayHienTai = date('Y-m-d');
            foreach ($model as $DangKy) {
                if($DangKy->trangthai == 'CC'){
                    $DangKy->nhanhoso = 'CHUABATDAU';
                    if ($DangKy->tungay < $ngayHienTai && $DangKy->denngay > $ngayHienTai) {
                        $DangKy->nhanhoso = 'DANGNHAN';
                    }
                    if (strtotime($DangKy->denngay) < strtotime($ngayHienTai)) {
                        $DangKy->nhanhoso = 'KETTHUC';
                    }
                }else{
                    $DangKy->nhanhoso = 'KETTHUC';
                }

                $DangKy->tendonvi = $m_donvi->where('madonvi', $inputs['madonvi'])->first()->tendonvi ?? '';
                $DangKy->sohoso = $model_HoSo->where('kihieudhtd', $DangKy->kihieudhtd)
                    ->wherein('trangthai',['CD'])->count();
            }

            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');


            return view('manage.ktcaccap.duyethosocapduoi.ThongTin')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('m_donvi', $m_donvi)
                ->with('m_diaban', $m_diaban)
                ->with('a_trangthaihoso', getTrangThaiTDKT())
                ->with('pageTitle','Xét duyệt danh sách hồ sơ đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function DanhSach(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $m_dangky = DangKyTd::where('kihieudhtd',$inputs['kihieudhtd'])->first();
            $model = LapHoSoTd::where('kihieudhtd',$inputs['kihieudhtd'])->where('trangthai','CD')->orderby('ngaychuyen')->get();
            $m_donvi = DSDonVi::all();
            return view('manage.ktcaccap.duyethosocapduoi.DanhSach')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('m_dangky',$m_dangky)
                ->with('a_donvi', array_column($m_donvi->toArray(),'tendonvi','madonvi'))
                ->with('pageTitle','Danh sách hồ sơ đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function get(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idget'];
            $model = LapHoSoTd::findorFail($id);
            $inputs['trangthaihuyen'] = 'DD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') nhận hồ sơ';
            $model->ngaynhan = $inputs['ngaynhan'];
            $model->update($inputs);
            return redirect('duyethosocapduoi');
        }else
            return view('errors.notlogin');
    }

    public function TraLai(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idback'];
            $model = LapHoSoTd::findorFail($id);
            $inputs['lido'] = $inputs['lido'];
            $inputs['trangthai'] = 'BTL';
            $inputs['ngaychuyen'] = '';
            $inputs['ttthaotac'] = session('admin')->username . '(' . session('admin')->name . ') trả hồ sơ';
            $model->update($inputs);
            return redirect('XetDuyetHoSoThiDua/DanhSach?kihieudhtd=' . $model->kihieudhtd);
        } else
            return view('errors.notlogin');
    }

    public function KetQua(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_dangky = DangKyTd::where('kihieudhtd',$inputs['kihieudhtd'])->first();
            $m_tieuchuan = DangKyTd_TieuChuan::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            //dd($m_tieuchuan);
            $model_canhan = LapHoSoTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd'])->where('phanloai','CANHAN')->get();
            $model_tapthe = LapHoSoTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd'])->where('phanloai','TAPTHE')->get();
            $model_tieuchuan = LapHoSoTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            foreach ($model_canhan as $canhan){
                $canhan->tongtieuchuan = $m_tieuchuan->where('madanhhieutd',$canhan->madanhhieutd)->count();
                $canhan->tongdieukien = $model_tieuchuan->where('madanhhieutd',$canhan->madanhhieutd)
                    ->where('dieukien','1')->count();
            }
            foreach ($model_tapthe as $tapthe){
                $tapthe->tongtieuchuan = $m_tieuchuan->where('madanhhieutd',$tapthe->madanhhieutd)->count();
                $tapthe->tongdieukien = $model_tieuchuan->where('madanhhieutd',$tapthe->madanhhieutd)
                    ->where('dieukien','1')->count();
            }
            $m_donvi = DSDonVi::all();
            $m_danhhieu = DangKyTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            //$a_hinhthuckt = array_column(dmloaihinhkt::all()->toArray(), 'tenloaihinhkt', 'maloaihinhkt');
            return view('manage.ktcaccap.duyethosocapduoi.KetQua')
                ->with('inputs',$inputs)
                ->with('model_canhan',$model_canhan->sortby('tongdieukien'))
                ->with('model_tapthe',$model_tapthe->sortby('tongdieukien'))
                ->with('m_dangky',$m_dangky)
                ->with('a_donvi', array_column($m_donvi->toArray(),'tendonvi','madonvi'))
                ->with('a_danhhieu', array_column($m_danhhieu->toArray(),'tendanhhieutd','madanhhieutd'))
                ->with('a_hinhthuckt', array_column(dmloaihinhkt::all()->toArray(), 'tenloaihinhkt', 'maloaihinhkt'))
                ->with('pageTitle','Kết quả phong trào thi đua');

        } else
            return view('errors.notlogin');
    }

    public function LuuKetQua(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd_KhenThuong::findorFail($inputs['id_kq']);
            $model->ketqua = isset($inputs['dieukien_ltc']) ? 1 : 0;
            $model->maloaihinhkt = $inputs['maloaihinhkt_ltc'];
            $model->save();
            return redirect('XetDuyetHoSoThiDua/KetQua?kihieudhtd=' . $model->kihieudhtd);
        } else
            return view('errors.notlogin');
    }

    public function ChuyenDoiTuong(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd_chuyen'])
                ->where('ketqua','1')->get();
            $m_phongtrao = DangKyTd::where('kihieudhtd',$inputs['kihieudhtd_chuyen'])->first();
            $m_phongtrao->trangthai = 'CD';
            $m_phongtrao->save();
            foreach ($model as $chitiet) {
                $doituong = new qldoituong;
                $doituong->kihieudhtd = $chitiet->kihieudhtd;
                $doituong->madanhhieutd = $chitiet->madanhhieutd;
                $doituong->phanloai = $chitiet->phanloai;
                $doituong->madt = $chitiet->madt;
                $doituong->maccvc = $chitiet->maccvc;
                $doituong->tendt = $chitiet->tendt;
                $doituong->ngaysinh = $chitiet->ngaysinh;
                $doituong->gioitinh = $chitiet->gioitinh;
                $doituong->chucvu = $chitiet->chucvu;
                $doituong->lanhdao = $chitiet->lanhdao;
                $doituong->madonvi = $chitiet->madonvi;
                $doituong->tendonvi = $chitiet->tendonvi;
                $doituong->save();
            }
            return redirect('XetDuyetHoSoThiDua/KetQua?kihieudhtd=' . $inputs['kihieudhtd_chuyen']);
        } else
            return view('errors.notlogin');
    }

    public function InKetQua(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd_KhenThuong::findorfail($inputs['id']);
            $model->tendanhhieutd = dmdanhhieutd::where('madanhhieutd',$model->madanhhieutd)->first()->tendanhhieutd ?? '';
            $model->noidung = DangKyTd::where('kihieudhtd',$model->kihieudhtd)->first()->noidung ?? '';

            //dd($model);
            return view('reports.DonVi.InBangKhen')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = LapHoSoTd::findOrFail($id);
            $m_phongtrao = qlphongtrao::all();
            $modelct = laphosotdct::where('kihieudhtd',$model->kihieudhtd)
                ->get();
            $m_pl = dmphanloaict::all();
            $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            $m_donvi = dmdonvi::where('madonvi',$model->madonvi)->first();
            return view('manage.ktcaccap.duyethosocapduoi.show')
                ->with('model', $model)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('modelct', $modelct)
                ->with('m_pl', $m_pl)
                ->with('modeldt', $modeldt)
                ->with('m_donvi', $m_donvi)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function lydo(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        if(isset($inputs['id'])){
            $model = LapHoSoTd::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="col-md-12" id="showlido">';
            $result['message'] .= '<label class="control-label">'.$model->lido.'</label>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
}
