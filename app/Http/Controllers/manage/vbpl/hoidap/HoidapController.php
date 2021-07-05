<?php

namespace App\Http\Controllers\manage\vbpl\hoidap;

use App\dmdonvi;
use App\Model\manage\vbpl\qlhoidap;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HoidapController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] :'TD';
            $nhomql = dmdonvi::select('madonvi','tendv')
                ->where('caphanhchinh','HUYEN')->orwhere('caphanhchinh','TINH')->get();
            $model = qlhoidap::where('madonvi',session('admin')->madonvi)
                ->orwhere('donvinhan',session('admin')->madonvi)
                ->where('trangthai','<>','CC')
                ->where('trangthai','<>','BTL');
            $model = $model->where('phanloai',$inputs['phanloai'])
                ->whereYear('ngaythang',$inputs['nam'])->get();
            return view('manage.vbpl.qlhoidap.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('nhomql',$nhomql)
                ->with('pageTitle','Danh sách câu hỏi và trả lời');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $nhomql = dmdonvi::select('madonvi','tendv')
            ->where('caphanhchinh','HUYEN')->orwhere('caphanhchinh','TINH')->get();
            return view('manage.vbpl.qlhoidap.create')
                ->with('nhomql',$nhomql)
                ->with('pageTitle', 'Danh sách đăng ký thi đua thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mahoidap'] = $mabl = session('admin')->username . '_' . getdate()[0];
            $inputs['ngaythang'] = date('Y-m-d');
            $inputs['trangthai'] = 'CC';
            $inputs['madonvi'] = session('admin')->madonvi;
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') thêm mới ';
            $model = new qlhoidap();
            $model->create($inputs);
            return redirect('qlhoidap');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = qlhoidap::find($id);
            $nhomql = dmdonvi::select('madonvi','tendv')
                ->where('caphanhchinh','HUYEN')->orwhere('caphanhchinh','TINH')->get();
            return view('manage.vbpl.qlhoidap.edit')
                ->with('model', $model)
                ->with('nhomql', $nhomql)
                ->with('pageTitle', 'Danh sách đăng ký thi đua chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = qlhoidap::findOrFail($id);
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chỉnh sửa ';
            $model->update($inputs);

            return redirect('qlhoidap');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = qlhoidap::findOrFail($id);
            return view('manage.vbpl.qlhoidap.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = qlhoidap::findorFail($id);
            $model->delete();
            return redirect('qlhoidap');
        }else
            return view('errors.notlogin');
    }

    public function trans(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $request->all()['idtrans'];
            $model = qlhoidap::findorFail($id);
            $inputs['trangthai'] = 'CD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chuyển hồ sơ ';
            $inputs['ngaychuyen'] = date('Y-m-d H:i:s');
            $model->nguoichuyen = $inputs['nguoichuyen'];
            $model->update($inputs);
            return redirect('qlhoidap');
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
            $model = qlhoidap::where('id',$inputs['id'])
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
            $model = qlhoidap::where('kihieudhtd', $inputs['kihieudhtd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }

    public function get(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idget'];
            $model = qlhoidap::findorFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') nhận hồ sơ';
            $model->ngaynhan = $inputs['ngaynhan'];
            $model->update($inputs);
            return redirect('qlhoidap');
        }else
            return view('errors.notlogin');
    }
    public function traloi($id){
        if (Session::has('admin')) {
            $model = qlhoidap::find($id);
            $nhomql = dmdonvi::select('madonvi','tendv')
                ->where('caphanhchinh','HUYEN')->orwhere('caphanhchinh','TINH')->get();
            return view('manage.vbpl.qlhoidap.traloi')
                ->with('model', $model)
                ->with('nhomql', $nhomql)
                ->with('pageTitle', 'Trả lời câu hỏi');
        } else
            return view('errors.notlogin');
    }
    public function anser(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = qlhoidap::findOrFail($id);
            $inputs['nguoitraloi'] = session('admin')->username.'('.session('admin')->name.') -- trả lời ';
            $inputs['ngaytraloi'] = date('Y-m-d H:i:s');
            $inputs['trangthai'] = 'TL';
            $model->update($inputs);

            return redirect('qlhoidap');
        }else
            return view('errors.notlogin');
    }
    public function back(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idtra'];
            $model = qlhoidap::findorFail($id);
            $inputs['trangthai'] = 'BTL';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') trả hồ sơ';
            $model->update($inputs);
            return redirect('qlhoidap');
        }else
            return view('errors.notlogin');
    }
}
