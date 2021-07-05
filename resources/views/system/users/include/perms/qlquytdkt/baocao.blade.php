@if(canGeneral('baocaoquy','index'))
    <div class="row">
        <div class="col-md-4 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->baocaoquy->index) && $permission->baocaoquy->index == 1) ? 'checked' : '' }} value="1" name="roles[baocaoquy][index]"/>Báo cáo tổng hợp
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
                                        <th>Báo cáo tổng hợp</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->baocaoquy->baocao) && $permission->baocaoquy->baocao == 1) ? 'checked' : '' }} value="1" name="roles[baocaoquy][baocao]"/></td>
                                        <td>Báo cáo tổng hợp</td>
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