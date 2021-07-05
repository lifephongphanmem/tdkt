{{--Khen thưởng thời ký chống pháp (cá nhân)--}}
@if(canGeneral('kyniemchuong','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->kyniemchuong->index) && $permission->kyniemchuong->index == 1) ? 'checked' : '' }} value="1" name="roles[kyniemchuong][index]"/>Quản lý kỷ niệm chương
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
                                        <th>Quản lý kỷ niệm chương</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kyniemchuong->index) && $permission->kyniemchuong->index == 1) ? 'checked' : '' }} value="1" name="roles[kyniemchuong][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kyniemchuong->create) && $permission->kyniemchuong->create == 1) ? 'checked' : '' }} value="1" name="roles[kyniemchuong][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kyniemchuong->edit) && $permission->kyniemchuong->edit == 1) ? 'checked' : '' }} value="1" name="roles[kyniemchuong][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kyniemchuong->delete) && $permission->kyniemchuong->delete == 1) ? 'checked' : '' }} value="1" name="roles[kyniemchuong][delete]"/></td>
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