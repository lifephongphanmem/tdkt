<?php

namespace App\Http\Controllers\system;

use App\DSDiaBan;
use App\DSDonVi;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DSDonViController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ThongTin(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DSDiaBan::all();
            return view('system.dmdonvi.ThongTin')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách đơn vị');

        } else
            return view('errors.notlogin');
    }

    public function DanhSach(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['tendiaban'] = DSDiaBan::where('madiaban',$inputs['madiaban'])->first()->tendiaban ?? '';
            $model = DSDonVi::where('madiaban',$inputs['madiaban'])->get();
            return view('system.dmdonvi.index')
                ->with('model', $model)
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
    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            //$modeldvql = DSDonVi::where('tonghop', '1')->get();
            return view('system.dmdonvi.create')
                //->with('modeldvql', $modeldvql)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Tạo mới thông tin đơn vị');

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
            $inputs['ttnguoitao'] = session('admin')->name.'('.session('admin')->username.')'. getDateTime(Carbon::now()->toDateTimeString());
            $inputs['madonvi'] = getdate()[0];
            //dd($inputs);
            DSDonVi::create($inputs);
            return redirect('/DonVi/DanhSach?madiaban='.$inputs['madiaban']);

        } else {
            return view('errors.notlogin');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DSDonVi::where('madonvi',$inputs['madonvi'])->first();
            return view('system.dmdonvi.edit')
                ->with('model', $model)
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
            $model = DSDonVi::findOrFail($id);
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
            $model = DSDonVi::findorFail($id);
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
            $model = DSDonVi::where('madonvi', $inputs['madonvi'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
