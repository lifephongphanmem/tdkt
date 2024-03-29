<?php

namespace App\Http\Controllers\manage\kttkkc\ktthutuong;

use App\DanhMuc\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\Http\Requests\manage\KtThuTuongRequest;
use App\Model\manage\kttkkc\ktthutuong\KtThuTuong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KtThuTuongController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            $model_ht = dmhinhthuckt::select('mahinhthuckt','tenhinhthuckt')->get();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = KtThuTuong::whereYear('ngaynhap',$inputs['nam'])
                ->get();
            return view('manage.kttkkc.ktthutuong.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('model_ht', $model_ht)
                ->with('pageTitle','Danh sách bằng khen thủ tướng');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            return view('manage.kttkkc.ktthutuong.create')
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách bằng khen thủ tướng thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(KtThuTuongRequest $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $inputs['ngaynhap'] = date('Y-m-d');
            $model = new KtThuTuong();
            $model->create($inputs);
            return redirect('ktthutuong');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = KtThuTuong::find($id);
            return view('manage.kttkkc.ktthutuong.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách bằng khen thủ tướng chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(KtThuTuongRequest $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = KtThuTuong::findOrFail($id);
            $inputs['namsinh'] = getDateToDb($inputs['namsinh']);
            $inputs['tgiantgkc'] = getDateToDb($inputs['tgiantgkc']);
            $inputs['tgiankcqd'] =$inputs['tgiankcqd'];
            $model->update($inputs);
            return redirect('ktthutuong');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = KtThuTuong::findOrFail($id);
            $model_lh = dmloaihinhkt::select('maloaihinhkt','tenloaihinhkt')->get();
            $model_dh = dmdanhhieutd::select('madanhhieutd','tendanhhieutd')->get();
            return view('manage.kttkkc.ktthutuong.show')
                ->with('model', $model)
                ->with('model_dh', $model_dh)
                ->with('model_lh', $model_lh)
                ->with('pageTitle', 'Danh sách bằng khen thủ tướng');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = KtThuTuong::findorFail($id);
            $model->delete();
            return redirect('ktthutuong');
        }else
            return view('errors.notlogin');
    }
}
