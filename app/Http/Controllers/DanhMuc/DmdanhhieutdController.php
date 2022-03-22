<?php

namespace App\Http\Controllers\DanhMuc;

use App\DanhMuc\dmdanhhieutd;
use App\dmtieuchuandhtd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmdanhhieutdController extends Controller
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
            //dd($inputs);
            $model = dmdanhhieutd::all();
            return view('system.DanhHieuThiDua.ThongTin')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('a_phanloai', getPhanLoaiTDKT())
                ->with('pageTitle', 'Danh sách danh mục danh hiệu thi đua');

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
            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
                return view('system.dmdanhhieutd.create')
                    ->with('pageTitle', 'Tạo mới thông tin danh mục danh hiệu thi đua');
            }
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
            $model = dmdanhhieutd::where('madanhhieutd', $inputs['madanhhieutd'])->first();

            if ($model == null) {
                $inputs['madanhhieutd'] = getdate()[0];
                dmdanhhieutd::create($inputs);
            } else {
                $model->update($inputs);
            }
            return redirect('/DanhHieuThiDua/ThongTin');

        } else {
            return view('errors.notlogin');
        }
    }

    public function TieuChuan(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
//            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
            $m_danhhieu = dmdanhhieutd::all();
            $inputs['tendanhhieutd'] = $m_danhhieu->where('madanhhieutd', $inputs['madanhhieutd'])->first()->tendanhhieutd ?? '';
            $model = dmtieuchuandhtd::where('madanhhieutd', $inputs['madanhhieutd'])->get();
            return view('system.DanhHieuThiDua.TieuChuan')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('a_danhhieu', array_column($m_danhhieu->toArray(),'tendanhhieutd','madanhhieutd' ))
                ->with('pageTitle', 'Thông tin tiêu chuẩn danh hiệu thi đua');
//            }
        }
    }

    public function ThemTieuChuan(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = dmtieuchuandhtd::where('matieuchuandhtd', $inputs['matieuchuandhtd'])->first();

            if ($model == null) {
                $inputs['matieuchuandhtd'] = getdate()[0];
                dmtieuchuandhtd::create($inputs);
            } else {
                $model->update($inputs);
            }
            return redirect('DanhHieuThiDua/TieuChuan?madanhhieutd='.$inputs['madanhhieutd']);

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

            $model = dmdanhhieutd::findOrFail($id);
            return view('system.dmdanhhieutd.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin danh mục danh hiệu thi đua');
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
            $model = dmdanhhieutd::findOrFail($id);
            $model->update($input);
            return redirect('dmdanhhieutd');

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
            $model = dmdanhhieutd::findorFail($id);
            $model->delete();

            return redirect('dmdanhhieutd');

        } else
            return view('errors.notlogin');
    }

    public function checkmadanhhieutd(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['madanhhieutd'])) {
            $model = dmdanhhieutd::where('madanhhieutd', $inputs['madanhhieutd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
