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
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
            $('#madanhhieutd').change(function() {
                window.location.href = '/DanhHieuThiDua/TieuChuan?madanhhieutd=' + $('#madanhhieutd').val();
            });
        });

        function confirmDelete(id) {
            $('#frmDelete').attr('action', "/delete/" + id);
        }
        function getId(id){
            document.getElementById("iddelete").value=id;
        }

        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title text-capitalize">
        danh sách&nbsp;tiêu chuẩn thi đua - {{$inputs['tendanhhieutd']}}
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                @if(chkPhanQuyen())
                    <div class="portlet-title">
                        <div class="caption"></div>
                        <div class="actions">
                            <button type="button" onclick="add()" class="btn btn-default btn-xs" data-target="#modify-modal" data-toggle="modal">
                                <i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        </div>
                    </div>
                @endif
                <hr>
                <div class="portlet-body form-horizontal">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label">Tên danh hiệu thi đua</label>
                                {!! Form::select('madanhhieutd', $a_danhhieu, $inputs['madanhhieutd'], ['id' => 'madanhhieutd', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="sample_4">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">STT</th>
                                    <th width="40%">Tên tiêu chuẩn</th>
                                    <th>Căn cứ</th>
                                    <th width="10%">Thao tác</th>
                                </tr>

                            </thead>
                            <tbody>
                            @foreach($model as $key=>$tt)
                                <tr class="odd gradeX">
                                    <td style="text-align: center">{{$key + 1}}</td>
                                    <td class="active">{{$tt->tentieuchuandhtd}}</td>
                                    <td>{{$tt->cancu}}</td>
                                    <td>
                                        <a href="{{url('/DonVi/Sua?madonvi='.$tt->madonvi)}}" class="btn btn-default btn-xs mbs">
                                            <i class="fa fa-edit"></i></a>

                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal">
                                            <i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
                </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- BEGIN DASHBOARD STATS -->
    <!-- END DASHBOARD STATS -->

    {!! Form::open(['url'=>'DanhHieuThiDua/TieuChuan','id' => 'frm_modify'])!!}
    <input type="hidden" name="madanhhieutd" value="{{$inputs['madanhhieutd']}}" />
    <div id="modify-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thông tin tiêu chuẩn thi đua</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Mã số</label>
                                {!!Form::text('matieuchuandhtd', null, array('id' => 'matieuchuandhtd','class' => 'form-control'))!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Tên tiêu chuẩn danh hiệu thi đua<span class="require">*</span></label>
                                {!!Form::text('tentieuchuandhtd', null, array('id' => 'tentieuchuandhtd','class' => 'form-control', 'required'=>'required'))!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Căn cứ quy định</label>
                                {!!Form::textarea('cancu', null, array('id' => 'cancu','class' => 'form-control', 'rows'=>2))!!}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}



    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'dmdonvi/delete','id' => 'frm_delete'])!!}
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
    @include('includes.e.modal-confirm')
@stop