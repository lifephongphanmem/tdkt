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
        Danh sách <small>&nbsp;khen thưởng kháng chiến chống Mỹ(cá nhân) chỉnh sửa</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'chongmycanhan/'. $model->id, 'class'=>'horizontal-form','id'=>'edit_cpcn', 'files'=>true,'enctype'=>'multipart/form-data']) !!}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thời gian tham gia kháng chiến<span class="require">*</span></label>
                                {!! Form::input('date', 'tgiantgkc', null, array('id' => 'tgiantgkc', 'class' => 'form-control','required'))!!}
                                @if ($errors->has('tgiantgkc'))
                                    <em class="invalid">{{ $errors->first('tgiantgkc') }}</em>
                                @endif
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thời gian kháng chiến quy đổi<span class="require">*</span></label>
                                {!!Form::text('tgiankcqd',null, array('id' => 'tgiankcqd','class' => 'form-control required'))!!}
                                @if ($errors->has('tgiankcqd'))
                                    <em class="invalid">{{ $errors->first('tgiankcqd') }}</em>
                                @endif
                            </div>
                        </div>
                        <!--/span-->

                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số quyết định<span class="require">*</span></label>
                                {!!Form::text('soqd', null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                @if ($errors->has('soqd'))
                                    <em class="invalid">{{ $errors->first('soqd') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số được duyệt<span class="require">*</span></label>
                                {!!Form::text('sodd',null, array('id' => 'sodd','class' => 'form-control required'))!!}
                                @if ($errors->has('sodd'))
                                    <em class="invalid">{{ $errors->first('sodd') }}</em>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại khen thưởng<span class="require">*</span></label>
                                {!! Form::select('loaikt',getloaihinhkt(),null, array('id'=>'loaikt','class'=>'form-control'))!!}
                                @if ($errors->has('loaikt'))
                                    <em class="invalid">{{ $errors->first('loaikt') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Danh hiệu khen thưởng<span class="require">*</span></label>
                                {!! Form::select('dhkt',getdanhhieu(),null, array('id'=>'dhkt','class'=>'form-control'))!!}
                                @if ($errors->has('dhkt'))
                                    <em class="invalid">{{ $errors->first('dhkt') }}</em>
                                @endif
                                {{--<select id="madanhhieutd" name="madanhhieutd" class="form-control js-example-basic-single">
                                    @foreach($nhomdh as $nhom)
                                        <option value="{{$nhom->madanhhieutd}}">{{$nhom->tendanhhieutd}}</option>
                                    @endforeach
                                </select>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nơi trình khen<span class="require">*</span></label>
                                {!!Form::text('noitrkhen',null, array('id' => 'noitrkhen','class' => 'form-control required'))!!}
                                @if ($errors->has('noitrkhen'))
                                    <em class="invalid">{{ $errors->first('noitrkhen') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Chính quán<span class="require">*</span></label>
                                {!!Form::text('chinhquan',null, array('id' => 'chinhquan','class' => 'form-control required'))!!}
                                @if ($errors->has('chinhquan'))
                                    <em class="invalid">{{ $errors->first('chinhquan') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Chức vụ, chỗ ở hiện nay<span class="require">*</span></label>
                                {!!Form::text('cvchohn',null, array('id' => 'cvchohn','class' => 'form-control required'))!!}
                                @if ($errors->has('cvchohn'))
                                    <em class="invalid">{{ $errors->first('cvchohn') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại hồ sơ kháng chiến(theo phần mềm cũ)<span class="require">*</span></label>
                                {!!Form::text('loaihskc',null, array('id' => 'loaihskc','class' => 'form-control required'))!!}
                                @if ($errors->has('loaihskc'))
                                    <em class="invalid">{{ $errors->first('loaihskc') }}</em>
                                @endif
                            </div>
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
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('chongmycanhan')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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
            var validator = $("#edit_cpcn").validate({
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