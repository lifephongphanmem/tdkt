<?php

namespace App\Http\Controllers\manage\vbpl\hoidap;

use App\dmdonvi;
use App\Model\manage\vbpl\qlhoidap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QlTraLoiController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] :'TD';
            $nhomql = dmdonvi::select('madonvi','tendv')
                ->where('caphanhchinh','HUYEN')->orwhere('caphanhchinh','TINH')->get();
            $model = qlhoidap::whereYear('ngaythang',$inputs['nam'])
                ->where('phanloai',$inputs['phanloai'])
                ->where('madonvi',$inputs['CD'])
                ->get();
            return view('manage.vbpl.qlhoidap.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('nhomql',$nhomql)
                ->with('pageTitle','Danh sách câu hỏi và trả lời');
        }else
            return view('errors.notlogin');
    }

    public function get(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idget'];
            $model = DangKyTd::findorFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') nhận hồ sơ';
            $model->ngaynhan = $inputs['ngaynhan'];
            $model->update($inputs);
            return redirect('duyetdktd');
        }else
            return view('errors.notlogin');
    }

    public function back(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idback'];
            $model = DangKyTd::findorFail($id);
            $inputs['trangthai'] = 'BTL';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') trả hồ sơ';
            $model->update($inputs);
            return redirect('duyetdktd');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = DangKyTd::findOrFail($id);
            return view('manage.ktcaccap.xetduyettd.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách đăng ký thi đua');
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
            $model = DangKyTd::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="col-md-12" id="showlido">';
            $result['message'] .= '<label class="control-label">'.$model->lido.'</label>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
}
