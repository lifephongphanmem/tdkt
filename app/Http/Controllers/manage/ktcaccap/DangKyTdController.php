<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\dmdanhhieutd;
use App\dmhinhthuckt;
use App\dmloaihinhkt;
use App\dmquoctich;
use App\Model\manage\ktcaccap\DangKyTd;
use App\Model\manage\ktcaccap\dangkytdct;
use App\model\manage\ktcaccap\dangkytddf;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use App\model\manage\qltailieu\qlphongtrao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DangKyTdController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            if(session('admin')->sadmin == 'ssa')
                $model = DangKyTd::whereYear('ngayky',$inputs['nam'])->get();
            else
                $model = DangKyTd::whereYear('ngayky',$inputs['nam'])->where('madonvi',session('admin')->madonvi)
                ->get();
            $modelpt = qlphongtrao::all();
            return view('manage.ktcaccap.dangkytd.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('modelpt',$modelpt)
                ->with('pageTitle','Danh sách đăng ký thi đua');
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
            $modelct = dangkytddf::where('kihieudhtd',$inputs['kihieudhtd'])
                ->get();
            return view('manage.ktcaccap.dangkytd.create')
                ->with('inputs', $inputs)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('m_phongtrao',$m_phongtrao)
                ->with('modelct',$modelct)
                ->with('modeldt',$modeldt)
                ->with('pageTitle', 'Danh sách đăng ký thi đua thêm mới');
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
            $model = new DangKyTd();
            $model->create($inputs);
            $m_dt = dangkytddf::where('kihieudhtd',$inputs['kihieudhtd'])->get();
            if(isset($m_dt))
            {
                foreach($m_dt as $chitiet)
                {
                    $a_dt = $chitiet->toarray();
                    unset($a_dt['id']);
                    $modelct = new dangkytdct();
                    $modelct->create($a_dt);
                    $chitiet->delete();
                }
            }
            return redirect('dangkytd');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = DangKyTd::find($id);
            $nhomdh = dmdanhhieutd::all();
            $nhomht = dmhinhthuckt::all();
            $nhomlh = dmloaihinhkt::all();
            $nhomqt = dmquoctich::all();
            $m_phongtrao = qlphongtrao::all();
            $modelct = dangkytdct::where('kihieudhtd',$model->kihieudhtd)
                ->get();
            $m_pl = dmphanloaict::all();
            $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
            return view('manage.ktcaccap.dangkytd.edit')
                ->with('model', $model)
                ->with('nhomdh', $nhomdh)
                ->with('nhomht', $nhomht)
                ->with('nhomlh', $nhomlh)
                ->with('nhomqt', $nhomqt)
                ->with('m_phongtrao', $m_phongtrao)
                ->with('modelct', $modelct)
                ->with('m_pl', $m_pl)
                ->with('modeldt', $modeldt)
                ->with('pageTitle', 'Danh sách đăng ký thi đua chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DangKyTd::findOrFail($id);
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
            return redirect('dangkytd');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = DangKyTd::findOrFail($id);
            return view('manage.ktcaccap.dangkytd.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = DangKyTd::findorFail($id);
            $model->delete();
            return redirect('dangkytd');
        }else
            return view('errors.notlogin');
    }

    public function trans(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $request->all()['idtrans'];
            $model = DangKyTd::findorFail($id);
            $inputs['trangthai'] = 'CD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chuyển hồ sơ ';
            $inputs['ngaychuyen'] = date('Y-m-d H:i:s');
            $model->nguoichuyen = $inputs['nguoichuyen'];
            $model->update($inputs);
            return redirect('dangkytd');
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

        $inputs = $request->all();
        if(isset($inputs['id'])){
            $model = DangKyTd::where('id',$inputs['id'])
                ->first();
            $result['message'] = '<div class="col-md-12" id="showlido">';
            $result['message'] .= '<label class="control-label">'.$model->lido.'</label>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function checkkihieu(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();
        if (isset($inputs['kihieudhtd'])) {
            $model = DangKyTd::where('kihieudhtd', $inputs['kihieudhtd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }
}
