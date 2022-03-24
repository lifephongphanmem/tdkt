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

    </script>

@stop

@section('content')
    <h3 class="page-title text-capitalize">
        Danh sách&nbsp;hồ sơ đăng ký thi đua cấp dưới
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-weight: bold">Năm</label>
                                <textarea class="form-control" readonly>{{$m_dangky->noidung}}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="sample_4">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">STT</th>
                                    <th>Tên đơn vị đăng ký</th>
                                    <th>Nội dung hồ sơ</th>
                                    <th style="text-align: center" width="10%">Ngày nộp<br>hồ sơ</th>
                                    <th style="text-align: center" width="10%">Thao tác</th>
                                </tr>
                            </thead>
                            @foreach($model as $key => $tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$a_donvi[$tt->madonvi] ?? ''}}</td>
                                    <td>{{$tt->noidung}}</td>
                                    <td>{{getDayVn($tt->ngaychuyen)}}</td>

                                    <td style="text-align: center">
                                        <a title="Xem chi tiết" href="{{url('/HoSoThiDua/Them?kihieudhtd='.$tt->kihieudhtd.'&madonvi='.$tt->madonvi.'&trangthai=false')}}" class="btn btn-default btn-xs mbs" target="_blank">
                                            <i class="fa fa-eye"></i></a>
                                        @if($m_dangky->trangthai == 'CC')
                                            <button title="Trả lại hồ sơ" type="button" onclick="getIdBack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#back-modal" data-toggle="modal">
                                                <i class="fa fa-backward"></i></button>
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


        <div class="modal fade" id="back-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'/XetDuyetHoSoThiDua/TraLai','method'=>'post' , 'files'=>true,'id' => 'frm_back','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
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
                url: '/duyethosocapduoi/lydo',
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