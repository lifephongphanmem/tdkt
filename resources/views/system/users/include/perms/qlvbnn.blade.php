@if(canGeneral('qlvbnn','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Quản lý văn bản pháp lý, hướng dẫn, hỏi đáp
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
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->qlvbnn->index) && $permission->qlvbnn->index == 1) ? 'checked' : '' }} value="1" name="roles[qlvbnn][index]"/></td>
                                    <td>Quản lý văn bản pháp lý, hướng dẫn, hỏi đáp</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   {{-- @include('system.users.include.perms.qlvbnn.dangkytd')
                    @include('system.users.include.perms.qlvbnn.duyetdktd')
                    @include('system.users.include.perms.qlvbnn.laphosotd')
                    @include('system.users.include.perms.qlvbnn.trinhhoso')
                    @include('system.users.include.perms.qlvbnn.duyethoso')
                    @include('system.users.include.perms.qlvbnn.duyethosocapduoi')--}}
                    @include('system.users.include.perms.qlvbnn.qlhoidap')
                </div>
            </div>
        </div>
    </div>
</div>
@endif