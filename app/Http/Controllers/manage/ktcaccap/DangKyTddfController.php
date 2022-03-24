<?php

namespace App\Http\Controllers\manage\ktcaccap;

use App\DanhMuc\dmdanhhieutd;
use App\model\manage\ktcaccap\dangkytddf;
use App\model\manage\qldoituong\dmphanloaict;
use App\Model\manage\qldoituong\qldoituong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DangKyTddfController extends Controller
{
    public function themdoituong (Request $request){
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
        $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
        $modeltddf = new dangkytddf();
        $inputs['madktdct'] = getdate()[0];
        $modeltddf->create($inputs);
        $m_pl = dmphanloaict::all();
        $modelct = dangkytddf::where('kihieudhtd',$inputs['kihieudhtd'])
            ->get();
        $slcanhan = 0;
        $sltapthe = 0;

        if(isset($modelct)){

            $result['message'] = '<div class="row" id="dsdt">';

            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên đối tượng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Phân loại</th>';
            $result['message'] .= '<th style="text-align: center" width="25%">Địa chỉ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Danh hiệu thi đua</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key=0;
            if(count($modelct) > 0){
                foreach($modelct as $ct){
                    $key++;
                    $phanloai = $m_pl->where('maplct',$modeldt->where('madt',$ct->madt)->first()->phanloaict)->first()->mapl;
                    if($phanloai == 'CN')
                        $slcanhan++;
                    elseif($phanloai != 'CN'){
                        $sltapthe++;
                    }
                    $result['message'] .= '<tr id="'.$ct->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.$key.'</td>';
                    $result['message'] .= '<td class="success">'.$modeldt->where('madt',$ct->madt)->first()->tendt.'</td>';
                    $result['message'] .= '<td class="active">'.($m_pl->where('maplct',$modeldt->where('madt',$ct->madt)->first()->phanloaict)->first()->tenplct ?? '').'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$modeldt->where('madt',$ct->madt)->first()->diachi.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ct->tendanhhieutd.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getId('.$ct->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$ct->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'
                        .'</td>';

                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '<input hidden id="slcanhan" name="slcanhan" value="'.$slcanhan.'">';
                $result['message'] .= '<input hidden id="sltapthe" name="sltapthe" value="'.$sltapthe.'">';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }
    public function suadoituong (Request $request){
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
        $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
        $nhomdh = dmdanhhieutd::all();
        if(isset($inputs['id'])){
            $id = $inputs['id'];
            $model = dangkytddf::findOrFail($id);

            $result['message'] = '<div class="modal-body" id="ttpedit">';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đối tượng:<span class="require">*</span></label>';
            $result['message'] .= '<div><select id="madtedit" name="madtedit" class="form-control js-example-basic-single">';
            foreach($modeldt as $dt) {
                if($dt->madt == $model->madt) {
                    $result['message'] .= '<option  Selected " value="' . $dt->madt . '" >' . $dt->tendt . '</option>';
                }else{
                    $result['message'] .= '<option " value="' . $dt->madt . '" >' . $dt->tendt . '</option>';
                }
            }
            $result['message'] .='</select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Danh hiệu thi đua<span class="require">*</span></label>';
            $result['message'] .= '<div> <select id="tendanhhieutdedit" name="tendanhhieutdedit" class="form-control js-example-basic-single">';
            foreach($nhomdh as $nhom)
                if($nhom->tendanhhieutd == $model->tendanhhieutd) {
                    $result['message'] .= '<option Selected value="'.$nhom->tendanhhieutd.'">'.$nhom->tendanhhieutd.'</option>';
                }else{
                    $result['message'] .= '<option value="'.$nhom->tendanhhieutd.'">'.$nhom->tendanhhieutd.'</option>';
                }
            $result['message'] .= '</select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$model->id.'">';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
    public function updatedt (Request $request){
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
        //dd($request->all());
        $inputs = $request->all();
        $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
        $m_pl = dmphanloaict::all();
        $slcanhan = 0;
        $sltapthe = 0;
        //dd($inputs);
        if(isset($inputs['id'])) {
            $id = $inputs['id'];
            $modelttp = dangkytddf::findOrFail($id);
            $modelttp->madt = $inputs['madt'];
            $modelttp->tendanhhieutd = $inputs['tendanhhieutd'];
            $modelttp->save();

            $model = dangkytddf::where('kihieudhtd', $inputs['kihieudhtd'])
                ->get();
            $result['message'] = '<div class="row" id="dsdt">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên đối tượng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Phân loại</th>';
            $result['message'] .= '<th style="text-align: center" width="25%">Địa chỉ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Danh hiệu thi đua</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            $key = 0;
            if (count($model) > 0) {
                foreach ($model as $ct) {

                    $key++;
                    $phanloai = $m_pl->where('maplct', $modeldt->where('madt', $ct->madt)->first()->phanloaict)->first()->mapl;
                    if ($phanloai == 'CN')
                        $slcanhan++;
                    elseif ($phanloai != 'CN') {
                        $sltapthe++;
                    }
                    $result['message'] .= '<tr id="' . $ct->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . $key . '</td>';
                    $result['message'] .= '<td class="success">' . $modeldt->where('madt', $ct->madt)->first()->tendt . '</td>';
                    $result['message'] .= '<td class="active">' . $m_pl->where('maplct', $modeldt->where('madt', $ct->madt)->first()->phanloaict)->first()->tenplct . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $modeldt->where('madt', $ct->madt)->first()->diachi . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $ct->tendanhhieutd . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getId(' . $ct->id . ')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh(' . $ct->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'
                        . '</td>';

                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '<input hidden id="slcanhan" name="slcanhan" value="' . $slcanhan . '">';
                $result['message'] .= '<input hidden id="sltapthe" name="sltapthe" value="' . $sltapthe . '">';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }

        }

        die(json_encode($result));
    }
    public function delete(Request $request){
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
        $slcanhan = 0;
        $sltapthe = 0;
        $inputs = $request->all();
        $m_pl = dmphanloaict::all();
        $modeldt = qldoituong::where('madonvi',session('admin')->madonvi)->get();
        if(isset($inputs['id'])){

            $modeldangkytddf = dangkytddf::where('id',$inputs['id'])->first();
            $modeldangkytddf->delete();

            $modelct = dangkytddf::where('kihieudhtd',$inputs['kihieudhtd'])
                ->get();

            $result['message'] = '<div class="row" id="dsdt">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" >';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên đối tượng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Phân loại</th>';
            $result['message'] .= '<th style="text-align: center" width="25%">Địa chỉ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Danh hiệu thi đua</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            $key=0;
            if(count($modelct) > 0){
                foreach($modelct as $ct){
                    $key++;
                    $phanloai = $m_pl->where('maplct',$modeldt->where('madt',$ct->madt)->first()->phanloaict)->first()->mapl;
                    if($phanloai == 'CN')
                        $slcanhan++;
                    elseif($phanloai != 'CN'){
                        $sltapthe++;
                    }
                    $result['message'] .= '<tr id="'.$ct->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.$key.'</td>';
                    $result['message'] .= '<td class="success">'.$modeldt->where('madt',$ct->madt)->first()->tendt.'</td>';
                    $result['message'] .= '<td class="active">'.($m_pl->where('maplct',$modeldt->where('madt',$ct->madt)->first()->phanloaict)->first()->tenplct ?? '').'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$modeldt->where('madt',$ct->madt)->first()->diachi.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ct->tendanhhieutd.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getId('.$ct->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$ct->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '<input hidden id="slcanhan" name="slcanhan" value="'.$slcanhan.'">';
                $result['message'] .= '<input hidden id="sltapthe" name="sltapthe" value="'.$sltapthe.'">';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }
}
