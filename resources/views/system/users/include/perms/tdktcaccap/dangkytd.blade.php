@if(canGeneral('dangkytd','index'))
    <div class="row">
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dangkytd->index) && $permission->dangkytd->index == 1) ? 'checked' : '' }} value="1" name="roles[dangkytd][index]"/>Đăng ký thi đua
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
                                        <th>Đăng ký thi đua</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dangkytd->index) && $permission->dangkytd->index == 1) ? 'checked' : '' }} value="1" name="roles[dangkytd][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dangkytd->create) && $permission->dangkytd->create == 1) ? 'checked' : '' }} value="1" name="roles[dangkytd][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dangkytd->edit) && $permission->dangkytd->edit == 1) ? 'checked' : '' }} value="1" name="roles[dangkytd][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dangkytd->delete) && $permission->dangkytd->delete == 1) ? 'checked' : '' }} value="1" name="roles[dangkytd][delete]"/></td>
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