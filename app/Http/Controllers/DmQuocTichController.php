<?php

namespace App\Http\Controllers;

use App\dmquoctich;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmQuocTichController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = dmquoctich::all();
            return view('system.dmquoctich.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Danh sách danh mục quốc tịch');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            return view('system.dmquoctich.create')
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách danh mục quốc tịch thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') thêm mới ';
            $model = new dmquoctich();
            $model->create($inputs);
            return redirect('dmquoctich');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = dmquoctich::find($id);
            return view('system.dmquoctich.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách danh mục quốc tịch chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = dmquoctich::findOrFail($id);
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chỉnh sửa ';
            $model->update($inputs);
            return redirect('dmquoctich');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = dmquoctich::findorFail($id);
            $model->delete();
            return redirect('dmquoctich');
        }else
            return view('errors.notlogin');
    }

    public function checkmaqt(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['maqt'])) {
            $model = dmquoctich::where('maqt', $inputs['maqt'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
