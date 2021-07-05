<?php

namespace App\Http\Controllers;

use App\dmdonvi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmDonViController extends Controller
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
            $inputs['madonvi'] = isset($inputs['madonvi']) ? $inputs['madonvi'] : '';
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : '';
            $modeldvql = dmdonvi::where('phanloaitaikhoan','TH')->get();
            $model = dmdonvi::all();
            if($inputs['madonvi'] != '')
                $model=$model->where('madonvi',$inputs['madonvi']);
            if($inputs['phanloai'] != '')
                $model = $model->where('phanloai',$inputs['phanloai']);
            return view('system.dmdonvi.index')
                ->with('model', $model)
                ->with('modeldvql', $modeldvql)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách đơn vị');

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
                $modeldvql = dmdonvi::where('phanloaitaikhoan','TH')->get();
                return view('system.dmdonvi.create')
                    ->with('modeldvql', $modeldvql)
                    ->with('pageTitle', 'Tạo mới thông tin đơn vị');
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
            $model = new dmdonvi();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $inputs['madonvi'] = getdate()[0];
            $model->create($inputs);
            return redirect('dmdonvi');

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

            $model = dmdonvi::findOrFail($id);
            $modeldvql = dmdonvi::where('phanloaitaikhoan','TH')->get();
            return view('system.dmdonvi.edit')
                ->with('model', $model)
                ->with('modeldvql', $modeldvql)
                ->with('pageTitle', 'Chỉnh sửa thông tin đơn vị');
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
            $model = dmdonvi::findOrFail($id);
            $model->update($input);
            return redirect('dmdonvi');

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
            $model = dmdonvi::findorFail($id);
            $model->delete();

            return redirect('dmdonvi');

        } else
            return view('errors.notlogin');
    }

    public function checkmadonvi(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['madonvi'])) {
            $model = dmdonvi::where('madonvi', $inputs['madonvi'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
