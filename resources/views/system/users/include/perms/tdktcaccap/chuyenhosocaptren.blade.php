@if(canGeneral('chuyenhosocaptren','index'))
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->chuyenhosocaptren->index) && $permission->chuyenhosocaptren->index == 1) ? 'checked' : '' }} value="1" name="roles[chuyenhosocaptren][index]"/>Chuyển hồ sơ lên đơn vị cấp trên
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
                                        <th>Chuyển hồ sơ lên đơn vị cấp trên</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chuyenhosocaptren->index) && $permission->chuyenhosocaptren->index == 1) ? 'checked' : '' }} value="1" name="roles[chuyenhosocaptren][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chuyenhosocaptren->create) && $permission->chuyenhosocaptren->create == 1) ? 'checked' : '' }} value="1" name="roles[chuyenhosocaptren][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chuyenhosocaptren->edit) && $permission->chuyenhosocaptren->edit == 1) ? 'checked' : '' }} value="1" name="roles[chuyenhosocaptren][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chuyenhosocaptren->delete) && $permission->chuyenhosocaptren->delete == 1) ? 'checked' : '' }} value="1" name="roles[chuyenhosocaptren][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chuyenhosocaptren->approve) && $permission->chuyenhosocaptren->approve == 1) ? 'checked' : '' }} value="1" name="roles[chuyenhosocaptren][approve]"/></td>
                                        <td>Xét duyệt</td>
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