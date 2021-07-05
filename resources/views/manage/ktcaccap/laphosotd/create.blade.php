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
@stop

@section('content')
    <h3 class="page-title">
        Danh sách <small>&nbsp;hồ sơ thêm mới</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::open(['url'=>'laphosotd','method'=>'post' , 'files'=>true, 'id' => 'create_cpcn', 'class'=>'horizontal-form', 'enctype'=>'multipart/form-data']) !!}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Kí hiệu danh hiệu thi đua<span class="require">*</span></label>
                                {!!Form::text('kihieudhtd',null, array('id' => 'kihieudhtd','class' => 'form-control required'))!!}
                                @if ($errors->has('kihieudhtd'))
                                    <em class="invalid">{{$errors->first('kihieudhtd') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Hình thức khen thưởng</label>
                                <select id="tenhinhthuckt" name="tenhinhthuckt" class="form-control js-example-basic-single">
                                    @foreach($nhomht as $nhom)
                                        <option value="{{$nhom->tenhinhthuckt}}">{{$nhom->tenhinhthuckt}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên đối tượng được khen<span class="require">*</span></label>
                                {!!Form::text('tendtkt',null, array('id' => 'tendtkt','class' => 'form-control required'))!!}
                                @if ($errors->has('tendtkt'))
                                    <em class="invalid">{{$errors->first('tendtkt')}}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phụ cấp lãnh đạo</label>
                                <div class="md-radio-inline">
                                    <div class="col-md-4">
                                        <div class="md-radio">
                                            <input type="radio" id="radio6" name="phucapld" class="md-radiobtn" {{(isset($model) ? ($model->phucapld == 'Có' ? 'checked' : '') : 'checked')}} value="Có">
                                            <label for="radio6">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Có</label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio7" name="phucapld" class="md-radiobtn" {{(isset($model) ? ($model->phucapld == 'Không' ? 'checked' : '') : '')}} value="Không">
                                            <label for="radio7">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Không</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Chức danh lãnh đạo<span class="require">*</span></label>
                                {!!Form::text('chucdanhld',null, array('id' => 'chucdanhld','class' => 'form-control '))!!}
                                @if ($errors->has('chucdanhld'))
                                    <em class="invalid">{{$errors->first('chucdanhld') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Chức vụ<span class="require">*</span></label>
                                {!!Form::text('chucvu',null, array('id' => 'chucvu','class' => 'form-control '))!!}
                                @if ($errors->has('chucvu'))
                                    <em class="invalid">{{$errors->first('chucvu') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị công tác hoặc Địa chỉ<span class="require">*</span></label>
                                {!!Form::text('dvdcct',null, array('id' => 'dvdcct','class' => 'form-control required'))!!}
                                @if ($errors->has('dvdcct'))
                                    <em class="invalid">{{$errors->first('dvdcct') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Số quyết định<span class="require">*</span></label>
                                {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
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
                                {!! Form::input('date', 'ngayky', null, array('id' => 'ngayky', 'class' => 'form-control', 'required'))!!}
                                @if ($errors->has('ngayky'))
                                    <em class="invalid">{{ $errors->first('ngayky') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Người ký<span class="require">*</span></label>
                                {!!Form::text('nguoiky',null, array('id' => 'nguoiky','class' => 'form-control required'))!!}
                                @if ($errors->has('nguoiky'))
                                    <em class="invalid">{{$errors->first('nguoiky') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại hình khen thưởng<span class="require">*</span></label>
                                <select id="tenloaihinhkt" name="tenloaihinhkt" class="form-control js-example-basic-single">
                                    @foreach($nhomlh as $nhom)
                                        <option value="{{$nhom->tenloaihinhkt}}">{{$nhom->tenloaihinhkt}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thành tích khen<span class="require">*</span></label>
                                {!!Form::text('thanhtichkhen',null, array('id' => 'thanhtichkhen','class' => 'form-control required'))!!}
                                @if ($errors->has('thanhtichkhen'))
                                    <em class="invalid">{{$errors->first('thanhtichkhen') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ngày tháng năm sinh<span class="require">*</span></label>
                                {!! Form::input('date', 'namsinh', null, array('id' => 'namsinh', 'class' => 'form-control', 'required'))!!}
                                @if ($errors->has('namsinh'))
                                    <em class="invalid">{{ $errors->first('namsinh') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Chính quán (Nguyên quán)<span class="require">*</span></label>
                                {!!Form::text('chinhquan',null, array('id' => 'chinhquan','class' => 'form-control required'))!!}
                                @if ($errors->has('chinhquan'))
                                    <em class="invalid">{{$errors->first('chinhquan') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Trú quán<span class="require">*</span></label>
                                {!!Form::text('truquan',null, array('id' => 'truquan','class' => 'form-control required'))!!}
                                @if ($errors->has('truquan'))
                                    <em class="invalid">{{$errors->first('truquan') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Tính chất tặng</label>
                                {!! Form::select(
                                'tctang',
                                array(
                                'Điều chỉnh' => 'Điều chỉnh',
                                'Thu hồi' => 'Thu hồi',
                                'Tặng' => 'Tặng',
                                'Truy tặng' => 'Truy tặng',
                                ),
                                null,
                                array('id' => 'tctang', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Quốc tịch<span class="require">*</span></label>
                                <select id="tenqt" name="tenqt" class="form-control js-example-basic-single">
                                    @foreach($nhomqt as $nhom)
                                        <option value="{{$nhom->tenqt}}">{{$nhom->tenqt}}</option>
                                    @endforeach
                                </select>
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
                    </div></br>
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
                    </div></br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ghi chú</label>
                                {!! Form::textarea('ghichu', null, ['id' => 'ghichu', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
                            </div>
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
    <script>
        $('input[name="kihieudhtd"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmahs',
                data: {
                    _token: CSRF_TOKEN,
                    kihieudhtd:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại kí hiệu", "Mã kí hiệu nhập vào đã tồn tại!!!");
                        $('input[name="kihieudhtd"]').val('');
                        $('input[name="kihieudhtd"]').focus();
                    }else
                        toastr.success("Mã kí hiệu sử dụng được!", "Thành công!");
                }

            });
        });
    </script>
@stop