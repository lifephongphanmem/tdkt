@if(canGeneral('qlquytdkt','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Quản lý quỹ thi đua khen thưởng
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->qlquytdkt->index) && $permission->qlquytdkt->index == 1) ? 'checked' : '' }} value="1" name="roles[qlquytdkt][index]"/></td>
                                    <td>Quản lý quỹ thi đua khen thưởng</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.users.include.perms.qlquytdkt.qldauvao')
                    @include('system.users.include.perms.qlquytdkt.qlchihdtdkt')
                    @include('system.users.include.perms.qlquytdkt.qldmchi')
                    @include('system.users.include.perms.qlquytdkt.baocao')
                </div>
            </div>
        </div>
    </div>
</div>
@endif