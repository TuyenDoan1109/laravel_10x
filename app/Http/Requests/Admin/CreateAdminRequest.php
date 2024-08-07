<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required'],
            // 'password' => ['required'],
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            // 'email.email' => 'Email không đúng định dạng',
           
            // 'password.required' => 'Mật khẩu không được để trống',

        ];
    }
}
