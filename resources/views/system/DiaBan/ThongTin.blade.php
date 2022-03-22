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
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')

    <h3 class="page-title text-capitalize">
        Danh sách địa bàn quản lý
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(chkPhanQuyen('hethong', 'hethong_pq', 'danhsachdiaban','danhmuc', 'modify'))
                            <button type="button" onclick="add()" class="btn btn-default btn-xs" data-target="#modify-modal" data-toggle="modal">
                                <i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        @endif
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_4">
                        <thead>
                            <tr class="text-center">
                                <th colspan="3" width="15%">STT</th>
                                <th rowspan="2" >Tên địa bàn</th>
                                <th rowspan="2" width="20%">Phân loại</th>
                                <th rowspan="2" width="10%">Thao tác</th>
                            </tr>
                            <tr>
                                <th width="4%">T</th>
                                <th width="4%">H</th>
                                <th width="4%">X</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $model_t= $model->where('capdo', 'T');
                            ?>
                            @foreach($model_t as $ct_t)
                                <tr class="success">
                                    <td style="text-align: center">{{$i++}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$ct_t->tendiaban}}</td>
                                    <td>{{$a_phanloai[$ct_t->capdo] ?? ''}}</td>
                                    <td>
                                        @if(chkPhanQuyen('hethong', 'hethong_pq', 'danhsachdiaban','danhmuc', 'modify'))
                                            <button type="button" onclick="edit('{{$ct_t->madiaban}}','{{$ct_t->tendiaban}}','{{$ct_t->level}}')" class="btn btn-default btn-xs mbs" data-target="#modify-modal" data-toggle="modal">
                                                <i class="fa fa-edit"></i></button>

                                            <button type="button" onclick="getId('{{$ct_t->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal">
                                                <i class="fa fa-trash-o"></i></button>
                                        @endif

                                    </td>
                                </tr>
                                <?php
                                    $j = 1;
                                    $model_h= $model->where('madiabanQL', $ct_t->madiaban);
                                ?>
                                @foreach($model_h as $ct_h)
                                    <tr class="info">
                                        <td></td>
                                        <td style="text-align: center">{{$j++}}</td>
                                        <td></td>
                                        <td>{{$ct_h->tendiaban}}</td>
                                        <td>{{$a_phanloai[$ct_h->capdo] ?? ''}}</td>
                                        <td>
                                            @if(chkPhanQuyen('hethong', 'hethong_pq', 'danhsachdiaban','danhmuc', 'modify'))
                                                <button type="button" onclick="edit('{{$ct_h->madiaban}}','{{$ct_h->tendiaban}}','{{$ct_h->capdo}}')" class="btn btn-default btn-xs mbs" data-target="#modify-modal" data-toggle="modal">
                                                    <i class="fa fa-edit"></i></button>

                                                <button type="button" onclick="getId('{{$ct_h->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal">
                                                    <i class="fa fa-trash-o"></i></button>
                                            @endif

                                        </td>
                                    </tr>
                                    <?php
                                    $k = 1;
                                    $model_x= $model->where('madiabanQL', $ct_h->madiaban);
                                    ?>
                                    @foreach($model_x as $ct_x)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: center">{{$k++}}</td>
                                            <td class="em"style="font-style: italic;">{{$ct_x->tendiaban}}</td>
                                            <td>{{$a_phanloai[$ct_x->capdo] ?? ''}}</td>
                                            <td>
                                                @if(chkPhanQuyen('hethong', 'hethong_pq', 'danhsachdiaban','danhmuc', 'modify'))
                                                    <button type="button" onclick="edit('{{$ct_x->madiaban}}','{{$ct_x->tendiaban}}','{{$ct_x->capdo}}')" class="btn btn-default btn-xs mbs" data-target="#modify-modal" data-toggle="modal">
                                                        <i class="fa fa-edit"></i></button>

                                                    <button type="button" onclick="getId('{{$ct_x->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal">
                                                        <i class="fa fa-trash-o"></i></button>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
        <!--Modal thông tin chi tiết -->
        {!! Form::open(['url'=>'DiaBan/Sua','id' => 'frm_modify'])!!}
        <div id="modify-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin địa bàn quản lý</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Mã số</label>
                                    {!!Form::text('madiaban', null, array('id' => 'madiaban','class' => 'form-control'))!!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Tên địa bàn<span class="require">*</span></label>
                                    {!!Form::text('tendiaban', null, array('id' => 'tendiaban','class' => 'form-control', 'required'=>'required'))!!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Phân loại</label>
                                    {!!Form::select('capdo', getPhanLoaiDonVi_DiaBan(), null, array('id' => 'capdo','class' => 'form-control'))!!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">Trực thuộc địa bàn</label>
                                    {!!Form::select('madiabanQL', $a_diaban, null, array('id' => 'madiabanQL','class' => 'form-control'))!!}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'diaban/delete','id' => 'frm_delete'])!!}
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

    <script>
        function add(){
            $('#madiaban').val('');
            $('#madiaban').attr('readonly',true);
        }

        function edit(madiaban, tendiaban, level){
            $('#madiaban').attr('readonly',false);
            $('#madiaban').val(madiaban);
            $('#tendiaban').val(tendiaban);
            $('#level').val(level).trigger('change');
        }
    </script>
</div>
@stop