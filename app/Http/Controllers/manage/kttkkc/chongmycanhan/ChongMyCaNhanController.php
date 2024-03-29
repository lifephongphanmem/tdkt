<?php

namespace App\Http\Controllers\manage\kttkkc\chongmycanhan;

use App\DanhMuc\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\Http\Requests\manage\ChongMyCaNhanRequest;
use App\Model\manage\kttkkc\chongmycanhan\ChongMyCaNhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ChongMyCaNhanController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            $model_ht = dmhinhthuckt::select('mahinhthuckt','tenhinhthuckt')->get();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = ChongMyCaNhan::whereYear('ngaynhap',$inputs['nam'])
                ->get();
            return view('manage.kttkkc.chongmycanhan.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('model_ht', $model_ht)
                ->with('pageTitle','Danh sách khen thưởng kháng chiến chống Mỹ(cá nhân)');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            return view('manage.kttkkc.chongmycanhan.create')
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Mỹ(cá nhân) thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(ChongMyCaNhanRequest $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $inputs['ngaynhap'] = date('Y-m-d');
            $model = new ChongMyCaNhan();
            $model->create($inputs);
            return redirect('chongmycanhan');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = ChongMyCaNhan::find($id);
            return view('manage.kttkkc.chongmycanhan.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Mỹ(cá nhân) chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(ChongMyCaNhanRequest $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ChongMyCaNhan::findOrFail($id);
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $model->update($inputs);
            return redirect('chongmycanhan');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = ChongMyCaNhan::findOrFail($id);
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            return view('manage.kttkkc.chongmycanhan.show')
                ->with('model', $model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Mỹ(cá nhân)');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = ChongMyCaNhan::findorFail($id);
            $model->delete();
            return redirect('chongmycanhan');
        }else
            return view('errors.notlogin');
    }
}
