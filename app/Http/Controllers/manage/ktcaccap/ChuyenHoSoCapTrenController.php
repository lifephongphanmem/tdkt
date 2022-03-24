<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\DanhMuc\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\dmquoctich;
use App\Model\manage\ktcaccap\LapHoSoTd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ChuyenHoSoCapTrenController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            if(session('admin')->level == 'SSA')
                $model = LapHoSoTd::whereYear('ngayky',$inputs['nam'])->where('trangthai','DD')->get();
            else
                $model = LapHoSoTd::whereYear('ngayky',$inputs['nam'])
                    ->where('trangthai','<>','CC')
                    ->where('madonvi',session('admin')->madonvi)
                    ->get();
            return view('manage.ktcaccap.chuyenhosocaptren.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Danh sách hồ sơ thi đua');
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
            return view('manage.ktcaccap.chuyenhosocaptren.edit')
                ->with('model', $model)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd::findOrFail($id);
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
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
            return redirect('chuyenhosocaptren');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = LapHoSoTd::findOrFail($id);
            return view('manage.ktcaccap.chuyenhosocaptren.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function trans(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $request->all()['idtrans'];
            $model = LapHoSoTd::findorFail($id);
            //$inputs['trangthaihuyen'] = 'CD';
            $inputs['trangthai'] = 'CD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chuyển hồ sơ ';
            $inputs['ngaychuyen'] = date('Y-m-d H:i:s');
            $model->nguoichuyen = $inputs['nguoichuyen'];
            $model->update($inputs);
            //return redirect('chuyenhosocaptren');
            return redirect('laphosotd');
        }else
            return view('errors.notlogin');
    }

    public function back(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idback'];
            $model = LapHoSoTd::findorFail($id);
            $inputs['trangthai'] = 'BTL';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') trả hồ sơ';
            $model->update($inputs);
            return redirect('chuyenhosocaptren');
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
