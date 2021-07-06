@if(canGeneral('hiepykhenthuong','index'))
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->hiepykhenthuong->index) && $permission->hiepykhenthuong->index == 1) ? 'checked' : '' }} value="1" name="roles[hiepykhenthuong][index]"/>Quản lý hiệp y khen thưởng
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
                                        <th>Quản lý hiệp y khen thưởng</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hiepykhenthuong->index) && $permission->hiepykhenthuong->index == 1) ? 'checked' : '' }} value="1" name="roles[hiepykhenthuong][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hiepykhenthuong->create) && $permission->hiepykhenthuong->create == 1) ? 'checked' : '' }} value="1" name="roles[hiepykhenthuong][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hiepykhenthuong->edit) && $permission->hiepykhenthuong->edit == 1) ? 'checked' : '' }} value="1" name="roles[hiepykhenthuong][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hiepykhenthuong->delete) && $permission->hiepykhenthuong->delete == 1) ? 'checked' : '' }} value="1" name="roles[hiepykhenthuong][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hiepykhenthuong->approve) && $permission->hiepykhenthuong->approve == 1) ? 'checked' : '' }} value="1" name="roles[hiepykhenthuong][approve]"/></td>
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
    </div>
@endif