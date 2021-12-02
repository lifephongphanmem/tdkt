<tr class="active" style="font-weight: bold">
    <td style="color: #f5f5f5">G. Quản lý văn bản pháp lý, hướng dẫn, hỏi đáp</td>
    <td style="text-align: center">  <input type="checkbox" {{ (isset($setting->qlvbnn->index) && $setting->qlvbnn->index == 1) ? 'checked' : '' }} value="1" name="roles[qlvbnn][index]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Văn bản pháp quy</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->vbpq->index) && $setting->vbpq->index == 1) ? 'checked' : '' }} value="1" name="roles[vbpq][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Văn bản hướng dẫn</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->vbhd->index) && $setting->vbhd->index == 1) ? 'checked' : '' }} value="1" name="roles[vbhd][index]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Quản lý hỏi đáp</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->qlhoidap->index) && $setting->qlhoidap->index == 1) ? 'checked' : '' }} value="1" name="roles[qlhoidap][index]"/></td>
</tr>