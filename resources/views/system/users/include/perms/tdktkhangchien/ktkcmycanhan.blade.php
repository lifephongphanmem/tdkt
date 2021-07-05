{{--Khen thưởng thời ký chống Mỹ (cá nhân)--}}
@if(canGeneral('chongmycanhan','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->chongmycanhan->index) && $permission->chongmycanhan->index == 1) ? 'checked' : '' }} value="1" name="roles[chongmycanhan][index]"/>Khen thưởng thời kỳ chống Mỹ (cá nhân)
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
                                        <th>Quản lý khen thưởng thời kỳ chống Mỹ (cá nhân)</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmycanhan->index) && $permission->chongmycanhan->index == 1) ? 'checked' : '' }} value="1" name="roles[chongmycanhan][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmycanhan->create) && $permission->chongmycanhan->create == 1) ? 'checked' : '' }} value="1" name="roles[chongmycanhan][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmycanhan->edit) && $permission->chongmycanhan->edit == 1) ? 'checked' : '' }} value="1" name="roles[chongmycanhan][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmycanhan->delete) && $permission->chongmycanhan->delete == 1) ? 'checked' : '' }} value="1" name="roles[chongmycanhan][delete]"/></td>
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