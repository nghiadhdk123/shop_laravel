<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:8|max:255',
            'password' => 'required|min:8|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|min:5|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được phép bỏ trống!',
            'name.min' => 'Tên người dùng ngắn quá . Yêu cầu nhập cả họ và tên người dùng!',
            'name.max' => 'Tên người dùng quá dài!',
            'password.required' => 'Mật khẩu không được phép bỏ trống!',
            'password.min' => 'Mật khẩu phải lớn hơn 7 kí tự !',
            'password.max' => 'Mật khẩu quá dài!',
            'email.required' => 'Email không được phép bỏ trống!', 
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Số điện thoại không được phép bỏ trống!',
            'phone.numeric' => 'Số điện thoại phải là số!',
            'address.required' => 'Địa chỉ không được phép bỏ trống!', 
            'address.min' => 'Địa chỉ ngắn quá lừa à ^-^ !',
            'address.max' => 'Địa chỉ quá dài',
        ];
    }
}
