<?php

namespace App\Http\Controllers\manage\kttkkc\chongmygiadinh;

use App\Http\Requests\manage\ChongMyGiaDinhRequest;
use App\Model\manage\kttkkc\chongmygiadinh\ChongMyGiaDinh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ChongMyGiaDinhController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = ChongMyGiaDinh::whereYear('ngaynhap',$inputs['nam'])
                ->get();
            return view('manage.kttkkc.chongmygiadinh.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Danh sách khen thưởng kháng chiến chống Mỹ(gia đình)');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            return view('manage.kttkkc.chongmygiadinh.create')
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Mỹ(gia đình) thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(ChongMyGiaDinhRequest $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] = getDateToDb($inputs['tgiankcqd']);
            $inputs['ngaynhap'] = date('Y-m-d');
            $model = new ChongMyGiaDinh();
            $model->create($inputs);
            return redirect('chongmygiadinh');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = ChongMyGiaDinh::find($id);
            return view('manage.kttkkc.chongmygiadinh.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Mỹ(gia đình) chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(ChongMyGiaDinhRequest $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ChongMyGiaDinh::findOrFail($id);
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] = getDateToDb($inputs['tgiankcqd']);
            $model->update($inputs);
            return redirect('chongmygiadinh');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = ChongMyGiaDinh::findOrFail($id);
            return view('manage.kttkkc.chongmygiadinh.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách khen thưởng kháng chiến chống Mỹ(gia đình)');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = ChongMyGiaDinh::findorFail($id);
            $model->delete();
            return redirect('chongmygiadinh');
        }else
            return view('errors.notlogin');
    }
}
