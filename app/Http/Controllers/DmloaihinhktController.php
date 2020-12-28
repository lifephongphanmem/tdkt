<?php

namespace App\Http\Controllers;

use App\dmloaihinhkt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmloaihinhktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['maloaihinhkt'] = isset($inputs['maloaihinhkt']) ? $inputs['maloaihinhkt'] : '';
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : '';
            $model = dmloaihinhkt::all();
            if($inputs['maloaihinhkt'] != '')
                $model=$model->where('maloaihinhkt',$inputs['maloaihinhkt']);
            if($inputs['phanloai'] != '')
                $model = $model->where('phanloai',$inputs['phanloai']);
            return view('system.dmloaihinhkt.index')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách danh mục loại hình khen thưởng');

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
        if (Session::has('admin')) {
            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
                return view('system.dmloaihinhthuckt.create')
                    ->with('pageTitle', 'Tạo mới thông tin danh mục loại hình khen thưởng');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new dmloaihinhkt();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $model->create($inputs);
            return redirect('dmloaihinhkt');

        } else {
            return view('errors.notlogin');
        }
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
        if (Session::has('admin')) {

            $model = dmloaihinhkt::findOrFail($id);
            return view('system.dmloaihinhkt.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin danh mục loại hình khen thưởng');
        } else
            return view('errors.notlogin');
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
        if (Session::has('admin')) {
            $input = $request->all();
            $model = dmloaihinhkt::findOrFail($id);
            $model->update($input);
            return redirect('dmloaihinhkt');

        } else {
            return view('errors.notlogin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = dmloaihinhkt::findorFail($id);
            $model->delete();

            return redirect('dmloaihinhkt');

        } else
            return view('errors.notlogin');
    }

    public function checkmaloaihinhkt(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['mahinhthuckt'])) {
            $model = dmloaihinhkt::where('maloaihinhkt', $inputs['mahinhthuckt'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
