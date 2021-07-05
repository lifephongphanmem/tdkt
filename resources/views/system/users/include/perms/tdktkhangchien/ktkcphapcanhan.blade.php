{{--Khen thưởng thời ký chống pháp (cá nhân)--}}
@if(canGeneral('chongphapcanhan','index'))
    <div class="row">
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->chongphapcanhan->index) && $permission->chongphapcanhan->index == 1) ? 'checked' : '' }} value="1" name="roles[chongphapcanhan][index]"/>Khen thưởng thời kỳ chống Pháp (cá nhân)
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
                                        <th>Quản lý khen thưởng thời kỳ chống pháp (cá nhân)</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongphapcanhan->index) && $permission->chongphapcanhan->index == 1) ? 'checked' : '' }} value="1" name="roles[chongphapcanhan][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongphapcanhan->create) && $permission->chongphapcanhan->create == 1) ? 'checked' : '' }} value="1" name="roles[chongphapcanhan][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongphapcanhan->edit) && $permission->chongphapcanhan->edit == 1) ? 'checked' : '' }} value="1" name="roles[chongphapcanhan][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongphapcanhan->delete) && $permission->chongphapcanhan->delete == 1) ? 'checked' : '' }} value="1" name="roles[chongphapcanhan][delete]"/></td>
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