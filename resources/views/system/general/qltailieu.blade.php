<tr style="font-weight: bold; " class="active" >
    <td style="color: #f5f5f5" >C. Quản lý tài liệu liên quan</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qltailieu->index) && $setting->qltailieu->index == 1) ? 'checked' : '' }} value="1" name="roles[qltailieu][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý quyết định khen thưởng</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qlquyetdinhkt->index) && $setting->qlquyetdinhkt->index == 1) ? 'checked' : '' }} value="1" name="roles[qlquyetdinhkt][index]"/> </td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý tờ trình khen thưởng</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qltotrinhkt->index) && $setting->qltotrinhkt->index == 1) ? 'checked' : '' }} value="1" name="roles[qltotrinhkt][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý biên bản</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qlbienban->index) && $setting->qlbienban->index == 1) ? 'checked' : '' }} value="1" name="roles[qlbienban][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý file đính kèm</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qlfile->index) && $setting->qlfile->index == 1) ? 'checked' : '' }} value="1" name="roles[qlfile][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý các phong trào thi đua</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qlphontraotd->index) && $setting->qlphontraotd->index == 1) ? 'checked' : '' }} value="1" name="roles[qlphontraotd][index]"/></td>
</tr>
