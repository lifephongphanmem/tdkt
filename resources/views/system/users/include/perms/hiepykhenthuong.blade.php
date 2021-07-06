@if(canGeneral('hiepykhenthuong','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Quản lý Hiệp y khen thưởng
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
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->hiepykhenthuong->index) && $permission->hiepykhenthuong->index == 1) ? 'checked' : '' }} value="1" name="roles[hiepykhenthuong][index]"/></td>
                                    <td>>Quản lý Hiệp y khen thưởng</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   {{-- @include('system.users.include.perms.hiepykhenthuong.dangkytd')
                    @include('system.users.include.perms.hiepykhenthuong.duyetdktd')
                    @include('system.users.include.perms.hiepykhenthuong.laphosotd')
                    @include('system.users.include.perms.hiepykhenthuong.trinhhoso')
                    @include('system.users.include.perms.hiepykhenthuong.duyethoso')
                    @include('system.users.include.perms.hiepykhenthuong.duyethosocapduoi')--}}
                    @include('system.users.include.perms.hiepykhenthuong.hiepykhenthuong')
                </div>
            </div>
        </div>
    </div>
</div>
@endif