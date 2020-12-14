<tr style="font-weight: bold; " class="active" >
    <td style="color: #f5f5f5" >E. Quản lý quỹ TĐKT</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qlquytdkt->index) && $setting->qlquytdkt->index == 1) ? 'checked' : '' }} value="1" name="roles[qlquytdkt][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý nguồn thu</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qldauvao->index) && $setting->qldauvao->index == 1) ? 'checked' : '' }} value="1" name="roles[qldauvao][index]"/> </td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý chi hoạt động TĐKT</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qlchihdtdkt->index) && $setting->qlchihdtdkt->index == 1) ? 'checked' : '' }} value="1" name="roles[qlchihdtdkt][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý danh mục chi</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qldmchi->index) && $setting->qldmchi->index == 1) ? 'checked' : '' }} value="1" name="roles[qldmchi][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Báo cáo</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->baocaoquy->index) && $setting->baocaoquy->index == 1) ? 'checked' : '' }} value="1" name="roles[baocaoquy][index]"/></td>
</tr>
