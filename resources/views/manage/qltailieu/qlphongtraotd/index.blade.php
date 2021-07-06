@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop

@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }
        function getIdTr(id){
            document.getElementById("idtrans").value=id;
        }
        function ClickTrans(){
            $('#frm_trans').submit();
        }
        $(function(){
            $('#nam').change(function() {
                var nam = '&nam='+$('#nam').val();
                var phanloai = '&phanloai='+$('#phanloai').val();
                var url = '/qlphontraotd?'+nam+phanloai;
                window.location.href = url;
            });
        });
        $(function(){
            $('#phanloai').change(function() {
                var nam = '&nam='+$('#nam').val();
                var phanloai = '&phanloai='+$('#phanloai').val();
                var url = '/qlphontraotd?'+nam+phanloai;
                window.location.href = url;
            });
        });
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Danh sách<small>&nbsp; Phong trào thi đua</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <a href="{{url('qlphontraotd/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label style="font-weight: bold">Năm</label>
                                <select class="form-control" name="nam" id="nam">
                                    <?php
                                    $imax = date('Y') + 2;
                                    $imin = date('Y') - 4;
                                    ?>
                                    @for($i = $imin; $i <= $imax;$i++)
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : '' }}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label style="font-weight: bold">Phân loại</label>
                                <select class="form-control" name="phanloai" id="phanloai">
                                    <option value="XA" {{($inputs['phanloai'] == 'XA' ? 'selected' : '')}}>Phong trào thi đua cấp Xã</option>
                                    <option value="HUYEN" {{($inputs['phanloai'] == 'HUYEN' ? 'selected' : '')}}>Phong trào thi đua cấp Huyện</option>
                                    <option value="TINH" {{($inputs['phanloai'] == 'TINH' ? 'selected' : '')}}>Phong trào thi đua cấp Tỉnh</option>
                                    <option value="TU" {{($inputs['phanloai'] == 'TU' ? 'selected' : '')}}>Phong trào thi đua cấp Trung Ương</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="12%">Số quyết định</th>
                                <th style="text-align: center" width="50%">Nội dung</th>
                                <th style="text-align: center" width="10%">Ngày tháng</th>
                                <th style="text-align: center" width="10%">Phân loại</th>
                                <th style="text-align: center" width="22%">Thao tác</th>
                            </tr>
                            </thead>
                            @foreach($model as $key => $tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$tt->sophongtrao}}</td>
                                    <td>{{$tt->noidung}}</td>
                                    <td>{{getDayVn($tt->ngaythang)}}</td>
                                    <td class="active">{{$tt->phanloai}}</td>
                                    <td style="text-align: center">
                                        <a href="{{url('qlphontraotd'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                        <a href="{{url('qlphontraotd/'.$tt->id).'/edit'}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
                                    </td>

                                    <!--td style="text-align: center">
                                        <a href="{{url('qlphontraotd'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                        @if($tt->trangthai == 'CC' || $tt->trangthai == 'BTL')
                                            <a href="{{url('qlphontraotd/'.$tt->id).'/edit'}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            <button type="button" onclick="getIdTr('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#trans-modal" data-toggle="modal"><i class="fa fa-forward"></i>&nbsp;
                                                Chuyển</button>
                                        @endif
                                        @if($tt->trangthai == 'CD' && $tt->donvinhan == session('admin')->madonvi)
                                            <button type="button" onclick="getIdGet('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#get-modal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;
                                                Nhận</button>
                                            <button type="button" onclick="getIdBack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#back-modal" data-toggle="modal"><i class="fa fa-backward"></i>&nbsp;
                                                Trả</button>
                                        @endif
                                        @if($tt->trangthai == 'DD')
                                            <a href="{{url('qlphontraotd/'.$tt->id).'/traloi'}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Trả lời</a>
                                        @endif
                                        @if($tt->trangthai == 'BTL')
                                            <button type="button" onclick="viewLiDo('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#lydo-show" data-toggle="modal"><i class="fa fa-archive"></i>&nbsp;
                                                Lí do</button>
                                        @endif
                                        @if($tt->trangthai == 'CC')
                                            <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Xóa</button>
                                        @endif
                                    </td-->
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>

        <div class="modal fade" id="trans-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'qlphontraotd/trans','id' => 'frm_trans'])!!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Đồng ý chuyển?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class=" control-label">Người chuyển<span class="require">*</span></label>
                                {!!Form::text('nguoichuyen',null, array('id' => 'nguoichuyen','class' => 'form-control required'))!!}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idtrans" id="idtrans">
                    <div class="modal-footer">
                        <button type="submit" class="btn blue" onclick="ClickTrans()">Đồng ý</button>
                        <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="lydo-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Lí do trả hồ sơ</h4>
                    </div>
                    <input type="hidden" name="idback" id="idback">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" id="showlido">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'qlphontraotd/delete','id' => 'frm_delete'])!!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Đồng ý xóa?</h4>
                    </div>
                    <input type="hidden" name="iddelete" id="iddelete">
                    <div class="modal-footer">
                        <button type="submit" class="btn blue" onclick="ClickDelete()">Đồng ý</button>
                        <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <div class="modal fade" id="get-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'qlphontraotd/get','id' => 'frm_get'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý nhận?</h4>
                </div>
                <input type="hidden" name="idget" id="idget">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class=" control-label">Ngày nhận<span class="require">*</span></label>
                            {{--{!!Form::text('ngaynhan',isset($model->ngaynhan) ? date('d/m/Y',strtotime($model->ngaynhan)) : date('d/m/Y',strtotime(date('Y-m-d'))), array('id' => 'ngaynhan','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}--}}
                            <input type="date" name="ngaynhan" id="ngaynhan" class="form-control" value="{{date('Y-m-d')}}" style="text-align: center"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickGet()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="back-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'qlphontraotd','method'=>'post' , 'files'=>true,'id' => 'frm_back','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý trả?</h4>
                </div>
                <input type="hidden" name="idtra" id="idtra">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class=" control-label">Lí do trả lại<span class="require">*</span></label>
                            {!! Form::textarea('lido', null, ['id' => 'lido', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickBack()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        function getIdGet(id){
            document.getElementById("idget").value=id;
        }
        function getIdBack(id){
            document.getElementById("idtra").value=id;
        }
        function ClickTrans(){
            var str = '',strb1='';
            var ok = true;
            if($('#nguoichuyen').val()==''){
                strb1 += '  - Bạn cần nhập tên người chuyển \n';
                ok = false;
            }
            //Kết quả
            if ( ok == false){
                if(strb1!='')
                    str+='Người chuyển \n '+strb1 ;
                alert('Thông tin không được để trống \n' + str );
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else{
                $("form").unbind('submit').submit();
            }
        }

        function viewLiDo(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: 'qlphontraotd/lydo',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#showlido').replaceWith(data.message);
                    }
                }
            })
        }
    </script>
@stop