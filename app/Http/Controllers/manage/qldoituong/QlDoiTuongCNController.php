<?php

namespace App\Http\Controllers\manage\qldoituong;

use App\DSDiaBan;
use App\DSDonVi;
use App\model\manage\qldoituong\dmphanloaict;
use App\model\manage\qldoituong\dmphanloaidt;
use App\Model\manage\qldoituong\qldoituong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QlDoiTuongCNController extends Controller
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
            $m_donvi = DSDonVi::all();
            $m_diaban = DSDiaBan::all();
            $inputs['madonvi'] = $inputs['madonvi'] ?? $m_donvi->first()->madonvi;
            $inputs['phanloaict'] = isset($inputs['phanloaict']) ? $inputs['phanloaict'] : '';
            $m_pl = dmphanloaict::where('mapl','like','CN')->get();
            $model = qldoituong::where('madonvi',$inputs['madonvi'])->where('phanloai','CANHAN')->get();
            if($inputs['phanloaict'] != '')
                $model = $model->where('phanloaict',$inputs['phanloaict']);
            return view('manage.qldoituong.qldoituongcn.index')
                ->with('model', $model)
                ->with('m_pl', $m_pl)
                ->with('inputs', $inputs)
                ->with('m_donvi', $m_donvi)
                ->with('m_diaban', $m_diaban)
                ->with('pageTitle', 'Danh sách đối tượng quản lý cá nhân');

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
            $m_pl = dmphanloaict::where('mapl','CN')->get();
            return view('manage.qldoituong.qldoituongcn.create')
                ->with('m_pl', $m_pl)
                ->with('pageTitle', 'Tạo mới thông tin danh sách đối tượng cá nhân');
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
            $inputs['ngaysinh'] = getDateToDb($inputs['ngaysinh']);
            $model->create($inputs);
            return redirect('qldoituongcn');

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
            $m_pl = dmphanloaict::where('mapl','CN')->get();
            $model = qldoituong::findOrFail($id);
            return view('manage.qldoituong.qldoituongcn.edit')
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
            return redirect('qldoituongcn');

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

            return redirect('qldoituongcn');

        } else
            return view('errors.notlogin');
    }
    public function delete(Request $request)
    {
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = qldoituong::findorFail($id);
            $model->delete();

            return redirect('qldoituongcn');

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
