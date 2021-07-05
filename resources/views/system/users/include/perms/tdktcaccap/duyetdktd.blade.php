@if(canGeneral('duyetdktd','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->duyetdktd->index) && $permission->duyetdktd->index == 1) ? 'checked' : '' }} value="1" name="roles[duyetdktd][index]"/>Duyệt đăng ký thi đua
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
                                        <th>Duyệt đăng ký thi đua</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyetdktd->index) && $permission->duyetdktd->index == 1) ? 'checked' : '' }} value="1" name="roles[duyetdktd][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyetdktd->create) && $permission->duyetdktd->create == 1) ? 'checked' : '' }} value="1" name="roles[duyetdktd][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyetdktd->edit) && $permission->duyetdktd->edit == 1) ? 'checked' : '' }} value="1" name="roles[duyetdktd][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyetdktd->delete) && $permission->duyetdktd->delete == 1) ? 'checked' : '' }} value="1" name="roles[duyetdktd][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->duyetdktd->approve) && $permission->duyetdktd->approve == 1) ? 'checked' : '' }} value="1" name="roles[duyetdktd][approve]"/></td>
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