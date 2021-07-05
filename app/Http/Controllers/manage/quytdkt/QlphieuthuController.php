<?php

namespace App\Http\Controllers\manage\quytdkt;

use App\Model\manage\quytdkt\qlphieuthu;
use App\Model\manage\quytdkt\qlphieuthuchi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QlphieuthuController extends Controller
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
            $inputs['maphieu'] = isset($inputs['maphieu']) ? $inputs['maphieu'] : '';
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : '';
            $model = qlphieuthuchi::where('loaiphieu','PT')->get();
            if($inputs['maphieu'] != '')
                $model=$model->where('maphieu',$inputs['maphieu']);
            if($inputs['phanloai'] != '')
                $model = $model->where('phanloai',$inputs['phanloai']);
            return view('manage.quytdkt.thu.index')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách quản lý phiếu thu');

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
            return view('manage.quytdkt.thu.create')
                ->with('pageTitle', 'Tạo mới thông tin phiếu thu quỹ');
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
            $model = new qlphieuthuchi();
            $inputs['sotien'] = getDouble($inputs['sotien']);
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $inputs['loaiphieu'] ='PT';
            $model->create($inputs);
            return redirect('qldauvao');

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

            $model = qlphieuthuchi::findOrFail($id);
            return view('manage.quytdkt.thu.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin phiếu thu');
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
            $model = qlphieuthuchi::findOrFail($id);
            $input['sotien'] = getDouble($input['sotien']);
            $model->update($input);
            return redirect('qldauvao');

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
            $model = qlphieuthuchi::findorFail($id);
            $model->delete();

            return redirect('qldauvao');

        } else
            return view('errors.notlogin');
    }

    public function checkmaphieu(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['maphieu'])) {
            $model = qlphieuthuchi::where('maphieu', $inputs['maphieu'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
