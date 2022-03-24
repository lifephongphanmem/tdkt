<?php

namespace App\Http\Controllers\manage\kttkkc\kyniemchuong;

use App\DanhMuc\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\Http\Requests\manage\KyNiemChuongRequest;
use App\Model\manage\kttkkc\kyniemchuong\KyNiemChuong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KyNiemChuongController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            $model_ht = dmhinhthuckt::select('mahinhthuckt','tenhinhthuckt')->get();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = KyNiemChuong::whereYear('ngaynhap',$inputs['nam'])
                ->get();
            return view('manage.kttkkc.kyniemchuong.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('model_ht', $model_ht)
                ->with('pageTitle','Danh sách kỷ niệm chương');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            return view('manage.kttkkc.kyniemchuong.create')
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách kỷ niệm chương thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(KyNiemChuongRequest $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $inputs['ngaynhap'] = date('Y-m-d');
            $model = new KyNiemChuong();
            $model->create($inputs);
            return redirect('kyniemchuong');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = KyNiemChuong::find($id);
            return view('manage.kttkkc.kyniemchuong.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách kỷ niệm chương chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(KyNiemChuongRequest $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = KyNiemChuong::findOrFail($id);
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $model->update($inputs);
            return redirect('kyniemchuong');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = KyNiemChuong::findOrFail($id);
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            return view('manage.kttkkc.kyniemchuong.show')
                ->with('model', $model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('pageTitle', 'Danh sách kỷ niệm chương');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = KyNiemChuong::findorFail($id);
            $model->delete();
            return redirect('kyniemchuong');
        }else
            return view('errors.notlogin');
    }
}
