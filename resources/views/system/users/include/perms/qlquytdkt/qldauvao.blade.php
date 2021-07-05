@if(canGeneral('qldauvao','index'))
    <div class="row">
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->qldauvao->index) && $permission->qldauvao->index == 1) ? 'checked' : '' }} value="1" name="roles[qldauvao][index]"/>Quản lý khoản thu
                    </div>
                    <div class="tools">
                        <a href="" class="expand" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" style="display: none;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="2%">
                                        </th>
                                        <th>Quản lý khoản thu</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldauvao->index) && $permission->qldauvao->index == 1) ? 'checked' : '' }} value="1" name="roles[qldauvao][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldauvao->create) && $permission->qldauvao->create == 1) ? 'checked' : '' }} value="1" name="roles[qldauvao][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldauvao->edit) && $permission->qldauvao->edit == 1) ? 'checked' : '' }} value="1" name="roles[qldauvao][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldauvao->delete) && $permission->qldauvao->delete == 1) ? 'checked' : '' }} value="1" name="roles[qldauvao][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif