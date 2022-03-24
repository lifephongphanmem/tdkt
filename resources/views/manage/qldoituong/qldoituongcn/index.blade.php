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
            $('#madonvi').change(function() {
                window.location.href = '/qldoituongcn?madonvi=' + $('#madonvi').val();
            });
        })
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Quản lý danh sách<small>&nbsp;đối tượng</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">

                    <div class="portlet-title">
                        <div class="caption"></div>
                        <div class="actions">
                            <a href="{{url('qldoituongcn/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới</a>
                        </div>
                    </div>

                <hr>
                <div class="portlet-body">
{{--                    <div class="row">--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label class="control-label">Phân loại đối tượng</label>--}}
{{--                                <select class="form-control" name="phanloaict" id="phanloaict">--}}
{{--                                    <option value="" >--Chọn phân loại đối tượng--</option>--}}
{{--                                    @foreach($m_pl as $tt)--}}
{{--                                        <option value="{{$tt->maplct}}" @if($inputs['phanloaict'] == $tt->maplct) selected @endif >{{$tt->tenplct}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label style="font-weight: bold">Đơn vị</label>
                                <select class="form-control select2me" name="madonvi" id="madonvi">
                                    @foreach($m_diaban as $diaban)
                                        <optgroup label="{{$diaban->tendiaban}}">
                                            <?php $donvi = $m_donvi->where('madiaban',$diaban->madiaban); ?>
                                            @foreach($donvi as $ct)
                                                <option {{$ct->madonvi == $inputs['madonvi'] ? "selected":""}} value="{{$ct->madonvi}}">{{$ct->tendonvi}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Tên đối tượng</th>
                            <th style="text-align: center" width="15%">Ngày sinh</th>
                            <th style="text-align: center" width="10%">Giới tính</th>
                            <th style="text-align: center" width="20%">Chức vụ</th>
                            <th style="text-align: center" width="10%">Mã công<br>chức, viên<br>chức</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$i++}}</td>
                            <td class="active">{{$tt->tendt}}</td>
                            <td>{{getDayVn($tt->ngaysinh)}}</td>
                            <td>{{$tt->gioitinh}}</td>
                            <td>{{$tt->chucvu}}</td>
                            <td style="text-align: left">{{$tt->maccvc}}</td>
                            <td>
                                <a title="Chỉnh sửa" href="{{url('qldoituongcn/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs">
                                    <i class="fa fa-edit"></i></a>

                                <button title="Xóa" type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal">
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
    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'qldoituongcn/delete','id' => 'frm_delete'])!!}
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