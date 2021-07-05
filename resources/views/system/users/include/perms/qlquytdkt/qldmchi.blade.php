@if(canGeneral('qldmchi','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->qldmchi->index) && $permission->qldmchi->index == 1) ? 'checked' : '' }} value="1" name="roles[qldmchi][index]"/>Quản lý danh mục chi
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
                                        <th>Quản lý danh mục chi</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldmchi->index) && $permission->qldmchi->index == 1) ? 'checked' : '' }} value="1" name="roles[qldmchi][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldmchi->create) && $permission->qldmchi->create == 1) ? 'checked' : '' }} value="1" name="roles[qldmchi][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldmchi->edit) && $permission->qldmchi->edit == 1) ? 'checked' : '' }} value="1" name="roles[qldmchi][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qldmchi->delete) && $permission->qldmchi->delete == 1) ? 'checked' : '' }} value="1" name="roles[qldmchi][delete]"/></td>
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
    </div>
@endif