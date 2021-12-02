<?php

namespace App\Http\Controllers\manage\qldoituong;

use App\model\manage\qldoituong\dmphanloaidt;
use App\Model\manage\qldoituong\qldoituong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmPhanLoaidtController extends Controller
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
            $model = dmphanloaidt::where('madonvi',session('admin')->madonvi)->get();
            return view('manage.qldoituong.dmphanloaidt.index')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách phân loại đối tượng quản lý');

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
            return view('manage.qldoituong.dmphanloaidt.create')
                ->with('pageTitle', 'Tạo mới thông tin danh mục phân loại đối tượng');
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
            $model = new dmphanloaidt();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $inputs['madonvi'] = session('admin')->madonvi;
            $inputs['mapl'] = getdate()[0];
            $model->create($inputs);
            return redirect('dmphanloaidt');

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

            $model = dmphanloaidt::findOrFail($id);
            return view('manage.qldoituong.dmphanloaidt.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin danh mục phân loại đối tượng');
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
            $model = dmphanloaidt::findOrFail($id);
            $model->update($input);
            return redirect('dmphanloaidt');

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
            $model = dmphanloaidt::findorFail($id);
            $model->delete();

            return redirect('dmphanloaidt');

        } else
            return view('errors.notlogin');
    }
    public function delete(Request $request)
    {
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = dmphanloaidt::findorFail($id);
            $model->delete();

            return redirect('dmphanloaidt');

        } else
            return view('errors.notlogin');
    }

    public function checkmapl (Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['mapl'])) {
            $model = qldoituong::where('mapl', $inputs['mapl'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}