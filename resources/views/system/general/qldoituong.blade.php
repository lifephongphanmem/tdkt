<tr style="font-weight: bold; " class="active" >
    <td style="color: #f5f5f5" >B. Quản lý đối tượng</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qldoituong->index) && $setting->qldoituong->index == 1) ? 'checked' : '' }} value="1" name="roles[qldoituong][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý đối tượng cá nhân</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qldoituongcn->index) && $setting->qldoituongcn->index == 1) ? 'checked' : '' }} value="1" name="roles[qldoituongcn][index]"/> </td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý đối tượng tập thể</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qldoituongtt->index) && $setting->qldoituongtt->index == 1) ? 'checked' : '' }} value="1" name="roles[qldoituongtt][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý danh mục phân loại đối tượng</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->dmphanloaidt->index) && $setting->dmphanloaidt->index == 1) ? 'checked' : '' }} value="1" name="roles[dmphanloaidt][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý danh mục phân loại đối tượng chi tiết</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->dmphanloaict->index) && $setting->dmphanloaict->index == 1) ? 'checked' : '' }} value="1" name="roles[dmphanloaict][index]"/></td>
</tr>
