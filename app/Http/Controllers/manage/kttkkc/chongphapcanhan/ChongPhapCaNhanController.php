<?php

namespace App\Http\Controllers\manage\kttkkc\chongphapcanhan;

use App\dmdanhhieutd;
use App\dmloaihinhkt;
use App\Http\Requests\manage\ChongPhapCaNhanRequest;
use App\Model\manage\kttkkc\chongphapcanhan\ChongPhapCaNhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ChongPhapCaNhanController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');/*
            $inputs['loaikt'] = isset($inputs['loaikt']) ? $inputs['loaikt'] : 'all';*/
            $model = ChongPhapCaNhan::whereYear('ngaynhap',$inputs['nam'])
                /*->where('loaikt',$inputs['loaikt'])*/
                ->get();
            return view('manage.kttkkc.chongphapcanhan.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('pageTitle','Danh sách khen thưởng kháng chiến chống Pháp(cá nhân)');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model_lh = dmloaihinhkt::all();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            return view('manage.kttkkc.chongphapcanhan.create')
                ->with('inputs', $inputs)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Pháp(cá nhân) thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(ChongPhapCaNhanRequest $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] = getDateToDb($inputs['tgiankcqd']);
            $inputs['ngaynhap'] = date('Y-m-d');
            $model = new ChongPhapCaNhan();
            $model->create($inputs);
            return redirect('chongphapcanhan');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = ChongPhapCaNhan::find($id);
            return view('manage.kttkkc.chongphapcanhan.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Pháp(cá nhân) chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(ChongPhapCaNhanRequest $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ChongPhapCaNhan::findOrFail($id);
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] = getDateToDb($inputs['tgiankcqd']);
            $model->update($inputs);
            return redirect('chongphapcanhan');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = ChongPhapCaNhan::findOrFail($id);
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            return view('manage.kttkkc.chongphapcanhan.show')
                ->with('model', $model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Pháp(cá nhân)');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = ChongPhapCaNhan::findorFail($id);
            $model->delete();
            return redirect('chongphapcanhan');
        }else
            return view('errors.notlogin');
    }
}
