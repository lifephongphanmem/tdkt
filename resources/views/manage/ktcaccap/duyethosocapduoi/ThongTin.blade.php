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
                var phongtrao = '&phongtrao='+$('#phongtrao').val();
                var url = '/duyethosocapduoi?'+nam+phongtrao;
                window.location.href = url;
            });
            $('#phongtrao').change(function() {
                var nam = '&nam='+$('#nam').val();
                var phongtrao = '&phongtrao='+$('#phongtrao').val();
                var url = '/duyethosocapduoi?'+nam+phongtrao;
                window.location.href = url;
            });
        });
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Danh sách<small>&nbsp;hồ sơ đăng ký thi đua cấp dưới</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
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
                        <div class="col-md-6">
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

                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="sample_4">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">STT</th>
                                    <th>Đơn vị phát động</th>
                                    <th>Nội dung hồ sơ</th>
                                    <th width="8%">Ngày<br>bắt đầu</th>
                                    <th width="8%">Ngày<br>kết thúc</th>
                                    <th width="8%">Trạng thái</th>
                                    <th style="text-align: center" width="8%">Tổng số<br>hồ sơ</th>
                                    <th style="text-align: center" width="10%">Thao tác</th>
                                </tr>
                            </thead>
                            @foreach($model as $key => $tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$tt->tendonvi}}</td>
                                    <td>{{$tt->noidung}}</td>
                                    <td>{{getDayVn($tt->tungay)}}</td>
                                    <td>{{getDayVn($tt->denngay)}}</td>
                                    <td style="text-align: center">{{$a_trangthaihoso[$tt->nhanhoso]}}</td>
                                    <td style="text-align: center">{{chkDbl($tt->sohoso)}}</td>

                                    <td style="text-align: center">
                                        <a title="Xem chi tiết" href="{{url('XetDuyetHoSoThiDua/DanhSach?kihieudhtd='.$tt->kihieudhtd)}}" class="btn btn-default btn-xs mbs">
                                            <i class="fa fa-eye"></i></a>
                                        <a title="Đánh giá kết quả" href="{{url('XetDuyetHoSoThiDua/KetQua?kihieudhtd='.$tt->kihieudhtd)}}" class="btn btn-default btn-xs mbs">
                                            <i class="fa fa-list"></i></a>
                                        <button title="Chuyển đối tượng sang danh mục quản lý" type="button" onclick="setKetQua('{{$tt->kihieudhtd}}')" class="btn btn-default btn-xs mbs" data-target="#modal-ChuyenDoiTuong" data-toggle="modal">
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

        <div class="modal fade" id="get-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'duyethosocapduoi/get','id' => 'frm_get'])!!}
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

        <div class="modal fade" id="modal-ChuyenDoiTuong" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'/XetDuyetHoSoThiDua/ChuyenDoiTuong','method'=>'post' , 'files'=>true,'id' => 'frm_back','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Đồng ý kết thúc phong trào và chuyển đối tượng?</h4>
                    </div>
                    <input type="hidden" name="kihieudhtd_chuyen" id="kihieudhtd_chuyen">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                Bạn đồng ý kết thúc phong trào và cập nhật các đối tượng đạt tiêu chuẩn khen thưởng sang danh sách đối tượng để quản lý.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn blue">Đồng ý</button>
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
        function setKetQua(kihieudhtd){
            $('#kihieudhtd_chuyen').val(kihieudhtd);
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