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
        Danh sách địa bàn
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
                                <th colspan="3">STT</th>
                                <th rowspan="2" >Tên địa bàn</th>
                                <th rowspan="2" width="30%">Đơn vị quản lý địa bàn</th>
                                <th rowspan="2" width="10%">Thao tác</th>
                            </tr>
                            <tr>
                                <th width="3%">T</th>
                                <th width="3%">H</th>
                                <th width="3%">X</th>
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
                                    <td></td>
                                    <td>
                                        @if(chkPhanQuyen('hethong', 'hethong_pq', 'danhsachdiaban','danhmuc', 'modify'))
                                            <a href="" class="btn btn-default btn-xs mbs">
                                                <i class="fa fa-edit"></i></a>

                                            <a href="{{'/DonVi/DanhSach?madiaban='.$ct_t->madiaban}}" class="btn btn-default btn-xs mbs" >
                                                <i class="fa fa-list-ol"></i></a>
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
                                        <td></td>
                                        <td>
                                            @if(chkPhanQuyen('hethong', 'hethong_pq', 'danhsachdiaban','danhmuc', 'modify'))
                                                <a href="" class="btn btn-default btn-xs mbs">
                                                    <i class="fa fa-edit"></i></a>

                                                <a href="{{'/DonVi/DanhSach?madiaban='.$ct_h->madiaban}}" class="btn btn-default btn-xs mbs" >
                                                    <i class="fa fa-list-ol"></i></a>
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
                                            <td></td>
                                            <td>
                                                @if(chkPhanQuyen('hethong', 'hethong_pq', 'danhsachdiaban','danhmuc', 'modify'))
                                                    <a href="" class="btn btn-default btn-xs mbs">
                                                        <i class="fa fa-edit"></i></a>

                                                    <a href="{{'/DonVi/DanhSach?madiaban='.$ct_x->madiaban}}" class="btn btn-default btn-xs mbs" >
                                                        <i class="fa fa-list-ol"></i></a>
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

</div>
@stop