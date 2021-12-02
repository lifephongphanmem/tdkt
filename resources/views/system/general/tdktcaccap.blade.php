<tr style="font-weight: bold; " class="active" >
    <td style="color: #f5f5f5" >C. Quản lý khen thưởng các cấp</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->tdktcaccap->index) && $setting->tdktcaccap->index == 1) ? 'checked' : '' }} value="1" name="roles[tdktcaccap][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Đăng ký thi đua</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->dangkytd->index) && $setting->dangkytd->index == 1) ? 'checked' : '' }} value="1" name="roles[dangkytd][index]"/> </td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Duyệt đăng ký thi đua</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->duyetdktd->index) && $setting->duyetdktd->index == 1) ? 'checked' : '' }} value="1" name="roles[duyetdktd][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Tạo lập hồ sơ đăng ký TĐKT</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->laphosotd->index) && $setting->laphosotd->index == 1) ? 'checked' : '' }} value="1" name="roles[laphosotd][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Trình duyệt hồ sơ</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->trinhhoso->index) && $setting->trinhhoso->index == 1) ? 'checked' : '' }} value="1" name="roles[trinhhoso][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Duyệt hồ sơ</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->duyethoso->index) && $setting->duyethoso->index == 1) ? 'checked' : '' }} value="1" name="roles[duyethoso][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Duyệt hồ sơ đơn vị cấp dưới</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->duyethosocapduoi->index) && $setting->duyethosocapduoi->index == 1) ? 'checked' : '' }} value="1" name="roles[duyethosocapduoi][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Trình hồ sơ lên cơ quan cấp trên</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->chuyenhosocaptren->index) && $setting->chuyenhosocaptren->index == 1) ? 'checked' : '' }} value="1" name="roles[chuyenhosocaptren][index]"/></td>
</tr>
