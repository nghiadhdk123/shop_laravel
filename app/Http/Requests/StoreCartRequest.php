<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mong quý khách hãy nhập tên người nhận',
            'phone.required' => 'Mong quý khách hãy nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại phải bằng số',
            'address.required' => 'Mong quý khách hãy nhập địa chỉ giao hàng',
        ];
    }
}
