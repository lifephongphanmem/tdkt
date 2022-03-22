<?php

namespace App\Http\Controllers\system;

use App\DSDiaBan;
use App\DSDonVi;
use App\DSTaiKhoan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DSTaiKhoanController extends Controller
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
            $m_donvi = DSDonVi::all();
            $m_diaban = DSDiaBan::all();
            //dd($m_donvi);
            $inputs['madonvi'] = $inputs['madonvi'] ?? $m_donvi->first()->madonvi;
            $model = DSTaiKhoan::where('madonvi', $inputs['madonvi'])->get();
            return view('system.TaiKhoan.ThongTin')
                ->with('model', $model)
                ->with('m_donvi', $m_donvi)
                ->with('m_diaban', $m_diaban)
                ->with('a_nhomtk', [])
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách đơn vị');

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
