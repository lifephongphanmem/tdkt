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
        function getSelectedCheckboxes() {

            var ids = '';
            $.each($("input[name='ck_value']:checked"), function () {
                ids += ($(this).attr('value')) + '-';
            });
            return ids = ids.substring(0, ids.length - 1);


        }
        function creadoituong() {

            var ids = getSelectedCheckboxes();
            if (ids == '') {
                $('#btnadd').attr('data-target', '#notid-modal-confirm');
            } else {
                $('#btnadd').attr('data-target', '#lockuser-modal-confirm');
                $('#frmadd').attr('action', "{{ url('qlquyetdinhkt/add')}}/" + ids);
            }

        }
        function createdt() {
            var ids = getSelectedCheckboxes();
            if (ids != '') {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/qlquyetdinhktdf/storett',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        ids: ids,
                        maquyetdinh:  $('#maquyetdinh').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            toastr.success("Cập nhật thông tin đối tượng", "Thành công!");
                            $('#dsdt').replaceWith(data.message);
                            jQuery(document).ready(function () {
                                TableManaged.init();
                            });
                            $('#modal-create').modal("hide");

                        } else
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                    }
                })
            }
        }
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function deleteRow() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/qlquyetdinhktdf/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#iddelete').val(),
                    maquyetdinh: $('#maquyetdinh').val()
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
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Quản lý quyết định<small>&nbsp;thi đua khen thưởng thêm mới</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::open(['url'=>'qlquyetdinhkt','method'=>'post' , 'files'=>true, 'id' => 'create_cpcn', 'class'=>'horizontal-form', 'enctype'=>'multipart/form-data']) !!}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin quyết định khen thưởng</h4>
                        <div class="row">
                            <input hidden id="maquyetdinh" name="maquyetdinh" value="{{$inputs['maquyetdinh']}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định<span class="require">*</span></label>
                                    {!! Form::text('soquyetdinh', null, ['id' => 'soquyetdinh', 'class' => 'form-control required']) !!}
                                    @if ($errors->has('soquyetdinh'))
                                        <em class="invalid">{{$errors->first('soquyetdinh')}}</em>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày QĐ<span class="require">*</span></label>
                                    {!! Form::input('date', 'ngaythang', null, array('id' => 'ngaythang', 'class' => 'form-control','required'))!!}
                                    @if ($errors->has('ngaythang'))
                                        <em class="invalid">{{ $errors->first('ngaythang') }}</em>
                                    @endif
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Về việc<span class="require">*</span></label>
                                {!! Form::textarea('veviec', null, ['id' => 'veviec', 'rows' => 2, 'cols' => 10, 'class' => 'form-control required']) !!}
                                @if ($errors->has('veviec'))
                                    <em class="invalid">{{$errors->first('veviec')}}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị khen<span class="require">*</span></label>
                                {!! Form::text('noikhenthuong', null, ['id' => 'noikhenthuong', 'class' => 'form-control required']) !!}
                                @if ($errors->has('noikhenthuong'))
                                    <em class="invalid">{{$errors->first('noikhenthuong')}}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Hình thức khen thưởng<span class="require">*</span></label>
                                {!! Form::select('mahinhthuckt',gethinhthuckt(),null, array('id'=>'mahinhthuckt','class'=>'form-control required'))!!}
                                @if ($errors->has('ngaythang'))
                                    <em class="invalid">{{ $errors->first('ngaythang') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Điều 1</label>
                                {!! Form::textarea('dieu1', null, ['id' => 'dieu1', 'rows' => 3, 'cols' => 10, 'class' => 'form-control ']) !!}
                                @if ($errors->has('dieu1'))
                                    <em class="invalid">{{$errors->first('dieu1')}}</em>
                                @endif
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Điều 2</label>
                                {!! Form::textarea('dieu2', null, ['id' => 'dieu2', 'rows' => 3, 'cols' => 10, 'class' => 'form-control ']) !!}
                                @if ($errors->has('dieu2'))
                                    <em class="invalid">{{$errors->first('dieu2')}}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Điều 3</label>
                                {!! Form::textarea('dieu3', null, ['id' => 'dieu3', 'rows' => 3, 'cols' => 10, 'class' => 'form-control ']) !!}
                                @if ($errors->has('dieu3'))
                                    <em class="invalid">{{$errors->first('dieu3')}}</em>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nơi nhận</label>
                                {!! Form::textarea('dieu3', null, ['id' => 'dieu3', 'rows' => 3, 'cols' => 10, 'class' => 'form-control ']) !!}
                                @if ($errors->has('dieu3'))
                                    <em class="invalid">{{$errors->first('dieu3')}}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phân loại quyết định<span class="require">*</span></label>
                                {!! Form::select('phanloai',getphanloaiqd(),null, array('id'=>'phanloai','class'=>'form-control required'))!!}
                                @if ($errors->has('phanloai'))
                                    <em class="invalid">{{ $errors->first('phanloai') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phân loại phong trào<span class="require">*</span></label>
                                {!! Form::select('phongtrao',getphongtrao(),null, array('id'=>'phongtrao','class'=>'form-control required'))!!}
                                @if ($errors->has('phongtrao'))
                                    <em class="invalid">{{ $errors->first('phongtrao') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <h4 class="form-section" style="color: #0000ff">Danh sách đối tượng khen thưởng</h4>
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
                                    <th style="text-align: center" width="10%">Mã định danh</th>
                                    <th style="text-align: center" width="10%">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modelct as $key=>$tt)
                                    <tr class="odd gradeX">
                                        <td style="text-align: center">{{$key + 1}}</td>
                                        <td>{{$tt->tendt}}</td>
                                        <td >{{$m_pl->where('maplct',$tt->phanloaict)->first()->tenplct ?? '' ?? ''}}</td>
                                        <td style="text-align: center">{{$tt->diachi}}</td>
                                        <td style="text-align: center">{{$tt->madinhdanh}}</td>
                                        <td>
                                                <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                    Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">

                    </div>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('qlquyetdinhkt')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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
        <form id="frmadd" method="GET" action="#" accept-charset="UTF-8">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Thêm mới thông tin mặt hàng</h4>
                    </div>
                    <div class="modal-body" id="ttmhbog">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th class="table-checkbox" width="2%">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                                </th>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center">Tên đối tượng</th>
                                <th style="text-align: center" width="10%">Phân loại</th>
                                <th style="text-align: center" width="25%">Địa chỉ</th>
                                <th style="text-align: center" width="10%">Mã định danh</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modeldt as $key=>$tt)
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="{{$tt->id}}" name="ck_value" id="ck_value"/>
                                    </td>
                                    <td style="text-align: center">{{$key + 1}}</td>
                                    <td>{{$tt->tendt}}</td>
                                    <td >{{$m_pl->where('maplct',$tt->phanloaict)->first()->tenplct ?? '' ?? ''}}</td>
                                    <td style="text-align: center">{{$tt->diachi}}</td>
                                    <td style="text-align: center">{{$tt->madinhdanh}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                        <button type="button" id="btnadd" class="btn btn-primary" onclick="createdt()">Thêm mới</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
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