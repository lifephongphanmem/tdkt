<?php

namespace App\Http\Requests\manage;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ChongMyGiaDinhRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function __construct()
    {
        Validator::extend('test', function ($attribute, $value, $parameters) {

        }, 'my custom validation rule message');
        return false;
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'loaikt'=>'required',
            'dhkt'=>'required',
            'soqd'=>'required',
            'noitrkhen'=>'required',
            'sodd'=>'required',
            'namsinh'=>'required',
            'chinhquan'=>'required',
            'cvchohn'=>'required',
            'loaihskc'=>'required',
            'tgiantgkc'=>'required',
            'tgiankcqd'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'loaikt.required'=>'Loại khen thưởng không được để trống',
            'dhkt.required'=>'Danh hiệu khen thưởng không được để trống',
            'soqd.required'=>'Số quyết định không được để trống',
            'noitrkhen.required'=>'Nơi trình khen không được để trống',
            'sodd.required'=>'Số được duyệt không được để trống',
            'namsinh.required'=>'Năm sinh không được để trống',
            'chinhquan.required'=>'Chính quán không được để trống',
            'cvchohn.required'=>'Công việc, chỗ ở hiện nay không được để trống',
            'loaihskc.required'=>'Loại hồ sơ kháng chiến(theo phần mềm cũ) không được để trống',
            'tgiantgkc.required'=>'Thời gian tham gia kháng chiến không được để trống',
            'tgiankcqd.required'=>'Thời gian kháng chiến quy đổi không được để trống',
        ];
    }
}
