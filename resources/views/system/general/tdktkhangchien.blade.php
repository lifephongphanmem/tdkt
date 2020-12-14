<tr style="font-weight: bold; " class="active" >
    <td style="color: #f5f5f5" >A. Quản lý khen thưởng thời kháng chiến</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->tdktkhangchien->index) && $setting->tdktkhangchien->index == 1) ? 'checked' : '' }} value="1" name="roles[tdktkhangchien][index]"/></td>
</tr>
<tr class="warning">
<td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý khen thưởng kháng chiến chống Pháp (cá nhân)</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->chongphapcanhan->index) && $setting->chongphapcanhan->index == 1) ? 'checked' : '' }} value="1" name="roles[chongphapcanhan][index]"/> </td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý kháng chiến chông Mỹ (cá nhân)</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->chongmycanhan->index) && $setting->chongmycanhan->index == 1) ? 'checked' : '' }} value="1" name="roles[chongmycanhan][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý khen thưởng gia đình chống Mỹ</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->chongmygiadinh->index) && $setting->chongmygiadinh->index == 1) ? 'checked' : '' }} value="1" name="roles[chongmygiadinh][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý bằng khen thủ tướng (Hà Bắc cũ)</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->ktthutuong->index) && $setting->ktthutuong->index == 1) ? 'checked' : '' }} value="1" name="roles[ktthutuong][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý bằng khen chủ tịch UBND Tỉnh (Hà Bắc cũ)</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->ktctubnd->index) && $setting->ktctubnd->index == 1) ? 'checked' : '' }} value="1" name="roles[ktctubnd][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý kỷ niệm chương (Hà Bắc cũ)</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->kyniemchuong->index) && $setting->kyniemchuong->index == 1) ? 'checked' : '' }} value="1" name="roles[kyniemchuong][index]"/></td>
</tr>
