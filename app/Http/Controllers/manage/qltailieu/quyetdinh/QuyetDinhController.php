<?php

namespace App\Http\Controllers\manage\qltailieu\quyetdinh;

use App\dmhinhthuckt;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use App\model\manage\qltailieu\qlquyetdinh;
use App\Model\manage\qltailieu\qlquyetdinhct;
use App\Model\manage\qltailieu\qlquyetdinhdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class QuyetDinhController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] :'XA';
            $hinhthuckt = dmhinhthuckt::all();
            $model = qlquyetdinh::all();
            return view('manage.qltailieu.qlquyetdinh.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('hinhthuckt',$hinhthuckt)
                ->with('pageTitle','Danh sách quyết định');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['maquyetdinh'] = getdate()[0];
            $m_pl = dmphanloaict::all();
            $modeldt = qldoituong::all();
            $modelct = qlquyetdinhdf::where('maquyetdinh',$inputs['maquyetdinh'])
                ->get();
            return view('manage.qltailieu.qlquyetdinh.create')
                ->with('modelct',$modelct)
                ->with('modeldt',$modeldt)
                ->with('m_pl',$m_pl)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Quyết định khen thưởng thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaythang'] = getDateToDb($inputs['ngaythang']);
            $inputs['madonvi'] = session('admin')->madonvi;
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') thêm mới ';
            $model = new qlquyetdinh();
            $model->create($inputs);
            $m_dt = qlquyetdinhdf::where('maquyetdinh',$inputs['maquyetdinh'])->get();
            if(isset($m_dt))
            {
                foreach($m_dt as $chitiet)
                {
                    $a_dt = $chitiet->toarray();
                    unset($a_dt['id']);
                    $modelct = new qlquyetdinhct();
                    $modelct->create($a_dt);
                    $chitiet->delete();
                }
            }

            return redirect('qlquyetdinhkt');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = qlquyetdinh::find($id);
            $m_qdct = qlquyetdinhct::where('maquyetdinh',$model->maquyetdinh)->get();
            $modeldt = qldoituong::all();
            $modelct = qlquyetdinhct::where('maquyetdinh',$model->maquyetdinh)
                ->get();
            $m_pl = dmphanloaict::all();
            return view('manage.qltailieu.qlquyetdinh.edit')
                ->with('model', $model)
                ->with('m_qdct', $m_qdct)
                ->with('modeldt', $modeldt)
                ->with('modelct',$modelct)
                ->with('m_pl',$m_pl)
                ->with('pageTitle', 'Quyết định khen thưởng chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = qlquyetdinh::findOrFail($id);
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chỉnh sửa ';
            $model->update($inputs);

            return redirect('qlquyetdinhkt');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = qlquyetdinh::findOrFail($id);
            return view('manage.qltailieu.qlquyetdinh.show')
                ->with('model', $model)
                ->with('pageTitle', 'Danh sách đăng ký thi đua');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $id = $request->all()['iddelete'];
            $model = qlquyetdinh::findorFail($id);
            $model->delete();
            return redirect('qlquyetdinhkt');
        }else
            return view('errors.notlogin');
    }

    public function trans(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $request->all()['idtrans'];
            $model = qlquyetdinh::findorFail($id);
            $inputs['trangthai'] = 'CD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') chuyển hồ sơ ';
            $inputs['ngaychuyen'] = date('Y-m-d H:i:s');
            $model->nguoichuyen = $inputs['nguoichuyen'];
            $model->update($inputs);
            return redirect('qlquyetdinhkt');
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
            $model = qlquyetdinh::where('id',$inputs['id'])
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
            $model = qlquyetdinh::where('kihieudhtd', $inputs['kihieudhtd'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
                $result['message'] = 'ok';
            }
        }
        die(json_encode($result));
    }

    public function get(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idget'];
            $model = qlquyetdinh::findorFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') nhận hồ sơ';
            $model->ngaynhan = $inputs['ngaynhan'];
            $model->update($inputs);
            return redirect('qlquyetdinhkt');
        }else
            return view('errors.notlogin');
    }
    public function traloi($id){
        if (Session::has('admin')) {
            $model = qlquyetdinh::find($id);
            $nhomql = dmdonvi::select('madonvi','tendv')
                ->where('caphanhchinh','HUYEN')->orwhere('caphanhchinh','TINH')->get();
            return view('manage.qltailieu.qlquyetdinh.traloi')
                ->with('model', $model)
                ->with('nhomql', $nhomql)
                ->with('pageTitle', 'Trả lời câu hỏi');
        } else
            return view('errors.notlogin');
    }
    public function anser(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = qlquyetdinh::findOrFail($id);
            $inputs['nguoitraloi'] = session('admin')->username.'('.session('admin')->name.') -- trả lời ';
            $inputs['ngaytraloi'] = date('Y-m-d H:i:s');
            $inputs['trangthai'] = 'TL';
            $model->update($inputs);

            return redirect('qlquyetdinhkt');
        }else
            return view('errors.notlogin');
    }
    public function back(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idtra'];
            $model = qlquyetdinh::findorFail($id);
            $inputs['trangthai'] = 'BTL';
            $inputs['ttthaotac'] = session('admin')->username.'('.session('admin')->name.') trả hồ sơ';
            $model->update($inputs);
            return redirect('qlquyetdinhkt');
        }else
            return view('errors.notlogin');
    }
    public function doituong(Request $request){
        dd($request);
    }
}