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

                    <h4 class="form-section" style="color: #0000ff">Danh sách khen thưởng theo cá nhân</h4>
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">STT</th>
                                    <th>Tên đơn vị đăng ký</th>
                                    <th>Tên đối tượng</th>
                                    <th>Tên danh hiệu</th>
                                    <th width="10%">Số chỉ<br>tiêu</th>
                                    <th width="10%">Đạt tiêu<br>chuẩn</th>
                                    <th style="text-align: center" width="10%">Thao tác</th>
                                </tr>
                            </thead>
                            @foreach($model_canhan as $key => $tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$a_donvi[$tt->madonvi] ?? ''}}</td>
                                    <td>{{$tt->tendt}}</td>
                                    <td>{{$a_danhhieu[$tt->madanhhieutd] ?? ''}}</td>
                                    <td style="text-align: center">{{$tt->tongdieukien.'/'.$tt->tongtieuchuan}}</td>
                                    <td style="text-align: center">{{$tt->ketqua}}</td>
                                    <td style="text-align: center">
                                        <button title="Danh sách tiêu chuẩn" type="button" onclick="getIdBack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-tieuchuan" data-toggle="modal">
                                            <i class="fa fa-eye"></i></button>
                                        <button title="Thay đổi" type="button" onclick="setKetQua('{{$tt->id}}','{{$tt->tendt}}')" class="btn btn-default btn-xs mbs" data-target="#modal-ketqua" data-toggle="modal">
                                            <i class="fa fa-check"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <h4 class="form-section" style="color: #0000ff">Danh sách khen thưởng theo tập thể</h4>
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="sample_4">
                            <thead>
                            <tr class="text-center">
                                <th width="5%">STT</th>
                                <th>Tên đơn vị đăng ký</th>
                                <th>Tên danh hiệu</th>
                                <th width="10%">Số chỉ<br>tiêu</th>
                                <th width="10%">Đạt tiêu<br>chuẩn</th>
                                <th style="text-align: center" width="10%">Thao tác</th>
                            </tr>
                            </thead>
                            @foreach($model_tapthe as $key => $tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$a_donvi[$tt->madonvi_kt] ?? ''}}</td>
                                    <td>{{$a_danhhieu[$tt->madanhhieutd] ?? ''}}</td>
                                    <td style="text-align: center">{{$tt->tongdieukien.'/'.$tt->tongtieuchuan}}</td>
                                    <td style="text-align: center">{{$tt->ketqua}}</td>
                                    <td style="text-align: center">
                                        <button title="Danh sách tiêu chuẩn" type="button" onclick="getIdBack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-tieuchuan" data-toggle="modal">
                                            <i class="fa fa-eye"></i></button>
                                        <button title="Thay đổi" type="button" onclick="setKetQua('{{$tt->id}}','{{$a_donvi[$tt->madonvi_kt] ?? ''}}')" class="btn btn-default btn-xs mbs" data-target="#modal-ketqua" data-toggle="modal">
                                            <i class="fa fa-check"></i></button>
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

        {{--    Thông tin tiêu chuẩn--}}
        <div class="modal fade bs-modal-lg" id="modal-tieuchuan" tabindex="-1" role="dialog" aria-hidden="true">
            <input type="hidden" id="madt_tc" name="madt_tc" />
            <input type="hidden" id="madt_tc" name="madt_tc" />
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Thông tin tiêu chuẩn của đối tượng</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">Tên đối tượng</label>
                                {!!Form::text('tendt_tc', null, array('id' => 'tendt_tc','class' => 'form-control'))!!}
                            </div>

                            <div class="col-md-6">
                                <label class="form-control-label">Danh hiệu đăng ký</label>
                                {!!Form::select('madanhhieutd_tc', $a_danhhieu ,null, array('id' => 'madanhhieutd_tc','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="dstieuchuan">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{--    Thay đổi tiêu chuẩn--}}
        {!! Form::open(['url'=>'XetDuyetHoSoThiDua/KetQua','id' => 'frm_get', 'method'=>'post'])!!}
        <div id="modal-ketqua" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <input type="hidden" id="id_kq" name="id_kq" />
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin đối tượng</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Tên đối tượng</label>
                                    {!!Form::textarea('tendt_kq', null, array('id' => 'tendt_kq','class' => 'form-control','rows'=>'2'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="dieukien_ltc" name="dieukien_ltc" class="md-check">
                                        <label for="dieukien_ltc">
                                            <span></span><span class="check"></span><span class="box"></span>Đạt điều kiện khen thưởng</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" value="submit" class="btn btn-primary">Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function setKetQua(id, tendt){
            $('#id_kq').val(id);
            $('#tendt_kq').val(tendt);
        }

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