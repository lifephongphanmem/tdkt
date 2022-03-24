<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\DanhMuc\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\dmquoctich;
use App\DSDiaBan;
use App\DSDonVi;
use App\Model\manage\ktcaccap\DangKyTd;
use App\Model\manage\ktcaccap\DangKyTd_KhenThuong;
use App\Model\manage\ktcaccap\DangKyTd_TieuChuan;
use App\Model\manage\ktcaccap\LapHoSoTd;
use App\Model\manage\ktcaccap\LapHoSoTd_KhenThuong;
use App\Model\manage\ktcaccap\LapHoSoTd_TieuChuan;
use App\model\manage\ktcaccap\laphosotdct;
use App\model\manage\ktcaccap\laphosotddf;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use App\model\manage\qltailieu\qlphongtrao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LapHoSoTdController extends Controller
{
    public function ThongTin(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_donvi = DSDonVi::all();
            $m_diaban = DSDiaBan::all();
            $inputs['madonvi'] = $inputs['madonvi'] ?? $m_donvi->first()->madonvi;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = DangKyTd::all();
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

                //
                $HoSo = $model_HoSo->where('kihieudhtd', $DangKy->kihieudhtd)
                    ->where('madonvi', $inputs['madonvi']);

                $DangKy->tendonvi = $m_donvi->where('madonvi', $DangKy->madonvi)->first()->tendonvi ?? '';

                $DangKy->sohoso = $model_HoSo->where('kihieudhtd', $DangKy->kihieudhtd)
                    ->wherein('trangthai',['CD'])->count();
                $DangKy->trangthai = $HoSo->first()->trangthai ?? 'CC';
                $DangKy->ngaychuyen = $HoSo->first()->ngaychuyen ?? '';
                $DangKy->hosodonvi = $HoSo->count();


            }

            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            //$model = LapHoSoTd::whereYear('ngayky', $inputs['nam'])->where('madonvi', session('admin')->madonvi)->get();
            return view('manage.ktcaccap.laphosotd.index')
                ->with('inputs', $inputs)
                ->with('model', $model)
                ->with('m_donvi', $m_donvi)
                ->with('m_diaban', $m_diaban)
                ->with('a_trangthaihoso', getTrangThaiTDKT())
                ->with('pageTitle', 'Danh sách hồ sơ thi đua');
        } else
            return view('errors.notlogin');
    }

    public function Them(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = LapHoSoTd::where('madonvi',$inputs['madonvi'])
                ->where('kihieudhtd',$inputs['kihieudhtd'])
                ->first();
            $model_khenthuong = LapHoSoTd_KhenThuong::where('madonvi',$inputs['madonvi'])
                ->where('kihieudhtd',$inputs['kihieudhtd'])
                ->get();
            $model_tieuchuan = LapHoSoTd_TieuChuan::where('madonvi',$inputs['madonvi'])
                ->where('kihieudhtd',$inputs['kihieudhtd'])
                ->get();
            //$m_donvi = DSDonVi::where('madonvi', $inputs['madonvi'])->first();
            $m_doituong = qldoituong::where('madonvi', $inputs['madonvi'])->get();
            $m_danhhieu = DangKyTd_KhenThuong::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            $m_tieuchuan = DangKyTd_TieuChuan::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            if($model == null) {
                $model = new LapHoSoTd();
                $model->madonvi = $inputs['madonvi'];
                $model->kihieudhtd = $inputs['kihieudhtd'];
            }
            $model->noidungpt = DangKyTd::where('kihieudhtd',$inputs['kihieudhtd'])
                ->first()->noidung;
            $m_donvi = DSDonVi::all();
            $m_diaban = DSDiaBan::all();
            //dd($inputs);
            return view('manage.ktcaccap.laphosotd.Them')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('model_khenthuong',$model_khenthuong->where('phanloai','CANHAN'))
                ->with('model_tapthe',$model_khenthuong->where('phanloai','TAPTHE'))
                ->with('model_tieuchuan',$model_tieuchuan)
                ->with('m_doituong',$m_doituong)
                ->with('m_danhhieu',$m_danhhieu)
                ->with('m_tieuchuan',$m_tieuchuan)
                ->with('a_danhhieu',array_column($m_danhhieu->toarray(),'tendanhhieutd','madanhhieutd'))
                ->with('a_donvi',array_column($m_donvi->toarray(),'tendonvi','madonvi'))
                ->with('m_donvi', $m_donvi)
                ->with('m_diaban', $m_diaban)
                ->with('pageTitle','Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function LuuHoSo(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            //dd($inputs);
            $inputs['trangthai'] = 'CC';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') thêm mới ';
            if(isset($inputs['totrinh'])){
                $filedk = $request->file('totrinh');
                $inputs['totrinh'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/totrinh/', $inputs['totrinh']);
            }
            if(isset($inputs['qdkt'])){
                $filedk = $request->file('qdkt');
                $inputs['qdkt'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/qdkt/', $inputs['qdkt']);
            }
            if(isset($inputs['bienban'])){
                $filedk = $request->file('bienban');
                $inputs['bienban'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/bienban/', $inputs['bienban']);
            }
            if(isset($inputs['tailieukhac'])){
                $filedk = $request->file('tailieukhac');
                $inputs['tailieukhac'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/tailieukhac/', $inputs['tailieukhac']);
            }

            $model = LapHoSoTd::where('kihieudhtd',$inputs['kihieudhtd'])->where('madonvi',$inputs['kihieudhtd'])->first();
            if($model == null){
                LapHoSoTd::create($inputs);
            }else{
                $model->update($inputs);
            }

            return redirect('/HoSoThiDua/ThongTin');
        }else
            return view('errors.notlogin');
    }

    public function ThemDoiTuong(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        $m_danhhieu = dmdanhhieutd::where('madanhhieutd', $inputs['madanhhieutd'])->first();
        //Chưa tối ưu và tìm kiếm trùng đối tượng
        $model = LapHoSoTd_KhenThuong::where('madt', $inputs['madt'])
            ->where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('madonvi', $inputs['madonvi'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->first();
        if ($model == null) {
            $model = new LapHoSoTd_KhenThuong();
            $model->madt = getdate()[0];
            $model->kihieudhtd = $inputs['kihieudhtd'];
            $model->phanloai = 'CANHAN';
            $model->madonvi = $inputs['madonvi'];
            $model->madanhhieutd = $inputs['madanhhieutd'];
            $model->ngaysinh = $inputs['ngaysinh'];
            $model->gioitinh = $inputs['gioitinh'];
            $model->chucvu = $inputs['chucvu'];
            $model->maccvc = $inputs['maccvc'];
            $model->lanhdao = $inputs['lanhdao'];
            $model->tendt = $inputs['tendt'];
            $model->save();
        } else {
            $model->madanhhieutd = $inputs['madanhhieutd'];
            $model->ngaysinh = $inputs['ngaysinh'];
            $model->gioitinh = $inputs['gioitinh'];
            $model->chucvu = $inputs['chucvu'];
            $model->maccvc = $inputs['maccvc'];
            $model->tendt = $inputs['tendt'];
            $model->save();
        }

        $modelct = LapHoSoTd_KhenThuong::where('kihieudhtd', $inputs['kihieudhtd'])
            ->where('phanloai', 'CANHAN')
            ->where('madonvi', $inputs['madonvi'])
            ->get();
        if (isset($modelct)) {

            $result['message'] = '<div class="row" id="dskhenthuong">';

            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table id="sample_3" class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên đối tượng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Ngày sinh</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giới tính</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Chức vụ</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Tên danh hiệu<br>đăng ký</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key = 1;
            foreach ($modelct as $ct) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td style="text-align: center">' . $key++ . '</td>';
                $result['message'] .= '<td>' . $ct->tendt . '</td>';
                $result['message'] .= '<td>' . getDayVn($ct->ngaysinh) . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->gioitinh . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->chucvu . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->madanhhieutd . '</td>';
                $result['message'] .= '<td>' .
                    '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getId(' . $ct->id . ')" ><i class="fa fa-trash-o"></i></button>' .
                    '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh(' . $ct->id . ')"><i class="fa fa-edit"></i></button>'
                    . '</td>';

                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function ThemDoiTuongTapThe(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        $m_donvi = DSDonVi::where('madonvi', $inputs['madonvi_kt'])->first();
        //Chưa tối ưu và tìm kiếm trùng đối tượng
        $model = LapHoSoTd_KhenThuong::where('madonvi_kt', $inputs['madonvi_kt'])
            ->where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('madonvi', $inputs['madonvi'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->first();
        if ($model == null) {
            $model = new LapHoSoTd_KhenThuong();
            $model->madonvi_kt = $inputs['madonvi_kt'];
            $model->tendonvi = $m_donvi->tendonvi ?? '';
            $model->kihieudhtd = $inputs['kihieudhtd'];
            $model->phanloai = 'TAPTHE';
            $model->madonvi = $inputs['madonvi'];
            $model->madanhhieutd = $inputs['madanhhieutd'];
            $model->save();
        } else {
            $model->madanhhieutd = $inputs['madanhhieutd'];
            $model->madonvi_kt = $inputs['madonvi_kt'];
            $model->tendonvi = $m_donvi->tendonvi ?? '';
            $model->save();
        }

        $modelct = LapHoSoTd_KhenThuong::where('kihieudhtd', $inputs['kihieudhtd'])
            ->where('phanloai', 'TAPTHE')
            ->where('madonvi', $inputs['madonvi'])
            ->get();
        if (isset($modelct)) {

            $result['message'] = '<div class="row" id="dskhenthuongtapthe">';

            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table id="sample_4" class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="5%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên đơn vi</th>';
            $result['message'] .= '<th style="text-align: center" width="30%">Tên danh hiệu<br>đăng ký</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key = 1;
            foreach ($modelct as $ct) {
                $result['message'] .= '<tr>';
                $result['message'] .= '<td style="text-align: center">' . $key++ . '</td>';
                $result['message'] .= '<td>' . $ct->tendonvi . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->madanhhieutd . '</td>';
                $result['message'] .= '<td>' .
                    '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getId(' . $ct->id . ')" ><i class="fa fa-trash-o"></i></button>' .
                    '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh(' . $ct->id . ')"><i class="fa fa-edit"></i></button>'
                    . '</td>';

                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function LayTieuChuan(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        $m_danhhieu = dmdanhhieutd::where('madanhhieutd', $inputs['madanhhieutd'])->first();
        //Chưa tối ưu và tìm kiếm trùng đối tượng
        $model = LapHoSoTd_TieuChuan::where('madt', $inputs['madt'])
            ->where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('madonvi', $inputs['madonvi'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->get();
        $model_tieuchuan = DangKyTd_TieuChuan::where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->get();

        if (isset($model_tieuchuan)) {

            $result['message'] = '<div class="row" id="dstieuchuan">';

            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table id="sample_4" class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tiêu chuẩn</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Bắt buộc</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Đạt điều kiên</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key = 1;
            foreach ($model_tieuchuan as $ct) {
                $ct->dieukien = $model->where('matieuchuandhtd', $ct->matieuchuandhtd)->first()->dieukien ?? 0;
                $result['message'] .= '<tr>';
                $result['message'] .= '<td style="text-align: center">' . $key++ . '</td>';
                $result['message'] .= '<td>' . $ct->tentieuchuandhtd . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->batbuoc . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->dieukien . '</td>';
                $result['message'] .= '<td>' .
                    '<button type="button" data-target="#modal-luutieuchuan" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="ThayDoiTieuChuan(' .chr(39). $ct->matieuchuandhtd . chr(39) .','. chr(39).$ct->tentieuchuandhtd.chr(39).')"><i class="fa fa-edit"></i></button>'
                    . '</td>';

                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function LuuTieuChuan(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        $m_danhhieu = dmdanhhieutd::where('madanhhieutd', $inputs['madanhhieutd'])->first();
        //Chưa tối ưu và tìm kiếm trùng đối tượng
        $model = LapHoSoTd_TieuChuan::where('madt', $inputs['madt'])
            ->where('matieuchuandhtd', $inputs['matieuchuandhtd'])
            ->where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('madonvi', $inputs['madonvi'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->first();

        //chưa lấy biến điều kiện đang dùng tạm để demo
        if($model == null) {
            $model = new LapHoSoTd_TieuChuan();
            $model->madt = $inputs['madt'];
            $model->matieuchuandhtd = $inputs['matieuchuandhtd'];
            $model->madanhhieutd = $inputs['madanhhieutd'];
            $model->madonvi = $inputs['madonvi'];
            $model->kihieudhtd = $inputs['kihieudhtd'];
            $model->dieukien = 1;
            $model->save();
        }else{
            $model->dieukien = 1;
            $model->save();
        }
        //
        $model = LapHoSoTd_TieuChuan::where('madt', $inputs['madt'])
            ->where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('madonvi', $inputs['madonvi'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->get();
        $model_tieuchuan = DangKyTd_TieuChuan::where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->get();

        if (isset($model_tieuchuan)) {

            $result['message'] = '<div class="row" id="dstieuchuan">';

            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table id="sample_4" class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tiêu chuẩn</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Bắt buộc</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Đạt điều kiên</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key = 1;
            foreach ($model_tieuchuan as $ct) {
                $ct->dieukien = $model->where('matieuchuandhtd', $ct->matieuchuandhtd)->first()->dieukien ?? 0;
                $result['message'] .= '<tr>';
                $result['message'] .= '<td style="text-align: center">' . $key++ . '</td>';
                $result['message'] .= '<td>' . $ct->tentieuchuandhtd . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->batbuoc . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->dieukien . '</td>';
                $result['message'] .= '<td>' .
                    '<button type="button" data-target="#modal-luutieuchuan" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="ThayDoiTieuChuan(' .chr(39). $ct->matieuchuandhtd . chr(39) .','. chr(39).$ct->tentieuchuandhtd.chr(39).')"><i class="fa fa-edit"></i></button>'
                    . '</td>';

                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $nhomdh = dmdanhhieutd::all();
            $nhomht = dmhinhthuckt::all();
            $nhomlh = dmloaihinhkt::all();
            $nhomqt = dmquoctich::all();
            $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            $m_phongtrao = qlphongtrao::all();
            $inputs['kihieudhtd'] = getdate()[0];
            $modelct = laphosotddf::where('kihieudhtd',$inputs['kihieudhtd'])
                ->get();
            return view('manage.ktcaccap.laphosotd.create')
                ->with('inputs', $inputs)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('modeldt', $modeldt)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('modelct', $modelct)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['trangthai'] = 'CC';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') thêm mới ';
            if(isset($inputs['totrinh'])){
                $filedk = $request->file('totrinh');
                $inputs['totrinh'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/totrinh/', $inputs['totrinh']);
            }
            if(isset($inputs['qdkt'])){
                $filedk = $request->file('qdkt');
                $inputs['qdkt'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/qdkt/', $inputs['qdkt']);
            }
            if(isset($inputs['bienban'])){
                $filedk = $request->file('bienban');
                $inputs['bienban'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/bienban/', $inputs['bienban']);
            }
            if(isset($inputs['tailieukhac'])){
                $filedk = $request->file('tailieukhac');
                $inputs['tailieukhac'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/tailieukhac/', $inputs['tailieukhac']);
            }
            $model = new LapHoSoTd();
            $model->create($inputs);
            $m_dt = laphosotddf::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            if(isset($m_dt))
            {
                foreach($m_dt as $chitiet)
                {
                    $a_dt = $chitiet->toarray();
                    unset($a_dt['id']);
                    $modelct = new laphosotdct();
                    $modelct->create($a_dt);
                    $chitiet->delete();
                }
            }
            return redirect('laphosotd');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = LapHoSoTd::find($id);
            $nhomdh = dmdanhhieutd::all();
            $nhomht = dmhinhthuckt::all();
            $nhomlh = dmloaihinhkt::all();
            $nhomqt = dmquoctich::all();
            $m_phongtrao = qlphongtrao::all();
            $modelct = laphosotdct::where('kihieudhtd',$model->kihieudhtd)
                ->get();
            $m_pl = dmphanloaict::all();
            $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            return view('manage.ktcaccap.laphosotd.edit')
                ->with('model', $model)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('modelct', $modelct)
                ->with('m_pl', $m_pl)
                ->with('modeldt', $modeldt)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd::findOrFail($id);
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chỉnh sửa ';
            if(isset($inputs['totrinh'])){
                $filedk = $request->file('totrinh');
                $inputs['totrinh'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/totrinh/', $inputs['totrinh']);
            }
            if(isset($inputs['qdkt'])){
                $filedk = $request->file('qdkt');
                $inputs['qdkt'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/qdkt/', $inputs['qdkt']);
            }
            if(isset($inputs['bienban'])){
                $filedk = $request->file('bienban');
                $inputs['bienban'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/bienban/', $inputs['bienban']);
            }
            if(isset($inputs['tailieukhac'])){
                $filedk = $request->file('tailieukhac');
                $inputs['tailieukhac'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/tailieukhac/', $inputs['tailieukhac']);
            }
            $model->update($inputs);
            return redirect('laphosotd');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = LapHoSoTd::findOrFail($id);
            return view('manage.ktcaccap.laphosotd.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd::where('kihieudhtd',$inputs['kihieudhtd'])->where('madonvi',$inputs['madonvi'])->first();
            LapHoSoTd_TieuChuan::where('kihieudhtd',$model->kihieudhtd)->where('madonvi',$model->madonvi)->delete();
            LapHoSoTd_KhenThuong::where('kihieudhtd',$model->kihieudhtd)->where('madonvi',$model->madonvi)->delete();
            $model->delete();
            return redirect('HoSoThiDua/ThongTin?madonvi='.$model->madonvi);
        }else
            return view('errors.notlogin');
    }

    public function ChuyenHoSo(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd::where('kihieudhtd',$inputs['kihieudhtd'])->where('madonvi',$inputs['madonvi'])->first();
            //dd($model);
            $inputs['trangthai'] = 'CD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->tentaikhoan.') chuyển hồ sơ ';
            $inputs['ngaychuyen'] = date('Y-m-d H:i:s');
            $model->nguoichuyen = $inputs['nguoichuyen'];
            $model->update($inputs);
            return redirect('HoSoThiDua/ThongTin?madonvi='.$model->madonvi);
        }else
            return view('errors.notlogin');
    }

    public function checkkihieu(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['kihieudhtd'])) {
            $model = LapHoSoTd::where('kihieudhtd', $inputs['kihieudhtd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }

    public function LayLyDo(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();
        //Chưa tối ưu và tìm kiếm trùng đối tượng
        $model = LapHoSoTd::where('madonvi', $inputs['madonvi'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->first();
        //dd($inputs);

        $result['message'] = '<div class="col-md-12" id="showlido">';
        $result['message'] .= $model->lido;

        $result['message'] .= '</div>';
        $result['status'] = 'success';


        die(json_encode($result));
    }
}
