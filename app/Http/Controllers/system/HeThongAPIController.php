<?php

namespace App\Http\Controllers\system;

use App\DSDiaBan;
use App\DSDonVi;
use App\DSTaiKhoan;
use App\Model\manage\ktcaccap\DangKyTd;
use App\Model\manage\qldoituong\qldoituong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HeThongAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CaNhan(Request $request)
    {
        if (Session::has('admin')) {
            $model = qldoituong::where('phanloai','CANHAN')->wherenotnull('madt')->get();
            $m_donvi = DSDonVi::all();
            foreach ($model as $TK){

                $TK->tendonvi = $m_donvi->where('madonvi',$TK->madonvi)->first()->tendonvi ?? '';
                $TK->linkAPI=$request->server()['SERVER_NAME'].'/api/getAPI?name='.$TK->madt.'&token='.md5($TK->tendt.$TK->madv).'&phanloai=CANHAN';
            }
            return view('system.HeThongAPI.CaNhan')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách kết nối API');

        } else
            return view('errors.notlogin');
    }

    public function TapThe(Request $request)
    {
        if (Session::has('admin')) {
            $model = qldoituong::where('phanloai','TAPTHE')->wherenotnull('madonvi')->get();
            $m_donvi = DSDonVi::all();
            foreach ($model as $TK){
                $TK->tendonvi = $m_donvi->where('madonvi',$TK->madonvi)->first()->tendonvi ?? '';
                $TK->linkAPI=$request->server()['SERVER_NAME'].'/api/getAPI?name='.$TK->id.'&token='.md5($TK->madonvi.$TK->tendonvi).'&phanloai=DONVI';
            }
            return view('system.HeThongAPI.TapThe')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách kết nối API');

        } else
            return view('errors.notlogin');
    }

    public function PhongTrao(Request $request)
    {
        if (Session::has('admin')) {
            $model = DangKyTd::all();
            //dd($model);
            $m_donvi = DSDonVi::all();
            foreach ($model as $TK){
                $TK->tendonvi = $m_donvi->where('madonvi',$TK->madonvi)->first()->tendonvi ?? '';
                $TK->linkAPI=$request->server()['SERVER_NAME'].'/api/getAPI?name='.$TK->id.'&token='.md5($TK->id.$TK->kihieutdkt).'&phanloai=PHONGTRAO';
            }
            return view('system.HeThongAPI.PhongTrao')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách kết nối API');

        } else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_donvi = DSDonVi::all();
            return view('system.TaiKhoan.Them')
                ->with('inputs', $inputs)
                ->with('a_donvi', array_column($m_donvi->toArray(),'tendonvi','madonvi'))
                ->with('pageTitle', 'Tạo mới thông tin tài khoản');

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
            //dd($inputs);
            $inputs['nhaplieu'] = isset($inputs['nhaplieu']) ? 1 : 0;
            $inputs['tonghop'] = isset($inputs['tonghop']) ? 1 : 0;
            $inputs['quantri'] = isset($inputs['quantri']) ? 1 : 0;
            $inputs['username'] = chuanhoachuoi($inputs['username']);
            $inputs['password'] = md5($inputs['password']);
            DSTaiKhoan::create($inputs);
            return redirect('/TaiKhoan/ThongTin?madonvi='.$inputs['madonvi']);

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
