@if(canGeneral('duyethoso','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->duyethoso->index) && $permission->duyethoso->index == 1) ? 'checked' : '' }} value="1" name="roles[duyethoso][index]"/>Duyệt hồ sơ thi đua khen thưởng tại đơn vị
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
                                        <th>Duyệt hồ sơ thi đua khen thưởng tại đơn vị</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethoso->index) && $permission->duyethoso->index == 1) ? 'checked' : '' }} value="1" name="roles[duyethoso][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethoso->create) && $permission->duyethoso->create == 1) ? 'checked' : '' }} value="1" name="roles[duyethoso][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethoso->edit) && $permission->duyethoso->edit == 1) ? 'checked' : '' }} value="1" name="roles[duyethoso][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethoso->delete) && $permission->duyethoso->delete == 1) ? 'checked' : '' }} value="1" name="roles[duyethoso][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyethoso->approve) && $permission->duyethoso->approve == 1) ? 'checked' : '' }} value="1" name="roles[duyethoso][approve]"/></td>
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
@endif