<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\dmdonvi;
use App\Model\manage\ktcaccap\dangkytdct;
use App\Model\manage\ktcaccap\LapHoSoTd;
use App\model\manage\ktcaccap\laphosotdct;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use App\model\manage\qltailieu\qlphongtrao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DuyetHoSoCapDuoiController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['phongtrao'] = isset($inputs['phongtrao']) ? $inputs['phongtrao'] : 'ALL';
            if(session('admin')->sadmin == 'ssa')
                $model = LapHoSoTd::whereYear('ngayky',$inputs['nam'])->where('trangthai', 'CD')->get();
            else
                $model = LapHoSoTd::whereYear('ngayky',$inputs['nam'])
                    ->where('trangthai', 'CD')
                    ->where('macqcq',session('admin')->madonvi)
                    ->get();
            if($inputs['phongtrao'] != 'ALL')
                $model = $model->where('plphongtrao', $inputs['phongtrao']);
            $modelpt = qlphongtrao::all();
            return view('manage.ktcaccap.duyethosocapduoi.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('modelpt',$modelpt)
                ->with('pageTitle','Xét duyệt danh sách hồ sơ đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function get(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idget'];
            $model = LapHoSoTd::findorFail($id);
            $inputs['trangthaihuyen'] = 'DD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') nhận hồ sơ';
            $model->ngaynhan = $inputs['ngaynhan'];
            $model->update($inputs);
            return redirect('duyethosocapduoi');
        }else
            return view('errors.notlogin');
    }

    public function back(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idback'];
            $model = LapHoSoTd::findorFail($id);
            $inputs['trangthaihuyen'] = 'BTL';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') trả hồ sơ';
            $model->update($inputs);
            return redirect('duyethosocapduoi');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = LapHoSoTd::findOrFail($id);
            $m_phongtrao = qlphongtrao::all();
            $modelct = laphosotdct::where('kihieudhtd',$model->kihieudhtd)
                ->get();
            $m_pl = dmphanloaict::all();
            $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            $m_donvi = dmdonvi::where('madonvi',$model->madonvi)->first();
            return view('manage.ktcaccap.duyethosocapduoi.show')
                ->with('model', $model)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('modelct', $modelct)
                ->with('m_pl', $m_pl)
                ->with('modeldt', $modeldt)
                ->with('m_donvi', $m_donvi)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function lydo(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        if(isset($inputs['id'])){
            $model = LapHoSoTd::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="col-md-12" id="showlido">';
            $result['message'] .= '<label class="control-label">'.$model->lido.'</label>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
}
