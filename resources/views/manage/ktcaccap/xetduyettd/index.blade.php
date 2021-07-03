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
        function getIdGet(id){
            document.getElementById("idget").value=id;
        }
        function getIdBack(id){
            document.getElementById("idback").value=id;
        }
        function ClickGet(){
            $('#frm_get').submit();
        }
        function ClickBack(){
            $('#frm_back').submit();
        }
        $(function(){
            $('#nam').change(function() {
                var nam = '&nam='+$('#nam').val();
                var url = '/dangkytd?'+nam;
                window.location.href = url;
            });
        });
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Danh sách<small>&nbsp;đăng ký thi đua</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                {{--<div class="portlet-title">
                    <div class="actions">
                        <a href="{{url('dangkytd/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </div>
                <hr>--}}
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
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="12%">Tên đối tượng được khen</th>
                                <th style="text-align: center" width="12%">Chức danh lãnh đạo</th>
                                <th style="text-align: center" width="5%">Số quyết định</th>
                                <th style="text-align: center" width="5%">Ngày ký</th>
                                <th style="text-align: center" width="8%">Thành tích khen</th>
                                <th style="text-align: center" width="8%">Trạng thái</th>
                                <th style="text-align: center" width="22%">Thao tác</th>
                            </tr>
                            </thead>
                            @foreach($model as $key => $tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$tt->tendtkt}}</td>
                                    <td>{{$tt->chucdanhld}}</td>
                                    <td class="active">{{$tt->soqd}}</td>
                                    <td style="text-align: center">{{getDayVn($tt->ngayky)}}</td>
                                    <td style="text-align: center">{{$tt->thanhtichkhen}}</td>
                                    @if($tt->trangthai == "CC")
                                        <td align="center"><span class="badge badge-warning">Chờ chuyển</span></td>
                                    @elseif($tt->trangthai == 'CD')
                                        <td align="center"><span class="badge badge-blue">Chờ duyệt</span>
                                            <br>Thời gian chuyển:<br><b>{{getDateTime($tt->ngaychuyen)}}</b>
                                        </td>
                                    @elseif($tt->trangthai == 'CN')
                                        <td align="center"><span class="badge badge-warning">Chờ nhận</span>
                                            <br>Thời gian chuyển:<br><b>{{getDateTime($tt->ngaychuyen)}}</b>
                                        </td>
                                    @elseif($tt->trangthai == 'BTL')
                                        <td align="center">
                                            <span class="badge badge-danger">Bị trả lại</span><br>&nbsp;
                                        </td>
                                    @else
                                        <td align="center">
                                            <span class="badge badge-success">Đã duyệt</span>
                                            <br>Thời gian chuyển:<br><b>{{getDateTime($tt->ngaychuyen)}}</b>
                                        </td>
                                    @endif
                                    <td style="text-align: center">
                                        <a href="{{url('dangkytd/'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                        @if($tt->trangthai == 'CD')
                                            <button type="button" onclick="getIdGet('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#get-modal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;
                                                Duyệt</button>
                                            <button type="button" onclick="getIdBack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#back-modal" data-toggle="modal"><i class="fa fa-backward"></i>&nbsp;
                                                Trả</button>
                                        @elseif($tt->trangthai == 'BTL')
                                            <button type="button" onclick="viewLiDo('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#lydo-show" data-toggle="modal"><i class="fa fa-archive"></i>&nbsp;
                                                Lí do</button>
                                        @endif
                                    </td>
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

        <div class="modal fade" id="get-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'duyetdktd/get','id' => 'frm_get'])!!}
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
                    {!! Form::open(['url'=>'duyetdktd/back','method'=>'post' , 'files'=>true,'id' => 'frm_back','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Đồng ý trả?</h4>
                    </div>
                    <input type="hidden" name="idback" id="idback">
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
    </div>
    <script>
        function ClickGet(){
            var str = '',strb1='';
            var ok = true;
            if($('#ngaynhan').val()==''){
                strb1 += '  - Bạn cần nhập ngày nhận \n';
                ok = false;
            }
            //Kết quả
            if ( ok == false){
                if(strb1!='')
                    str+='Ngày nhận \n '+strb1 ;
                alert('Thông tin không được để trống \n' + str );
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else{
                $("form").unbind('submit').submit();
            }
        }

        function ClickBack(){
            var str = '',strb1='';
            var ok = true;
            if($('#lido').val()==''){
                strb1 += '  - Bạn cần nhập lí do trả lại \n';
                ok = false;
            }
            //Kết quả
            if ( ok == false){
                if(strb1!='')
                    str+='Lí do trả lại \n '+strb1 ;
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
                url: '/dangkytd/lydo',
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