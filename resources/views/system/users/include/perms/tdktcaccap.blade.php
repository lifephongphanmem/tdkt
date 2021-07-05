@if(canGeneral('tdktcaccap','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Quản lý thi đua khen thưởng các cấp
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
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->tdktcaccap->index) && $permission->tdktcaccap->index == 1) ? 'checked' : '' }} value="1" name="roles[tdktcaccap][index]"/></td>
                                    <td>Quản lý thi đua khen thưởng các cấp</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.users.include.perms.tdktcaccap.dangkytd')
                    @include('system.users.include.perms.tdktcaccap.duyetdktd')
                    @include('system.users.include.perms.tdktcaccap.laphosotd')
                    @include('system.users.include.perms.tdktcaccap.trinhhoso')
                    @include('system.users.include.perms.tdktcaccap.duyethoso')
                    @include('system.users.include.perms.tdktcaccap.duyethosocapduoi')
                    @include('system.users.include.perms.tdktcaccap.chuyenhosocaptren')
                </div>
            </div>
        </div>
    </div>
</div>
@endif