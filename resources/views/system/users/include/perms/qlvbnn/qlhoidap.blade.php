@if(canGeneral('qlhoidap','index'))
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->qlhoidap->index) && $permission->qlhoidap->index == 1) ? 'checked' : '' }} value="1" name="roles[qlhoidap][index]"/>Quản lý hỏi đáp
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
                                        <th>Quản lý hỏi đáp</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlhoidap->index) && $permission->qlhoidap->index == 1) ? 'checked' : '' }} value="1" name="roles[qlhoidap][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlhoidap->create) && $permission->qlhoidap->create == 1) ? 'checked' : '' }} value="1" name="roles[qlhoidap][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlhoidap->edit) && $permission->qlhoidap->edit == 1) ? 'checked' : '' }} value="1" name="roles[qlhoidap][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlhoidap->delete) && $permission->qlhoidap->delete == 1) ? 'checked' : '' }} value="1" name="roles[qlhoidap][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->qlhoidap->approve) && $permission->qlhoidap->approve == 1) ? 'checked' : '' }} value="1" name="roles[qlhoidap][approve]"/></td>
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