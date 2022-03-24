<?php

namespace App\Http\Controllers\manage\hiepy;

use App\Model\manage\hiepy\hiepykhenthuong;
use App\model\manage\hiepy\qlykien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HiepYkhenthuongController extends Controller
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
            $inputs['mahiepy'] = isset($inputs['mahiepy']) ? $inputs['mahiepy'] : '';
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : '';
            $model = hiepykhenthuong::all();
            if($inputs['mahiepy'] != '')
                $model=$model->where('mahiepy',$inputs['mahiepy']);
            if($inputs['phanloai'] != '')
                $model = $model->where('phanloai',$inputs['phanloai']);
            return view('manage.hiepy.index')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách hiệp y khen thưởng');

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
//            if (session('admin')->level == 'SSA' || session('admin')->sadmin == 'sa') {
                return view('manage.hiepy.create')
                    ->with('pageTitle', 'Tạo mới thông tin hiệp y khen thưởng');
//            }
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
            $model = new hiepykhenthuong();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $model->create($inputs);
            return redirect('hiepykhenthuong');

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

            $model = hiepykhenthuong::findOrFail($id);
            return view('manage.hiepy.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin hiệp y khen thưởng');
        } else
            return view('errors.notlogin');
    }
    public function ykien($id)
    {
        if (Session::has('admin')) {
            $model = hiepykhenthuong::findOrFail($id);
            return view('manage.hiepy.ykien')
                ->with('model', $model)
                ->with('pageTitle', 'Thêm mới ý kiến về thông tin hiệp y khen thưởng');
        } else
            return view('errors.notlogin');
    }
    public function dsykien($id)
    {
        if (Session::has('admin')) {

            $model = hiepykhenthuong::findOrFail($id);
            $modelyk = qlykien::where('mahiepy',$model->mahiepy)->get();
            return view('manage.hiepy.dsykien')
                ->with('model', $model)
                ->with('modelyk', $modelyk)
                ->with('pageTitle', 'Danh sách ý kiến về thông tin hiệp y khen thưởng');
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
            $model = hiepykhenthuong::findOrFail($id);
            $model->update($input);
            return redirect('hiepykhenthuong');

        } else {
            return view('errors.notlogin');
        }
    }

    public function storeyk(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            unset($inputs['id']);
            $model = new qlykien();
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $model->create($inputs);
            return redirect('hiepykhenthuong');

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
            $model = hiepykhenthuong::findorFail($id);
            $model->delete();

            return redirect('hiepykhenthuong');

        } else
            return view('errors.notlogin');
    }
    public function deleteyk(Request $request)
    {
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = hiepykhenthuong::findorFail($id);
            $inputs['ykien'] = "";
            $model->update($inputs);

            return redirect('hiepykhenthuong');

        } else
            return view('errors.notlogin');
    }
    public function checkmahiepy(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['mahiepy'])) {
            $model = hiepykhenthuong::where('mahiepy', $inputs['mahiepy'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
