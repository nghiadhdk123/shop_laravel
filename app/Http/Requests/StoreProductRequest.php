<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'         => 'required|min:4|max:255',
            'origin_price' => 'required|numeric',
            'price_sales'   => 'required|numeric',
            'image'  => 'required|file|mines:jpeg,jpg,png,gif,svg|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được phép bỏ trống!',
        ];
    }
}
