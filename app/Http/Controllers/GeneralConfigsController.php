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
            if(chkPhanQuyen()){
                $model = HeThongChung::first();
                return view('system.HeThongChung.ThongTin')
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
            if(chkPhanQuyen()){
                return view('system.HeThongChung.create')
                    ->with('pageTitle', 'Thêm mới thông tin đơn vị được cấp bản quyền');
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if(chkPhanQuyen()){
                $inputs = $request->all();
                $model = new HeThongChung();
                $model->create($inputs);
                return redirect('/HeThongChung/ThongTin');
            }else{
                return view('errors.noperm');
            }
        }else
            return view('errors.notlogin');
    }

    public function edit()
    {
        if (Session::has('admin')) {
            if(chkPhanQuyen()){
                $model = HeThongChung::first();
                return view('system.HeThongChung.Sua')
                    ->with('model', $model)
                    ->with('pageTitle', 'Chỉnh sửa cấu hình hệ thống');
            }else{
                return view('errors.noperm');
            }

        }else
            return view('errors.notlogin');
    }
    public function update(Request $request)
    {
        if (Session::has('admin')) {
            if(chkPhanQuyen()){
                $inputs = $request->all();
                HeThongChung::first()->update($inputs);
                return redirect('/HeThongChung/ThongTin');
            }else{
                return view('errors.noperm');
            }

        }else
            return view('errors.notlogin');
    }

    public function setting()
    {
        if (Session::has('admin')) {
            if(session('admin')->level == 'SSA')
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
            if(session('admin')->level == 'SSA'){
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
