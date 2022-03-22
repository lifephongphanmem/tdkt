<?php

namespace App\Http\Controllers\system;

use App\DSDiaBan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DSDiaBanController extends Controller
{
    public function index(Request $request)
    {
        if (Session::has('admin')) {
            if (!chkPhanQuyen()) {
                return view('errors.noperm');
            }

            $model = DSDiaBan::all();
            $inputs = $request->all();
            //dd($model);
            return view('system.DiaBan.ThongTin')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('a_phanloai', getPhanLoaiDonVi_DiaBan())
                ->with('a_diaban', getDiaBan_All(true))
                ->with('pageTitle', 'Danh sách địa bàn');
        } else
            return view('errors.notlogin');
    }

    public function modify(Request $request){
        if (Session::has('admin')) {
            //tài khoản SSA; tài khoản quản trị + có phân quyền
            if (!chkPhanQuyen()) {
                return view('errors.noperm');
            }

            $inputs = $request->all();
            $model = DSDiaBan::where('madiaban', $inputs['madiaban'])->first();

            if ($model == null) {
                $inputs['madiaban'] = getdate()[0];
                DSDiaBan::create($inputs);
            } else {
                $model->tendiaban = $inputs['tendiaban'];
                $model->capdo = $inputs['capdo'];
                $model->save();
            }

            return redirect('/DiaBan/ThongTin');
        } else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            //tài khoản SSA; tài khoản quản trị + có phân quyền
            if (!chkPhanQuyen()) {
                return view('errors.noperm');
            }
            $inputs = $request->all();
            DSDiaBan::findorfail($inputs['iddelete'])->delete();
            return redirect('/DiaBan/ThongTin');
        } else
            return view('errors.notlogin');
    }
}
