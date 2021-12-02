<?php

namespace App\Http\Controllers\manage\kttkkc\ktctubnd;

use App\dmdanhhieutd;
use App\dmdonvi;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\Http\Requests\manage\KtCtUbNdRequest;
use App\Model\manage\kttkkc\ktctubnd\KtCtUbNd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KtCtUbNdController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            $model_ht = dmhinhthuckt::select('mahinhthuckt','tenhinhthuckt')->get();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = KtCtUbNd::whereYear('ngaynhap',$inputs['nam'])
                ->get();
            return view('manage.kttkkc.ktctubnd.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('model_ht', $model_ht)
                ->with('pageTitle','Danh sách bằng khen chủ tịch UBND tỉnh (tỉnh Hà Bắc cũ)');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            return view('manage.kttkkc.ktctubnd.create')
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách bằng khen chủ tịch UBND tỉnh (tỉnh Hà Bắc cũ) thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(KtCtUbNdRequest $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $inputs['ngaynhap'] = date('Y-m-d');
            $model = new KtCtUbNd();

            $model->create($inputs);
            return redirect('ktctubnd');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = KtCtUbNd::find($id);
            return view('manage.kttkkc.ktctubnd.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách bằng khen chủ tịch UBND tỉnh (tỉnh Hà Bắc cũ) chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(KtCtUbNdRequest $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = KtCtUbNd::findOrFail($id);
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $model->update($inputs);
            return redirect('ktctubnd');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = KtCtUbNd::findOrFail($id);
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            return view('manage.kttkkc.ktctubnd.show')
                ->with('model', $model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('pageTitle', 'Danh sách bằng khen chủ tịch UBND tỉnh (tỉnh Hà Bắc cũ)');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = KtCtUbNd::findorFail($id);
            $model->delete();
            return redirect('ktctubnd');
        }else
            return view('errors.notlogin');
    }
}
