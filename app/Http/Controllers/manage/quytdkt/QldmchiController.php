<?php

namespace App\Http\Controllers\manage\quytdkt;

use App\Model\manage\quytdkt\qldmchi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QldmchiController extends Controller
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
            $inputs['madmchi'] = isset($inputs['madmchi']) ? $inputs['madmchi'] : '';
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : '';
            $model = qldmchi::where('madonvi',session('admin')->madonvi)->get();
            if($inputs['madmchi'] != '')
                $model=$model->where('madmchi',$inputs['madmchi']);
            if($inputs['phanloai'] != '')
                $model = $model->where('phanloai',$inputs['phanloai']);
            return view('manage.quytdkt.dmchi.index')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách quản lý danh mục chi');

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
            return view('manage.quytdkt.dmchi.create')
                ->with('pageTitle', 'Tạo mới thông tin danh mục chi');
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
            $model = new qldmchi();
            $inputs['sotien'] = getDouble($inputs['sotien']);
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $model->create($inputs);
            return redirect('qldmchi');

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

            $model = qldmchi::findOrFail($id);
            return view('manage.quytdkt.dmchi.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin danh mục chi');
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
            $model = qldmchi::findOrFail($id);
            $input['sotien'] = getDouble($input['sotien']);
            $model->update($input);
            return redirect('qldmchi');

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
            $model = qldmchi::findorFail($id);
            $model->delete();

            return redirect('qldmchi');

        } else
            return view('errors.notlogin');
    }

    public function checkmadmchi(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['madmchi'])) {
            $model = qldmchi::where('madmchi', $inputs['madmchi'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
