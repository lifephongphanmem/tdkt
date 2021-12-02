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
        $(function(){
            $('#nam').change(function() {
                var nam = '&nam='+$('#nam').val();
                var url = '/kyniemchuong?'+nam;
                window.location.href = url;
            });
        });
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Danh sách<small>&nbsp;kỷ niệm chương (tỉnh Hà Bắc cũ)</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <a href="{{url('kyniemchuong/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label style="font-weight: bold">Năm nhập hồ sơ khen thưởng</label>
                                <select class="form-control" name="nam" id="nam">
                                    <?php
                                    $imax = date('Y') + 1;
                                    $imin = date('Y') - 5;
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
                                <th style="text-align: center" width="12%">Loại khen thưởng</th>
                                <th style="text-align: center" width="12%">Hình thức khen thưởng</th>
                                <th style="text-align: center" width="5%">Số quyết định/Số được duyệt</th>
                                <th style="text-align: center" width="5%">Thời gian tham gia kháng chiến</th>
                                <th style="text-align: center" width="8%">Loại hồ sơ kháng chiến</th>
                                <th style="text-align: center" width="22%">Thao tác</th>
                            </tr>
                            </thead>
                            @foreach($model as $key => $tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$model_lh->where('maloaihinhkt',$tt->loaikt)->first()->tenloaihinhkt}}</td>
                                    <td>{{$model_ht->where('mahinhthuckt',$tt->hinhthuckt)->first()->tenhinhthuckt}}</td>
                                    <td class="active">Số hợp đồng: {{$tt->soqd}} <br> Số được duyệt: {{$tt->sodd}}</td>
                                    <td style="text-align: center">{{getDayVn($tt->tgiantgkc)}}</td>
                                    <td style="text-align: center">{{$tt->loaihskc}}</td>
                                    <td style="text-align: center">
                                        <a href="{{url('kyniemchuong/'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                        <a href="{{url('kyniemchuong/'.$tt->id).'/edit'}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
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
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'kyniemchuong/delete','id' => 'frm_delete'])!!}
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
@stop