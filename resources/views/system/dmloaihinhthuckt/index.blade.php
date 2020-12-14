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
        });
        function getSelectedCheckboxes(){

            var ids = '';
            $.each($("input[name='ck_value']:checked"), function(){
                ids += ($(this).attr('value')) + '-';
            });
            return ids = ids.substring(0, ids.length - 1);

        }
        function multiLock() {

            var ids = getSelectedCheckboxes();
            var pl = $('#phanloai').val();
            if(ids == '') {
                $('#btnMultiLockUser').attr('data-target', '#notid-modal-confirm');
            }else {

                $('#btnMultiLockUser').attr('data-target', '#lockuser-modal-confirm');
                $('#frmLockUser').attr('action', "{{ url('users/lock')}}/" + ids + '/' + pl);
            }

        }
        function multiUnLock() {

            var ids = getSelectedCheckboxes();
            var pl = $('#phanloai').val();
            if(ids == '') {
                $('#btnMultiUnLockUser').attr('data-target', '#notid-modal-confirm');
            }else {
                $('#btnMultiUnLockUser').attr('data-target', '#unlockuser-modal-confirm');
                $('#frmUnLockUser').attr('action', "{{ url('users/unlock')}}/" + ids + '/' + pl);
            }

        }
        function confirmDelete(id) {
            $('#frmDelete').attr('action', "/delete/" + id);
        }
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        $(function(){
            $('#mahinhthuckt').change(function() {
                var current_path_url = '/dmdanhhieutd?';
                var mahinhthuckt = '&mahinhthuckt='+$('#mahinhthuckt').val();
                var phanloai = '&phanloai='+$('#phanloai').val();
                var url = current_path_url + mahinhthuckt + phanloai;
                window.location.href = url;
            });
            $('#phanloai').change(function() {
                var current_path_url = '/dmdanhhieutd?';
                var mahinhthuckt = '&mahinhthuckt='+$('#mahinhthuckt').val();
                var phanloai = '&phanloai='+$('#phanloai').val();
                var url = current_path_url + mahinhthuckt + phanloai;
                window.location.href = url;
            });
        })
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Quản lý danh mục<small>&nbsp;hình thức khen thưởng</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                @if(session('admin')->sadmin == 'ssa')
                    <div class="portlet-title">
                        <div class="caption"></div>
                        <div class="actions">
                            <a href="{{url('dmhinhthuckt/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                @endif
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Mã hình thức</label>
                            {!! Form::text('mahinhthuckt', $inputs['mahinhthuckt'], ['id' => 'mahinhthuckt', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phân loại</label>
                                <select class="form-control" name="phanloai" id="phanloai">
                                    <option value="Xã" {{($inputs['phanloai'] == 'Xã' ? 'selected' : '')}}>Hình thức khen thưởng cấp Xã</option>
                                    <option value="Huyện" {{($inputs['phanloai'] == 'Huyện' ? 'selected' : '')}}>Hình thức khen thưởng cấp Huyện</option>
                                    <option value="Tỉnh" {{($inputs['phanloai'] == 'Tỉnh' ? 'selected' : '')}}>Hình thức khen thưởng cấp Tỉnh</option>
                                    <option value="Trung ương" {{($inputs['phanloai'] == 'Trung ương' ? 'selected' : '')}}>Hình thức khen thưởng cấp Trung ương</option>
                                    <option value="" {{($inputs['phanloai'] == '' ? 'selected' : '')}}>--Phân loại hình thức--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Mã hình thức</th>
                            <th style="text-align: center" width="50%">Tên hình thức KT</th>
                            <th style="text-align: center" width="20%">Phân loại</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td>{{$tt->mahinhthuckt}}</td>
                            <td class="active">{{$tt->tenhinhthuckt}}</td>
                            <td style="text-align: center">
                                @if($tt->phanloai == 'Xã')
                                    <span class="label label-sm label-success">Hình thức khen thưởng cấp Xã</span>
                                @elseif($tt->phanloai == 'Huyện')
                                    <span class="label label-sm label-success">Hình thức khen thưởng cấp Huyện</span>
                                @elseif($tt->phanloai == 'Tỉnh')
                                    <span class="label label-sm label-success">Hình thức khen thưởng cấp Tỉnh</span>
                                @else
                                    <span class="label label-sm label-success">Hình thức khen thưởng cấp Trung ương</span>
                                @endif
                            </td>
                            <td>
                                @if(can('users','edit'))
                                <a href="{{url('dmhinhthuckt/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                @endif
                                @if(session('admin')->sadmin == 'ssa')
                                    <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                    Xóa</button>
                                @endif
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
    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'dmhinhthuckt/delete','id' => 'frm_delete'])!!}
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