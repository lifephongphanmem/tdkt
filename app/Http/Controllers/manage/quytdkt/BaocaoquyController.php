<?php

namespace App\Http\Controllers\manage\quytdkt;

use App\dmdonvi;
use App\Model\manage\quytdkt\qlphieuchi;
use App\Model\manage\quytdkt\qlphieuthu;
use App\Model\manage\quytdkt\qlphieuthuchi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BaocaoquyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {
            return view('manage.quytdkt.baocaoth.index')
                ->with('pageTitle', 'Danh sách quản lý danh mục chi');

        } else
            return view('errors.notlogin');
    }

    public function soquythu(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_dv = dmdonvi::where('madonvi',session('admin')->madonvi)->first();
            $model = qlphieuthuchi::where('loaiphieu','PT')
                ->where('ngaythang','>=',$inputs['tungay'])
                ->where('ngaythang','<=',$inputs['denngay'])
                ->where('madonvi',session('admin')->madonvi)
                ->get();
            return view('manage.quytdkt.baocaoth.soquythu')
                ->with('model', $model)
                ->with('m_dv', $m_dv)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Sổ quỹ các khoản thu');

        } else
            return view('errors.notlogin');
    }
    public function soquychi(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_dv = dmdonvi::where('madonvi',session('admin')->madonvi)->first();
            $model = qlphieuthuchi::where('loaiphieu','PC')
                ->where('ngaythang','>=',$inputs['tungay'])
                ->where('ngaythang','<=',$inputs['denngay'])
                ->where('madonvi',session('admin')->madonvi)
                ->get();
            return view('manage.quytdkt.baocaoth.soquychi')
                ->with('model', $model)
                ->with('m_dv', $m_dv)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Sổ quỹ các khoản chi');

        } else
            return view('errors.notlogin');
    }

    public function soquythuchi(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_dv = dmdonvi::where('madonvi',session('admin')->madonvi)->first();
            $model = qlphieuthuchi::where('ngaythang','>=',$inputs['tungay'])
                ->where('ngaythang','<=',$inputs['denngay'])
                ->where('madonvi',session('admin')->madonvi)
                ->orderby('ngaythang')->get();
            return view('manage.quytdkt.baocaoth.soquythuchi')
                ->with('model', $model)
                ->with('m_dv', $m_dv)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Sổ quỹ các khoản thu, chi');

        } else
            return view('errors.notlogin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
