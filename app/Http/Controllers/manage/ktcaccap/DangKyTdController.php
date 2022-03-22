<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\DanhMuc\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\dmquoctich;
use App\dmtieuchuandhtd;
use App\DSDiaBan;
use App\DSDonVi;
use App\Model\manage\ktcaccap\DangKyTd;
use App\Model\manage\ktcaccap\DangKyTd_KhenThuong;
use App\Model\manage\ktcaccap\DangKyTd_TieuChuan;
use App\Model\manage\ktcaccap\dangkytdct;
use App\model\manage\ktcaccap\dangkytddf;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use App\model\manage\qltailieu\qlphongtrao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DangKyTdController extends Controller
{
    public function ThongTin(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            //dd($inputs);
            $m_donvi = DSDonVi::all();
            $m_diaban = DSDiaBan::all();
            $inputs['madonvi'] = $inputs['madonvi'] ?? $m_donvi->first()->madonvi;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = DangKyTd::whereYear('ngayky',$inputs['nam'])->where('madonvi',$inputs['madonvi'])->get();
            $modelpt = qlphongtrao::all();
            return view('manage.ktcaccap.dangkytd.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('modelpt',$modelpt)
                ->with('m_donvi',$m_donvi)
                ->with('m_diaban',$m_diaban)
                ->with('pageTitle','Danh sách đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function Them(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $nhomdh = dmdanhhieutd::all();
            $nhomht = dmhinhthuckt::all();
            $nhomlh = dmloaihinhkt::all();
            $nhomqt = dmquoctich::all();
            //$modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            $m_phongtrao = qlphongtrao::all();
            $inputs['kihieudhtd'] = getdate()[0];
            $model = new DangKyTd();
            $model->kihieudhtd = (string)getdate()[0];
            $model->madonvi = $inputs['madonvi'];
            $model_khenthuong = DangKyTd_KhenThuong::where('kihieudhtd',(string)$model->kihieudhtd)->get();
            $model_tieuchuan = DangKyTd_TieuChuan::where('kihieudhtd',(string)$model->kihieudhtd)->get();
            return view('manage.ktcaccap.dangkytd.create')
                ->with('inputs', $inputs)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('a_danhhieu', array_column(dmdanhhieutd::all()->toArray(),'tendanhhieutd','madanhhieutd'))
                ->with('a_tieuchuan', array_column(dmtieuchuandhtd::all()->toArray(),'tentieuchuandhtd','matieuchuandhtd'))
                ->with('m_phongtrao',$m_phongtrao)
                ->with('model',$model)
                ->with('model_khenthuong',$model_khenthuong)
                ->with('model_tieuchuan',$model_tieuchuan)
                //->with('modeldt',$modeldt)
                ->with('pageTitle', 'Danh sách đăng ký thi đua thêm mới');
        } else
            return view('errors.notlogin');
    }


    public function store(Request $request){
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
            $model = DangKyTd::where('kihieudhtd',$inputs['kihieudhtd'])->first();
            if($model == null){
                DangKyTd::create($inputs);
            }else{
                $model->update($inputs);
            }


            return redirect('/DanhKyThiDua/ThongTin');
        }else
            return view('errors.notlogin');
    }

    public function Sua(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DangKyTd::where('kihieudhtd', $inputs['kihieudhtd'])->first();
            $nhomdh = dmdanhhieutd::all();
            $nhomht = dmhinhthuckt::all();
            $nhomlh = dmloaihinhkt::all();
            $nhomqt = dmquoctich::all();
            $m_phongtrao = qlphongtrao::all();
            $model_khenthuong = DangKyTd_KhenThuong::where('kihieudhtd', $inputs['kihieudhtd'])->get();
            $model_tieuchuan = DangKyTd_TieuChuan::where('kihieudhtd', $inputs['kihieudhtd'])->get();

            return view('manage.ktcaccap.dangkytd.create')
                ->with('model', $model)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('a_danhhieu', array_column(dmdanhhieutd::all()->toArray(), 'tendanhhieutd', 'madanhhieutd'))
                ->with('a_tieuchuan', array_column(dmtieuchuandhtd::all()->toArray(), 'tentieuchuandhtd', 'matieuchuandhtd'))
                ->with('model', $model)
                ->with('model_khenthuong', $model_khenthuong)
                ->with('model_tieuchuan', $model_tieuchuan)
                ->with('pageTitle', 'Danh sách đăng ký thi đua chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DangKyTd::findOrFail($id);
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
            return redirect('dangkytd');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = DangKyTd::findOrFail($id);
            return view('manage.ktcaccap.dangkytd.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = DangKyTd::findorFail($id);
            $model->delete();
            return redirect('dangkytd');
        }else
            return view('errors.notlogin');
    }

    public function trans(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $request->all()['idtrans'];
            $model = DangKyTd::findorFail($id);
            $inputs['trangthai'] = 'CD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chuyển hồ sơ ';
            $inputs['ngaychuyen'] = date('Y-m-d H:i:s');
            $model->nguoichuyen = $inputs['nguoichuyen'];
            $model->update($inputs);
            return redirect('dangkytd');
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

        $inputs = $request->all();
        if(isset($inputs['id'])){
            $model = DangKyTd::where('id',$inputs['id'])
                ->first();
            $result['message'] = '<div class="col-md-12" id="showlido">';
            $result['message'] .= '<label class="control-label">'.$model->lido.'</label>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function checkkihieu(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();
        if (isset($inputs['kihieudhtd'])) {
            $model = DangKyTd::where('kihieudhtd', $inputs['kihieudhtd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }

    public function ThemKhenThuong(Request $request)
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
        $model = DangKyTd_KhenThuong::where('madanhhieutd', $inputs['madanhhieutd'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->first();
        if ($model == null) {
            $model = new DangKyTd_KhenThuong();
            $model->madanhhieutd = $m_danhhieu->madanhhieutd;
            $model->kihieudhtd = $inputs['kihieudhtd'];
            $model->soluong = $inputs['soluong'];
            $model->tendanhhieutd = $m_danhhieu->tendanhhieutd;
            $model->phanloai = $m_danhhieu->phanloai;
            $model->save();
        } else {
            $model->soluong = $inputs['soluong'];
            $model->tendanhhieutd = $m_danhhieu->tendanhhieutd;
            $model->phanloai = $m_danhhieu->phanloai;
            $model->save();
        }

        $modelct = DangKyTd_KhenThuong::where('kihieudhtd', $inputs['kihieudhtd'])->get();
        if (isset($modelct)) {

            $result['message'] = '<div class="row" id="dskhenthuong">';

            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table id="sample_3" class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center" width="25%">Phân loại</th>';
            $result['message'] .= '<th style="text-align: center">Danh hiệu thi đua</th>';
            $result['message'] .= '<th style="text-align: center" width="8%">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key = 1;
            foreach ($modelct as $ct) {

                $result['message'] .= '<tr>';
                $result['message'] .= '<td style="text-align: center">' . $key++ . '</td>';
                $result['message'] .= '<td>' . $ct->phanloai . '</td>';
                $result['message'] .= '<td class="active">' . $ct->tendanhhieutd . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->soluong . '</td>';
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

    public function ThemTieuChuan(Request $request)
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
        $m_tieuchuan = dmtieuchuandhtd::where('matieuchuandhtd', $inputs['matieuchuandhtd'])->first();
        $model = DangKyTd_TieuChuan::where('matieuchuandhtd', $inputs['matieuchuandhtd'])
            ->where('kihieudhtd', $inputs['kihieudhtd'])->first();
        if ($model == null) {
            $model = new DangKyTd_TieuChuan();
            $model->kihieudhtd = $inputs['kihieudhtd'];
            $model->madanhhieutd = $m_tieuchuan->madanhhieutd;
            $model->tentieuchuandhtd = $m_tieuchuan->tentieuchuandhtd;
            $model->matieuchuandhtd = $m_tieuchuan->matieuchuandhtd;
            $model->batbuoc = $inputs['batbuoc'];
            $model->save();
        } else {
            $model->batbuoc = $inputs['batbuoc'];
            $model->tentieuchuandhtd = $m_tieuchuan->tentieuchuandhtd;
            $model->save();
        }

        $modelct = DangKyTd_TieuChuan::where('kihieudhtd', $inputs['kihieudhtd'])->get();
        if (isset($modelct)) {

            $result['message'] = '<div class="row" id="dstieuchuan">';

            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table id="sample_4" class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên danh hiệu</th>';
            $result['message'] .= '<th style="text-align: center">Tên tiêu chuẩn</th>';
            $result['message'] .= '<th style="text-align: center" width="8%">Bắt buộc</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key = 1;
            foreach ($modelct as $ct) {

                $result['message'] .= '<tr>';
                $result['message'] .= '<td style="text-align: center">' . $key++ . '</td>';
                $result['message'] .= '<td>' . $ct->madanhhieutd . '</td>';
                $result['message'] .= '<td class="active">' . $ct->tentieuchuandhtd . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $ct->batbuoc . '</td>';
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
}
