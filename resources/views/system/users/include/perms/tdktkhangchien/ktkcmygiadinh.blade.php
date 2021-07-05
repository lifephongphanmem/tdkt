{{--Khen thưởng thời ký chống Mỹ (cá nhân)--}}
@if(canGeneral('chongmygiadinh','index'))
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->chongmygiadinh->index) && $permission->chongmygiadinh->index == 1) ? 'checked' : '' }} value="1" name="roles[chongmygiadinh][index]"/>Khen thưởng thời kỳ chống Mỹ (gia đình)
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
                                        <th>Quản lý khen thưởng thời kỳ chống Mỹ (gia đình)</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmygiadinh->index) && $permission->chongmygiadinh->index == 1) ? 'checked' : '' }} value="1" name="roles[chongmygiadinh][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmygiadinh->create) && $permission->chongmygiadinh->create == 1) ? 'checked' : '' }} value="1" name="roles[chongmygiadinh][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmygiadinh->edit) && $permission->chongmygiadinh->edit == 1) ? 'checked' : '' }} value="1" name="roles[chongmygiadinh][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chongmygiadinh->delete) && $permission->chongmygiadinh->delete == 1) ? 'checked' : '' }} value="1" name="roles[chongmygiadinh][delete]"/></td>
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