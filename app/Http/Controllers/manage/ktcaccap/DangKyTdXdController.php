<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\Model\manage\ktcaccap\DangKyTd;
use App\Model\manage\ktcaccap\LapHoSoTd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DangKyTdXdController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = DangKyTd::whereYear('ngayky',$inputs['nam'])
                ->where('trangthai','<>', 'CC')
                ->get();
            return view('manage.ktcaccap.xetduyettd.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Xét duyệt danh sách đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function get(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idget'];
            $model = DangKyTd::findorFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') duyệt đăng ký';
            $model->ngaynhan = $inputs['ngaynhan'];
            $model->update($inputs);
            $a_hs = DangKyTd::find($id)->toarray();
            $a_hs['trangthai'] = 'CD';
            $a_hs['trangthai'] = 'CD';
            $a_hs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') tạo hồ sơ thi đua';
            $a_hs['kihieudhtd'] = getdate()[0];
            unset($a_hs['id']);
            $model = new LapHoSoTd();
            $model->create($a_hs);
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
