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
        function ThemDoiTuong(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/HoSoThiDua/ThemDoiTuong',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    madt: $('#madt').val(),
                    tendt: $('#tendt').val(),
                    ngaysinh: $('#ngaysinh').val(),
                    gioitinh: $('#gioitinh').val(),
                    chucvu: $('#chucvu').val(),
                    maccvc: $('#maccvc').val(),
                    lanhdao: $('#lanhdao').val(),
                    madonvi: $('#madonvi').val(),
                    madanhhieutd: $('#madanhhieutd').val(),
                    kihieudhtd: $('#kihieudhtd').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Bổ xung thông tin thành công!");
                        $('#dskhenthuong').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");

                    }
                }
            })
        }

        function getTieuChuan(madt, madanhhieutd, tendt){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#tendt_tc').val(tendt);
            $('#madanhhieutd_tc').val(madanhhieutd).trigger('change');

            $.ajax({
                url: '/HoSoThiDua/LayTieuChuan',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    madt: madt,
                    madanhhieutd: madanhhieutd,
                    madonvi: $('#madonvi').val(),
                    kihieudhtd: $('#kihieudhtd').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Bổ xung thông tin thành công!");
                        $('#dstieuchuan').replaceWith(data.message);
                        // jQuery(document).ready(function() {
                        //     TableManaged.init();
                        // });

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
                url: '/laphosotddf/delete',
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

                    $('#modal-delete').modal("hide");

                    //}
                }
            })

        }
        function editTtPh(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/laphosotddf/suadoituong',
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
                        toastr.error("Không thể chỉnh sửa thông tin đối tượng!", "Lỗi!");
                }
            })
        }
        function updatets() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/laphosotddf/update',
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
    <h3 class="page-title text-capitalize">
        Hồ sơ đăng ký phong trào thi đua
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'post', 'url'=>'HoSoThiDua/Them', 'class'=>'horizontal-form','id'=>'frmThemHoSo', 'files'=>true,'enctype'=>'multipart/form-data']) !!}
        <input type="hidden" name="madonvi" id="madonvi" value="{{$model->madonvi}}" />
        <input type="hidden" name="kihieudhtd" id="kihieudhtd" value="{{$model->kihieudhtd}}" />
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên phong trào thi đua</label>
                                <textarea class="form-control" readonly>{{$model->noidungpt}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Ngày tạo hồ sơ<span class="require">*</span></label>
                                {!! Form::input('date', 'ngayky', null, array('id' => 'ngayky', 'class' => 'form-control' ))!!}
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
                                <label class="control-label">File hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/totrinh/'.$model->totrinh)}}', 'newwindow', 'width=300,height=250')">{{$model->totrinh}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Tờ trình</label>
                            {!!Form::file('totrinh', null, array('id' => 'totrinh','class' => 'form-control'))!!}
                        </div>

                        @if(isset($model) && ($model->qdkt != null || $model->qdkt != ''))
                            <div class="col-md-3">
                                <label class="control-label">File hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/qdkt/'.$model->qdkt)}}', 'newwindow', 'width=300,height=250')">{{$model->qdkt}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Quyết định khen thưởng</label>
                            {!!Form::file('qdkt', null, array('id' => 'qdkt','class' => 'form-control'))!!}
                        </div>
                    </div>

                    <div class="row">
                        @if(isset($model) && ($model->bienban != null || $model->bienban != ''))
                            <div class="col-md-3">
                                <label class="control-label">File hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/bienban/'.$model->bienban)}}', 'newwindow', 'width=300,height=250')">{{$model->bienban}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Biên bản</label>
                            {!!Form::file('bienban', null, array('id' => 'bienban','class' => 'form-control'))!!}
                        </div>

                        @if(isset($model) && ($model->tailieukhac != null || $model->tailieukhac != ''))
                            <div class="col-md-3">
                                <label class="control-label">File hiện tại</label>
                                <a class="form-control" onclick="window.open('{{url('data/tailieukhac/'.$model->tailieukhac)}}', 'newwindow', 'width=300,height=250')">{{$model->tailieukhac}}</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <label class="control-label">Tài liệu khác</label>
                            {!!Form::file('tailieukhac', null, array('id' => 'tailieukhac','class' => 'form-control'))!!}
                        </div>
                    </div>

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
                                <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" >
                                    <i class="fa fa-plus"></i>&nbsp;Thêm đối tượng</button>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="dskhenthuong">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr class="text-center">
                                        <th width="2%">STT</th>
                                        <th>Tên đối tượng</th>
                                        <th width="10%">Ngày sinh</th>
                                        <th width="10%">Giới tính</th>
                                        <th width="15%">Chức vụ</th>
                                        <th width="20%">Tên danh hiệu<br>đăng ký</th>
                                        <th width="10%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($model_khenthuong as $key=>$tt)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{$key + 1}}</td>
                                        <td>{{$tt->tendt}}</td>
                                        <td >{{getDayVn($tt->ngaysinh)}}</td>
                                        <td >{{$tt->gioitinh}}</td>
                                        <td style="text-align: center">{{$tt->chucvu}}</td>
                                        <td style="text-align: center">{{$a_danhhieu[$tt->madanhhieutd] ?? ''}}</td>
                                        <td>
                                            <button title="Tiêu chuẩn" type="button" onclick="getTieuChuan('{{$tt->madt}}','{{$tt->madanhhieutd}}','{{$tt->tendt}}')" class="btn btn-default btn-xs mbs" data-target="#modal-tieuchuan" data-toggle="modal">
                                                <i class="fa fa-list"></i></button>
                                            <button title="Xóa" type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal">
                                                <i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
        <div style="text-align: center">
            <a href="{{url('/HoSoThiDua/ThongTin')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
        </div>
        {!! Form::close() !!}
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
                    <input type="hidden" name="madt" id="madt" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-11" style="padding-left: 0px;">
                                    <label class="form-control-label">Tên đối tượng</label>
                                    {!!Form::text('tendt', null, array('id' => 'tendt','class' => 'form-control'))!!}
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;">
                                    <label class="control-label">Chọn</label>
                                    <button type="button" class="btn btn-default" data-target="#modal-doituong" data-toggle="modal">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Ngày sinh</label>
                                {!! Form::input('date', 'ngaysinh', null, array('id' => 'ngaysinh', 'class' => 'form-control' ))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Giới tính</label>
                                {!!Form::select('gioitinh',getGioiTinh(), null, array('id' => 'gioitinh','class' => 'form-control'))!!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Chức vụ</label>
                                {!!Form::text('chucvu', null, array('id' => 'chucvu','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Lãnh đạo đơn vị</label>
                                {!!Form::select('lanhdao',['0'=>'Không','1'=>'Có'], null, array('id' => 'lanhdao','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Mã CCVC</label>
                                {!!Form::text('maccvc', null, array('id' => 'maccvc','class' => 'form-control'))!!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đăng ký danh hiệu thi đua</label>
                                <select id="madanhhieutd" name="madanhhieutd" class="form-control js-example-basic-single">
                                    @foreach($m_danhhieu as $nhom)
                                        <option value="{{$nhom->madanhhieutd}}">{{$nhom->tendanhhieutd}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                        <button type="button" class="btn btn-primary" onclick="ThemDoiTuong()">Cập nhật</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
{{--    Thông tin tiêu chuẩn--}}
    <div class="modal fade bs-modal-lg" id="modal-tieuchuan" tabindex="-1" role="dialog" aria-hidden="true">
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

    {{--    Thong tin đối tượng    --}}
    <div id="modal-doituong" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thông tin đối tượng</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Đơn vị tính<span class="require">*</span></label>
                            {!!Form::text('dvt_add', null, array('id' => 'dvt_add','class' => 'form-control','required'=>'required'))!!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function adddvt(){
            $('#modal-doituong').modal('hide');
        }
    </script>



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