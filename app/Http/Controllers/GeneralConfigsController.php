<?php

namespace App\Http\Controllers;

use App\HeThongChung;
use App\DSTaiKhoan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class GeneralConfigsController extends Controller
{
    public function index()
    {
        if (Session::has('admin')) {
            if(session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa'){
                $model = HeThongChung::first();
                return view('system.general.index')
                    ->with('model',$model)
                    ->with('pageTitle', 'Cấu hình hệ thống');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
                return view('system.general.create')
                    ->with('pageTitle', 'Thêm mới thông tin đơn vị được cấp bản quyền');
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
                $inputs = $request->all();
                $model = new HeThongChung();
                $model->create($inputs);
                return redirect('general');
            }else{
                return view('errors.noperm');
            }
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            if(session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
                $model = HeThongChung::first();
                return view('system.general.edit')
                    ->with('model', $model)
                    ->with('pageTitle', 'Chỉnh sửa cấu hình hệ thống');
            }else{
                return view('errors.noperm');
            }

        }else
            return view('errors.notlogin');
    }
    public function update(Request $request,$id)
    {
        if (Session::has('admin')) {
            dd($request);
            if(session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
                $inputs = $request->all();
                $model = HeThongChung::findOrFail($id);
                $model->update($inputs);
                return redirect('general');
            }else{
                return view('errors.noperm');
            }

        }else
            return view('errors.notlogin');
    }

    public function setting()
    {
        if (Session::has('admin')) {
            if(session('admin')->sadmin == 'ssa')
            {
                $model = HeThongChung::first();
                $setting = isset($model->setting) ? $model->setting : '';

                return view('system.general.setting')
                    ->with('model',$model)
                    ->with('setting',json_decode($setting))
                    ->with('pageTitle','Cấu hình chức năng chương trình');
            }else{
                return view('errors.noperm');
            }

        }else
            return view('errors.notlogin');
    }

    public function updatesetting(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->sadmin == 'ssa'){
                $update = $request->all();
                $model = HeThongChung::first();
                $update['roles'] = isset($update['roles']) ? $update['roles'] : null;
                $model->setting = json_encode($update['roles']);
                $model->save();

                return redirect('general');
            }else{
                return view('errors.noperm');
            }

        }else
            return view('errors.notlogin');
    }


}
