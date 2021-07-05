@if(canGeneral('tdktkhangchien','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Quản lý khen thưởng thời kỳ kháng chiến
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
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->tdktkhangchien->index) && $permission->tdktkhangchien->index == 1) ? 'checked' : '' }} value="1" name="roles[tdktkhangchien][index]"/></td>
                                    <td>Quản lý khen thưởng thời kỳ kháng chiến</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.users.include.perms.tdktkhangchien.ktkcphapcanhan')
                    @include('system.users.include.perms.tdktkhangchien.ktkcmycanhan')
                    @include('system.users.include.perms.tdktkhangchien.ktkcmygiadinh')
                    @include('system.users.include.perms.tdktkhangchien.bangkhenthutuong')
                    @include('system.users.include.perms.tdktkhangchien.bangkhenchutich')
                    @include('system.users.include.perms.tdktkhangchien.kyniemchuong')
                </div>
            </div>
        </div>
    </div>
</div>
@endif