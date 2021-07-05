@if(canGeneral('qlchihdtdkt','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->qlchihdtdkt->index) && $permission->qlchihdtdkt->index == 1) ? 'checked' : '' }} value="1" name="roles[qlchihdtdkt][index]"/>Quản lý chi hoạt động TĐKT
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
                                        <th>Quản lý chi hoạt động TĐKT</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlchihdtdkt->index) && $permission->qlchihdtdkt->index == 1) ? 'checked' : '' }} value="1" name="roles[qlchihdtdkt][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlchihdtdkt->create) && $permission->qlchihdtdkt->create == 1) ? 'checked' : '' }} value="1" name="roles[qlchihdtdkt][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlchihdtdkt->edit) && $permission->qlchihdtdkt->edit == 1) ? 'checked' : '' }} value="1" name="roles[qlchihdtdkt][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlchihdtdkt->delete) && $permission->qlchihdtdkt->delete == 1) ? 'checked' : '' }} value="1" name="roles[qlchihdtdkt][delete]"/></td>
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