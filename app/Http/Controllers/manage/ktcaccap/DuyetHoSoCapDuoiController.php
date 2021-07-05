<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\Model\manage\ktcaccap\LapHoSoTd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DuyetHoSoCapDuoiController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            if(session('admin')->sadmin == 'ssa')
                $model = DangKyTd::whereYear('ngayky',$inputs['nam'])->get();
            else
                $model = LapHoSoTd::whereYear('ngayky',$inputs['nam'])
                    ->where('trangthai', 'DD')
                    ->where('macqcq',session('admin')->madonvi)
                    ->where('trangthaihuyen','<>', 'CC')
                    ->get();
            return view('manage.ktcaccap.duyethosocapduoi.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Xét duyệt danh sách hồ sơ đăng ký thi đua');
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

    public function back(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idback'];
            $model = LapHoSoTd::findorFail($id);
            $inputs['trangthaihuyen'] = 'BTL';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') trả hồ sơ';
            $model->update($inputs);
            return redirect('duyethosocapduoi');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = LapHoSoTd::findOrFail($id);
            return view('manage.ktcaccap.duyethosocapduoi.show')
                ->with('model', $model)
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