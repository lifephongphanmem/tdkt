@if(canGeneral('laphosotd','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->laphosotd->index) && $permission->laphosotd->index == 1) ? 'checked' : '' }} value="1" name="roles[laphosotd][index]"/>Tạo lập hồ sơ thi đua khen thưởng tại đơn vị
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
                                        <th>Tạo lập hồ sơ thi đua khen thưởng</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->laphosotd->index) && $permission->laphosotd->index == 1) ? 'checked' : '' }} value="1" name="roles[laphosotd][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->laphosotd->create) && $permission->laphosotd->create == 1) ? 'checked' : '' }} value="1" name="roles[laphosotd][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->laphosotd->edit) && $permission->laphosotd->edit == 1) ? 'checked' : '' }} value="1" name="roles[laphosotd][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->laphosotd->delete) && $permission->laphosotd->delete == 1) ? 'checked' : '' }} value="1" name="roles[laphosotd][delete]"/></td>
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