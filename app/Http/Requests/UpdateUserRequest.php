<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    // Xác định xem người dùng có quyền thực hiện request này không
    public function authorize()
    {
        return true; // Hoặc tùy chỉnh theo logic của bạn
    }

    // Quy tắc xác thực
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            // Thêm các field khác nếu cần
        ];
    }

    // Thông điệp lỗi tùy chỉnh (nếu cần)
    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.unique' => 'Email đã tồn tại.',
            // Thêm các thông điệp khác nếu cần
        ];
    }
}

