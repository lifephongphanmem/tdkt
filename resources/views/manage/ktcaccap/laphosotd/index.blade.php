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

        function getId(kihieudhtd,madonvi){
            var form = $('#frm_XoaHS');
            form.find("[name='kihieudhtd']").val(kihieudhtd);
            form.find("[name='madonvi']").val(madonvi);
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }
        function getIdTr(kihieudhtd,madonvi){
            var form = $('#frm_ChuyenHS');
            form.find("[name='kihieudhtd']").val(kihieudhtd);
            form.find("[name='madonvi']").val(madonvi);
        }

        function ClickTrans(){
            $('#frm_trans').submit();
        }
        $(function(){
            $('#madonvi').change(function() {
                var url = '/HoSoThiDua/ThongTin?madonvi='+$('#madonvi').val();
                window.location.href = url;
            });
        });
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Danh sách<small>&nbsp;hồ sơ thi đua</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
{{--                        <a href="{{url('laphosotd/create')}}" class="btn btn-default btn-sm">--}}
{{--                            <i class="fa fa-plus"></i> Thêm mới </a>--}}
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
                                    <th rowspan="2" width="2%">STT</th>
                                    <th rowspan="2">Đơn vị phát động</th>
                                    <th rowspan="2">Nội dung hồ sơ</th>
                                    <th colspan="4">Phong trào</th>
                                    <th colspan="2">Hồ sơ của đơn vị</th>
                                    <th rowspan="2" style="text-align: center" width="10%">Thao tác</th>
                                </tr>
                                <tr>

                                    <th width="8%">Ngày<br>bắt đầu</th>
                                    <th width="8%">Ngày<br>kết thúc</th>
                                    <th width="8%">Trạng thái</th>
                                    <th style="text-align: center" width="8%">Tổng số<br>hồ sơ</th>

                                    <th width="8%">Trạng thái</th>
                                    <th style="text-align: center" width="8%">Số lượng</th>
                                </tr>
                            </thead>
                            @foreach($model as $key => $tt)
                                <tr class="{{$tt->nhanhoso == 'DANGNHAN' ? 'success' : ''}}">
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$tt->tendonvi}}</td>
                                    <td>{{$tt->noidung}}</td>
                                    <td>{{getDayVn($tt->tungay)}}</td>
                                    <td>{{getDayVn($tt->denngay)}}</td>
                                    <td style="text-align: center">{{$a_trangthaihoso[$tt->nhanhoso]}}</td>
                                    <td style="text-align: center">{{chkDbl($tt->sohoso)}}</td>
                                    @include('includes.crumbs.td_trangthai_hoso')
                                    <td style="text-align: center">{{chkDbl($tt->hosodonvi)}}</td>

                                    <td style="text-align: center">
                                        <a title="Thông tin phong trào" href="{{url('/dangkytd/'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank">
                                            <i class="fa fa-eye"></i></a>
                                        @if($tt->nhanhoso == 'DANGNHAN')
                                            @if(in_array($tt->trangthai, ['CC','BTL']))
                                                <a title="Hồ sơ đăng ký phong trào" href="{{url('/HoSoThiDua/Them?kihieudhtd='.$tt->kihieudhtd.'&madonvi='.$inputs['madonvi'].'&trangthai=true')}}" class="btn btn-default btn-xs mbs">
                                                    <i class="fa fa-check-square-o"></i></a>
                                            @else
                                                <a title="Hồ sơ đăng ký phong trào" href="{{url('/HoSoThiDua/Them?kihieudhtd='.$tt->kihieudhtd.'&madonvi='.$inputs['madonvi'].'&trangthai=false')}}" class="btn btn-default btn-xs mbs">
                                                    <i class="fa fa-check-square-o"></i></a>
                                            @endif
                                            @if($tt->hosodonvi > 0 && in_array($tt->trangthai, ['CC','BTL']))
                                                <button title="Trình hồ sơ đăng ký" type="button" onclick="getIdTr('{{$tt->kihieudhtd}}','{{$inputs['madonvi']}}')" class="btn btn-default btn-xs mbs" data-target="#trans-modal" data-toggle="modal">
                                                    <i class="fa fa-send"></i></button>
                                            @endif
                                        @endif

                                        @if($tt->trangthai == 'BTL')
                                            <button title="Lý do hồ sơ bị trả lại" type="button" onclick="viewLiDo('{{$tt->kihieudhtd}}','{{$inputs['madonvi']}}')" class="btn btn-default btn-xs mbs" data-target="#lydo-show" data-toggle="modal">
                                                <i class="fa fa-archive"></i></button>
                                        @endif

                                        @if($tt->trangthai == 'CC' && $tt->hosodonvi > 0)
                                            <button type="button" onclick="getId('{{$tt->kihieudhtd}}','{{$inputs['madonvi']}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal">
                                                <i class="fa fa-trash-o"></i></button>
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

        <div class="modal fade" id="trans-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'/HoSoThiDua/ChuyenHoSo','id' => 'frm_ChuyenHS'])!!}
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
                    <input type="hidden" name="kihieudhtd" />
                    <input type="hidden" name="madonvi" />
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
                    {!! Form::open(['url'=>'/HoSoThiDua/delete','id' => 'frm_XoaHS'])!!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Đồng ý xóa?</h4>
                    </div>
                    <input type="hidden" name="kihieudhtd" />
                    <input type="hidden" name="madonvi" />
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
    <script>
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

        function viewLiDo(kihieudhtd,madonvi) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);

            $.ajax({
                url: '/HoSoThiDua/LayLyDo',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    madonvi: madonvi,
                    kihieudhtd: kihieudhtd
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