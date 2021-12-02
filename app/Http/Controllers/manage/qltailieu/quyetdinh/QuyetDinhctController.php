<?php

namespace App\Http\Controllers\manage\qltailieu\quyetdinh;

use App\Model\manage\qldoituong\qldoituong;
use App\Model\manage\qltailieu\qlquyetdinhct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QuyetDinhctController extends Controller
{
    public function store(Request $request){
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
        $arrayid = explode('-', $inputs['ids']);
        $model = qldoituong::wherein('id',$arrayid)->get();
        foreach($model as $ct) {
            $m_qlquyetdinhdf = new qlquyetdinhdf();
            $a_hs = qldoituong::find($ct->id)->toarray();
            $a_hs['maquyetdinh'] = $inputs['maquyetdinh'];
            unset($a_hs['id']);
            $m_qlquyetdinhdf->create($a_hs);
        }
        $m_pl = dmphanloaict::all();
        $modelct = qlquyetdinhdf::where('maquyetdinh',$inputs['maquyetdinh'])
            ->get();
        if(isset($modelct)){
            $result['message'] = '<div class="row" id="dsdt">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên đối tượng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Phân loại</th>';
            $result['message'] .= '<th style="text-align: center" width="25%">Địa chỉ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mã định danh</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            $key=0;
            if(count($modelct) > 0){
                foreach($modelct as $ct){
                    $key++;
                    $result['message'] .= '<tr id="'.$ct->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.$key.'</td>';
                    $result['message'] .= '<td class="success">'.$ct->tendt.'</td>';
                    $result['message'] .= '<td class="active">'.$m_pl->where('maplct',$ct->phanloaict)->first()->tenplct.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ct->diachi.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ct->madinhdanh.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getId('.$ct->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
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

        $inputs = $request->all();
        $m_pl = dmphanloaict::all();
        if(isset($inputs['id'])){
            $modelqlquyetdinhdf = qlquyetdinhdf::where('id',$inputs['id'])->first();
            $modelqlquyetdinhdf->delete();

            $modelct = qlquyetdinhdf::where('maquyetdinh',$inputs['maquyetdinh'])
                ->get();

            $result['message'] = '<div class="row" id="dsdt">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên đối tượng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Phân loại</th>';
            $result['message'] .= '<th style="text-align: center" width="25%">Địa chỉ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mã định danh</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            $key=0;
            if(count($modelct) > 0){
                foreach($modelct as $ct){
                    $key++;
                    $result['message'] .= '<tr id="'.$ct->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.$key.'</td>';
                    $result['message'] .= '<td class="success">'.$ct->tendt.'</td>';
                    $result['message'] .= '<td class="active">'.$m_pl->where('maplct',$ct->phanloaict)->first()->tenplct.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ct->diachi.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ct->madinhdanh.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getId('.$ct->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }
}
