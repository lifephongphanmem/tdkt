@if(canGeneral('duyethosocapduoi','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->duyethosocapduoi->index) && $permission->duyethosocapduoi->index == 1) ? 'checked' : '' }} value="1" name="roles[duyethosocapduoi][index]"/>Duyệt hồ sơ cấp dưới
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
                                        <th>Duyệt hồ sơ cấp dưới</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethosocapduoi->index) && $permission->duyethosocapduoi->index == 1) ? 'checked' : '' }} value="1" name="roles[duyethosocapduoi][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethosocapduoi->create) && $permission->duyethosocapduoi->create == 1) ? 'checked' : '' }} value="1" name="roles[duyethosocapduoi][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethosocapduoi->edit) && $permission->duyethosocapduoi->edit == 1) ? 'checked' : '' }} value="1" name="roles[duyethosocapduoi][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethosocapduoi->delete) && $permission->duyethosocapduoi->delete == 1) ? 'checked' : '' }} value="1" name="roles[duyethosocapduoi][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethosocapduoi->approve) && $permission->duyethosocapduoi->approve == 1) ? 'checked' : '' }} value="1" name="roles[duyethosocapduoi][approve]"/></td>
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