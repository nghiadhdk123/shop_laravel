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
            // 'image'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được phép bỏ trống !',
            'name.min' => 'Tên sản phẩm không được ngắn quá 4 kí tự !',
            'name.max' => 'Tên sản phẩm dài quá !',
            'origin_price.required' => 'Giá gốc sản phẩm không được phép bỏ trống !',
            'origin_price.numeric' => 'Giá sản phẩm phải là số !',
            'price_sales.required' => 'Giá bán sản phẩm không được phép bỏ trống !',
            'price_sales.numeric' => 'Giá bán sản phẩm phải là số !',
            // 'image.required' => 'Ảnh sản phẩm không được phép bỏ trống !',
        ];
    }
}
