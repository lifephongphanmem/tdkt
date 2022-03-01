@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--Date-->
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
    <!--End Date-->

@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>


    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>

    <!--Date>
    <script type="text/javascript" src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>

    <End Date-->
    <!--Date new-->
    <!--script src="{{url('minhtran/jquery.min.js')}}"></script-->
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            TableManaged.init();
            $(":input").inputmask();
        });
    </script>
    <!--End date new-->

    <script>
        function InputMask(){
            //$(function(){
            // Input Mask
            if($.isFunction($.fn.inputmask))
            {
                $("[data-mask]").each(function(i, el)
                {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if(placeholder.length)
                    {
                        opts[placeholder] = placeholder;
                    }

                    switch(mask.toLowerCase())
                    {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');;

                            mask = "999,999,999.99";

                            if($this.data('mask').toLowerCase() == 'rcurrency')
                            {
                                mask += ' ' + sign;
                            }
                            else
                            {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup		: true,
                                groupSize		: 3,
                                radixPoint		: attrDefault($this, 'rad', '.'),
                                groupSeparator	: attrDefault($this, 'dec', ',')
                            });
                    }

                    if(is_regex)
                    {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
    </script>
    <script>
        function createtdt(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/laphosotdct/boxungdt',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    madt: $('#madt').val(),
                    tendanhhieutd: $('#tendanhhieutd').val(),
                    kihieudhtd: $('#kihieudhtd').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Bổ xung thông tin thành công!");
                        $('#dsdt').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");

                    }
                }
            })
        }
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function deleteRow() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/laphosotdct/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#iddelete').val(),
                    kihieudhtd: $('#kihieudhtd').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin đối tượng thành công!", "Thành công!");
                    $('#dsdt').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });

                    $('#delete-modal').modal("hide");

                    //}
                }
            })

        }
        function editTtPh(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/laphosotdct/chinhsuadt',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#ttpedit').replaceWith(data.message);
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin phòng nghỉ!", "Lỗi!");
                }
            })
        }
        function updatets() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/laphosotdct/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#idedit').val(),
                    madt: $('#madtedit').val(),
                    tendanhhieutd: $('#tendanhhieutdedit').val(),
                    kihieudhtd: $('#kihieudhtd').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin đối tượng", "Thành công!");
                        $('#dsdt').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-edit').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Danh sách <small>&nbsp;hồ sơ thi đua chỉnh sửa</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'laphosotd/'. $model->id, 'class'=>'horizontal-form','id'=>'edit_cpcn', 'files'=>true,'enctype'=>'multipart/form-data']) !!}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        {!!Form::text('kihieudhtd',null, array('id' => 'kihieudhtd','class' => 'form-control hidden'))!!}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phân loại phong trào TĐ</label>
                                <select id="tenqt" name="tenqt" class="form-control js-example-basic-single">
                                    @foreach($m_phongtrao as $pt)
                                        <option value="{{$pt->maphongtrao}}">{{$pt->veviec}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Số quyết định<span class="require">*</span></label>
                                {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control '))!!}
                                @if ($errors->has('soqd'))
                                    <em class="invalid">{{$errors->first('soqd') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Năm<span class="require">*</span></label>
                                {!!Form::text('nam',null, array('id' => 'nam','class' => 'form-control required'))!!}
                                @if ($errors->has('nam'))
                                    <em class="invalid">{{$errors->first('nam')}}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ngày ký<span class="require">*</span></label>
                                {!! Form::input('date', 'ngayky', null, array('id' => 'ngayky', 'class' => 'form-control' ))!!}
                                @if ($errors->has('ngayky'))
                                    <em class="invalid">{{ $errors->first('ngayky') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nội dung<span class="require">*</span></label>
                                {!! Form::textarea('noidung', null, ['id' => 'noidung', 'rows' => 2, 'cols' => 10, 'class' => 'form-control required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(isset($model) && ($model->totrinh != null || $model->totrinh != ''))
                            <div class="col-md-3">
                                <label class="control-label">Tờ trình hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/totrinh/'.$model->totrinh)}}', 'newwindow', 'width=300,height=250')">{{$model->totrinh}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Tờ trình</label>
                            {!!Form::file('totrinh', null, array('id' => 'totrinh','class' => 'form-control'))!!}
                        </div>

                        @if(isset($model) && ($model->qdkt != null || $model->qdkt != ''))
                            <div class="col-md-3">
                                <label class="control-label">Quyết định khen thưởng hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/qdkt/'.$model->qdkt)}}', 'newwindow', 'width=300,height=250')">{{$model->qdkt}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Quyết định khen thưởng</label>
                            {!!Form::file('qdkt', null, array('id' => 'qdkt','class' => 'form-control'))!!}
                        </div>
                    </div></br>
                    <div class="row">
                        @if(isset($model) && ($model->bienban != null || $model->bienban != ''))
                            <div class="col-md-3">
                                <label class="control-label">Biên bản hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/bienban/'.$model->bienban)}}', 'newwindow', 'width=300,height=250')">{{$model->bienban}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Biên bản</label>
                            {!!Form::file('bienban', null, array('id' => 'bienban','class' => 'form-control'))!!}
                        </div>

                        @if(isset($model) && ($model->tailieukhac != null || $model->tailieukhac != ''))
                            <div class="col-md-3">
                                <label class="control-label">Tài liệu khác hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/tailieukhac/'.$model->tailieukhac)}}', 'newwindow', 'width=300,height=250')">{{$model->tailieukhac}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Tài liệu khác</label>
                            {!!Form::file('tailieukhac', null, array('id' => 'tailieukhac','class' => 'form-control'))!!}
                        </div>
                    </div></br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ghi chú</label>
                                {!! Form::textarea('ghichu', null, ['id' => 'ghichu', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <h4 class="form-section" style="color: #0000ff">Danh sách đối tượng thi đua</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" ><i class="fa fa-plus"></i>&nbsp;Thêm đối tượng</button>
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="row" id="dsdt">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th style="text-align: center" width="2%">STT</th>
                                    <th style="text-align: center">Tên đối tượng</th>
                                    <th style="text-align: center" width="10%">Phân loại</th>
                                    <th style="text-align: center" width="25%">Địa chỉ</th>
                                    <th style="text-align: center" width="10%">Danh hiệu thi đua</th>
                                    <th style="text-align: center" width="10%">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modelct as $key=>$tt)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{$key + 1}}</td>
                                        <td>{{$modeldt->where('madt',$tt->madt)->first()->tendt}}</td>
                                        <td >{{$m_pl->where('maplct',$modeldt->where('madt',$tt->madt)->first()->phanloaict)->first()->tenplct}}</td>
                                        <td style="text-align: center">{{$modeldt->where('madt',$tt->madt)->first()->diachi}}</td>
                                        <td style="text-align: center">{{$tt->tendanhhieutd}}</td>
                                        <td>
                                            <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Xóa</button>
                                            <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="madonvi" id="madonvi" value="{{session('admin')->madonvi}}">
            <input type="hidden" name="macqcq" id="macqcq" value="{{session('admin')->macqcq}}">
            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('laphosotd')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới thông tin đối tượng</h4>
                </div>
                <div class="modal-body" id="ttpthemmoi">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label">Đối tượng:<span class="require">*</span></label>
                                <select id="madt" name="madt" class="form-control js-example-basic-single">
                                    @foreach($modeldt as $dt)
                                        <option value="{{$dt->madt}}">{{$dt->tendt}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Danh hiệu thi đua</label>
                                <select id="tendanhhieutd" name="tendanhhieutd" class="form-control js-example-basic-single">
                                    @foreach($nhomdh as $nhom)
                                        <option value="{{$nhom->tendanhhieutd}}">{{$nhom->tendanhhieutd}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                        <button type="button" class="btn btn-primary" onclick="createtdt()">Cập nhật</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin đối tượng</h4>
                </div>
                <div class="modal-body" id="ttpedit">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa thông tin đối tượng?</h4>
                </div>
                <input type="hidden" id="iddelete" name="iddelete">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="deleteRow()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Validate Form-->
    <script type="text/javascript">
        function validateForm(){
            var validator = $("#create_cpcn").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop