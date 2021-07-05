{{--Khen thưởng thời ký chống pháp (cá nhân)--}}
@if(canGeneral('ktthutuong','index'))
    <div class="row">
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->ktthutuong->index) && $permission->ktthutuong->index == 1) ? 'checked' : '' }} value="1" name="roles[ktthutuong][index]"/>Quản lý bằng khen thủ tướng
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
                                        <th>Quản lý bằng khen thủ tướng</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ktthutuong->index) && $permission->ktthutuong->index == 1) ? 'checked' : '' }} value="1" name="roles[ktthutuong][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ktthutuong->create) && $permission->ktthutuong->create == 1) ? 'checked' : '' }} value="1" name="roles[ktthutuong][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ktthutuong->edit) && $permission->ktthutuong->edit == 1) ? 'checked' : '' }} value="1" name="roles[ktthutuong][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ktthutuong->delete) && $permission->ktthutuong->delete == 1) ? 'checked' : '' }} value="1" name="roles[ktthutuong][delete]"/></td>
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