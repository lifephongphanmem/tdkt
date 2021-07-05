@if($model->level == 'T')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                     Quản trị hệ thống
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->system->index) && $permission->system->index == 1) ? 'checked' : '' }} value="1" name="roles[system][index]"/></td>
                                    <td>Quản lý danh mục</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        @if($model->level == 'T' || $model->level == 'H')
                            @if($model->level == 'T')
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                            </th>
                                            <th>Quản lý danh hiệu thi đua khen thưởng</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdanhhieutd->index) && $permission->dmdanhhieutd->index == 1) ? 'checked' : '' }} value="1" name="roles[dmdanhhieutd][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdanhhieutd->create) && $permission->dmdanhhieutd->create == 1) ? 'checked' : '' }} value="1" name="roles[dmdanhhieutd][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdanhhieutd->edit) && $permission->dmdanhhieutd->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmdanhhieutd][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdanhhieutd->delete) && $permission->dmdanhhieutd->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmdanhhieutd][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                            </th>
                                            <th>Quản lý tiêu chuẩn cho các danh hiệu TĐKT</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmtieuchuandhtd->index) && $permission->dmtieuchuandhtd->index == 1) ? 'checked' : '' }} value="1" name="roles[dmtieuchuandhtd][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmtieuchuandhtd->create) && $permission->dmtieuchuandhtd->create == 1) ? 'checked' : '' }} value="1" name="roles[dmtieuchuandhtd][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmtieuchuandhtd->edit) && $permission->dmtieuchuandhtd->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmtieuchuandhtd][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmtieuchuandhtd->delete) && $permission->dmtieuchuandhtd->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmtieuchuandhtd][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%"></th>
                                            <th>Quản lý hình thức TĐKT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmhinhthuckt->index) && $permission->dmhinhthuckt->index == 1) ? 'checked' : '' }} value="1" name="roles[dmhinhthuckt][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmhinhthuckt->create) && $permission->dmhinhthuckt->create == 1) ? 'checked' : '' }} value="1" name="roles[dmhinhthuckt][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmhinhthuckt->edit) && $permission->dmhinhthuckt->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmhinhthuckt][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmhinhthuckt->delete) && $permission->dmhinhthuckt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmhinhthuckt][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                        </th>
                                        <th>Quản lý danh mục các loại hình TĐKT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmloaihinhkt->index) && $permission->dmloaihinhkt->index == 1) ? 'checked' : '' }} value="1" name="roles[dmloaihinhkt][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmloaihinhkt->create) && $permission->dmloaihinhkt->create == 1) ? 'checked' : '' }} value="1" name="roles[dmloaihinhkt][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmloaihinhkt->edit) && $permission->dmloaihinhkt->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmloaihinhkt][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmloaihinhkt->delete) && $permission->dmloaihinhkt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmloaihinhkt][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif