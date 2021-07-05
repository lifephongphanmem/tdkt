@if(canGeneral('trinhhoso','index'))
    <div class="row">
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->trinhhoso->index) && $permission->trinhhoso->index == 1) ? 'checked' : '' }} value="1" name="roles[trinhhoso][index]"/>Trình hồ sơ thi đua khen thưởng tại đơn vị
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
                                        <th>Trình hồ sơ thi đua khen thưởng tại đơn vị</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->trinhhoso->index) && $permission->trinhhoso->index == 1) ? 'checked' : '' }} value="1" name="roles[trinhhoso][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->trinhhoso->create) && $permission->trinhhoso->create == 1) ? 'checked' : '' }} value="1" name="roles[trinhhoso][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->trinhhoso->edit) && $permission->trinhhoso->edit == 1) ? 'checked' : '' }} value="1" name="roles[trinhhoso][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->trinhhoso->delete) && $permission->trinhhoso->delete == 1) ? 'checked' : '' }} value="1" name="roles[trinhhoso][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->trinhhoso->approve) && $permission->trinhhoso->approve == 1) ? 'checked' : '' }} value="1" name="roles[trinhhoso][approve]"/></td>
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