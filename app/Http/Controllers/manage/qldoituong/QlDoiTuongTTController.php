<?php

namespace App\Http\Controllers\manage\qldoituong;

use App\model\manage\qldoituong\dmphanloaict;
use App\model\manage\qldoituong\dmphanloaidt;
use App\Model\manage\qldoituong\qldoituong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QlDoiTuongTTController extends Controller
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
            $inputs['phanloaict'] = isset($inputs['phanloaict']) ? $inputs['phanloaict'] : '';
            $m_pl = dmphanloaict::where('mapl','not like','CN')->get();
            $model = qldoituong::where('madonvi',session('admin')->madonvi)->where('phanloai','not like','CN')->get();
            if($inputs['phanloaict'] != '')
                $model = $model->where('phanloaict',$inputs['phanloaict']);
            return view('manage.qldoituong.qldoituongtt.index')
                ->with('model', $model)
                ->with('m_pl', $m_pl)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách đối tượng quản lý tập thể');

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
            $m_pl = dmphanloaict::where('mapl','not like','CN')->get();
            return view('manage.qldoituong.qldoituongtt.create')
                ->with('m_pl', $m_pl)
                ->with('pageTitle', 'Tạo mới thông tin danh sách đối tượng tập thể');
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
            $m_pl = dmphanloaict::where('maplct',$inputs['phanloaict'])->first();
            $inputs['phanloai'] = $m_pl->mapl;
            $model = new qldoituong();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $inputs['madt'] = getdate()[0];
            $inputs['madonvi'] = session('admin')->madonvi;
            $model->create($inputs);
            return redirect('qldoituongtt');

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
            $m_pl = dmphanloaict::where('mapl','not like','CN')->get();
            $model = qldoituong::findOrFail($id);
            return view('manage.qldoituong.qldoituongtt.edit')
                ->with('model', $model)
                ->with('m_pl', $m_pl)
                ->with('pageTitle', 'Chỉnh sửa thông tin đối tượng');
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
            unset($input['madt']);
            $model = qldoituong::findOrFail($id);
            $model->update($input);
            return redirect('qldoituongtt');

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
            $model = qldoituong::findorFail($id);
            $model->delete();

            return redirect('qldoituongtt');

        } else
            return view('errors.notlogin');
    }
    public function delete(Request $request)
    {
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = qldoituong::findorFail($id);
            $model->delete();

            return redirect('qldoituongtt');

        } else
            return view('errors.notlogin');
    }

    public function checkmadinhdanh (Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();
        if (isset($inputs['madinhdanh'])) {
                $model = qldoituong::where('madinhdanh', $inputs['madinhdanh']);
            if (isset($inputs['madt']))
                $model = $model->where('madt','<>', $inputs['madt']);
            $model = $model->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}