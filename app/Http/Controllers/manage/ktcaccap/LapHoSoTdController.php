<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\dmquoctich;
use App\Model\manage\ktcaccap\LapHoSoTd;
use App\model\manage\ktcaccap\laphosotdct;
use App\model\manage\ktcaccap\laphosotddf;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use App\model\manage\qltailieu\qlphongtrao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LapHoSoTdController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            if(session('admin')->sadmin == 'ssa')
                $model = LapHoSoTd::whereYear('ngayky',$inputs['nam'])->get();
            else
                $model = LapHoSoTd::whereYear('ngayky',$inputs['nam'])->where('madonvi',session('admin')->madonvi)
                    ->get();
            $modelpt = qlphongtrao::all();
            return view('manage.ktcaccap.laphosotd.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('modelpt',$modelpt)
                ->with('pageTitle','Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $nhomdh = dmdanhhieutd::all();
            $nhomht = dmhinhthuckt::all();
            $nhomlh = dmloaihinhkt::all();
            $nhomqt = dmquoctich::all();
            $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            $m_phongtrao = qlphongtrao::all();
            $inputs['kihieudhtd'] = getdate()[0];
            $modelct = laphosotddf::where('kihieudhtd',$inputs['kihieudhtd'])
                ->get();
            return view('manage.ktcaccap.laphosotd.create')
                ->with('inputs', $inputs)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('modeldt', $modeldt)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('modelct', $modelct)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['trangthai'] = 'CC';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') thêm mới ';
            if(isset($inputs['totrinh'])){
                $filedk = $request->file('totrinh');
                $inputs['totrinh'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/totrinh/', $inputs['totrinh']);
            }
            if(isset($inputs['qdkt'])){
                $filedk = $request->file('qdkt');
                $inputs['qdkt'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/qdkt/', $inputs['qdkt']);
            }
            if(isset($inputs['bienban'])){
                $filedk = $request->file('bienban');
                $inputs['bienban'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/bienban/', $inputs['bienban']);
            }
            if(isset($inputs['tailieukhac'])){
                $filedk = $request->file('tailieukhac');
                $inputs['tailieukhac'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/tailieukhac/', $inputs['tailieukhac']);
            }
            $model = new LapHoSoTd();
            $model->create($inputs);
            $m_dt = laphosotddf::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            if(isset($m_dt))
            {
                foreach($m_dt as $chitiet)
                {
                    $a_dt = $chitiet->toarray();
                    unset($a_dt['id']);
                    $modelct = new laphosotdct();
                    $modelct->create($a_dt);
                    $chitiet->delete();
                }
            }
            return redirect('laphosotd');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = LapHoSoTd::find($id);
            $nhomdh = dmdanhhieutd::all();
            $nhomht = dmhinhthuckt::all();
            $nhomlh = dmloaihinhkt::all();
            $nhomqt = dmquoctich::all();
            $m_phongtrao = qlphongtrao::all();
            $modelct = laphosotdct::where('kihieudhtd',$model->kihieudhtd)
                ->get();
            $m_pl = dmphanloaict::all();
            $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            return view('manage.ktcaccap.laphosotd.edit')
                ->with('model', $model)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('modelct', $modelct)
                ->with('m_pl', $m_pl)
                ->with('modeldt', $modeldt)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = LapHoSoTd::findOrFail($id);
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chỉnh sửa ';
            if(isset($inputs['totrinh'])){
                $filedk = $request->file('totrinh');
                $inputs['totrinh'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/totrinh/', $inputs['totrinh']);
            }
            if(isset($inputs['qdkt'])){
                $filedk = $request->file('qdkt');
                $inputs['qdkt'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/qdkt/', $inputs['qdkt']);
            }
            if(isset($inputs['bienban'])){
                $filedk = $request->file('bienban');
                $inputs['bienban'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/bienban/', $inputs['bienban']);
            }
            if(isset($inputs['tailieukhac'])){
                $filedk = $request->file('tailieukhac');
                $inputs['tailieukhac'] = $filedk->getClientOriginalExtension();
                $filedk->move(public_path() . '/data/tailieukhac/', $inputs['tailieukhac']);
            }
            $model->update($inputs);
            return redirect('laphosotd');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = LapHoSoTd::findOrFail($id);
            return view('manage.ktcaccap.laphosotd.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách hồ sơ thi đua');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = LapHoSoTd::findorFail($id);
            $model->delete();
            return redirect('laphosotd');
        }else
            return view('errors.notlogin');
    }

    public function trans(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $request->all()['idtrans'];
            $model = LapHoSoTd::findorFail($id);
            $inputs['trangthai'] = 'CD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chuyển hồ sơ ';
            $inputs['ngaychuyen'] = date('Y-m-d H:i:s');
            $model->nguoichuyen = $inputs['nguoichuyen'];
            $model->update($inputs);
            return redirect('laphosotd');
        }else
            return view('errors.notlogin');
    }

    public function checkkihieu(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        if (isset($inputs['kihieudhtd'])) {
            $model = LapHoSoTd::where('kihieudhtd', $inputs['kihieudhtd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
