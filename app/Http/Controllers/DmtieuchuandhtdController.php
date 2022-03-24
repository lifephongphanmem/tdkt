<?php

namespace App\Http\Controllers;

use App\DanhMuc\dmdanhhieutd;
use App\dmtieuchuandhtd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmtieuchuandhtdController extends Controller
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
            $inputs['matieuchuandhtd'] = isset($inputs['matieuchuandhtd']) ? $inputs['matieuchuandhtd'] : '';
            $model = dmtieuchuandhtd::all();
            if($inputs['matieuchuandhtd'] != '')
                $model=$model->where('madanhhieutd',$inputs['madanhhieutd']);
            return view('system.dmtieuchuandhtd.index')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách danh mục tiêu chuẩn danh hiệu thi đua');

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
            if (session('admin')->level == 'SSA' || session('admin')->sadmin == 'sa') {
                return view('system.dmtieuchuandhtd.create')
                    ->with('pageTitle', 'Tạo mới thông tin danh mục tiêu chuẩn danh hiệu thi đua');
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
            $model = new dmtieuchuandhtd();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $model->create($inputs);
            return redirect('dmtieuchuandhtd');

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

            $model = dmtieuchuandhtd::findOrFail($id);
            return view('system.dmtieuchuandhtd.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin danh mục tiêu chuẩn danh hiệu thi đua');
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
            $model = dmtieuchuandhtd::findOrFail($id);
            $model->update($input);
            return redirect('dmtieuchuandhtd');

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
            $model = dmtieuchuandhtd::findorFail($id);
            $model->delete();

            return redirect('dmtieuchuandhtd');

        } else
            return view('errors.notlogin');
    }

    public function checkmatieuchuandhtd(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['matieuchuandhtd'])) {
            $model = dmtieuchuandhtd::where('matieuchuandhtd', $inputs['matieuchuandhtd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
