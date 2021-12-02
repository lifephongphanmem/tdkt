<?php

namespace App\Http\Controllers\manage\qldoituong;

use App\model\manage\qldoituong\dmphanloaict;
use App\model\manage\qldoituong\dmphanloaidt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmPhanLoaictController extends Controller
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
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : '';
            $m_pl = dmphanloaidt::where('madonvi',session('admin')->madonvi)->get();
            $model = dmphanloaict::where('madonvi',session('admin')->madonvi)->get();
            if($inputs['phanloai'] != '')
                $model = $model->where('phanloai',$inputs['phanloai']);
            return view('manage.qldoituong.dmphanloaict.index')
                ->with('model', $model)
                ->with('m_pl', $m_pl)
                ->with('pageTitle', 'Danh sách phân loại đối tượng chi tiết quản lý');

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
            $m_pl = dmphanloaidt::where('madonvi',session('admin')->madonvi)->get();
            return view('manage.qldoituong.dmphanloaict.create')
                ->with('m_pl', $m_pl)
                ->with('pageTitle', 'Tạo mới thông tin danh mục phân loại chi tiết đối tượng');
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
            $model = new dmphanloaict();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $inputs['madonvi'] = session('admin')->madonvi;
            $inputs['maplct'] = getdate()[0];
            $model->create($inputs);
            return redirect('dmphanloaict');

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

            $model = dmphanloaict::findOrFail($id);
            $m_pl = dmphanloaidt::where('madonvi',session('admin')->madonvi)->get();
            return view('manage.qldoituong.dmphanloaict.edit')
                ->with('model', $model)
                ->with('m_pl', $m_pl)
                ->with('pageTitle', 'Chỉnh sửa thông tin danh mục phân loại đối tượng chi tiết');
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
            $model = dmphanloaict::findOrFail($id);
            $model->update($input);
            return redirect('dmphanloaict');

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
            $model = dmphanloaict::findorFail($id);
            $model->delete();

            return redirect('dmphanloaict');

        } else
            return view('errors.notlogin');
    }
    public function delete(Request $request)
    {
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = dmphanloaict::findorFail($id);
            $model->delete();

            return redirect('dmphanloaict');

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
            $model = dmphanloaict::where('mapl', $inputs['mapl'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}