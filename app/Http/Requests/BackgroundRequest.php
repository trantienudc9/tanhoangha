<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackgroundRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có quyền gửi yêu cầu này hay không.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Thay đổi thành false nếu bạn cần kiểm tra quyền người dùng
    }

    /**
     * Xác định các quy tắc xác thực cho yêu cầu.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_kind_background' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    /**
     * Xác định thông báo lỗi tùy chỉnh cho xác thực.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id_kind_background.required' => 'Vui lòng chọn vật tư.',
            'image.required' => 'Vui lòng chọn một ảnh.',
            'image.image' => 'Tệp phải là một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, hoặc png.',
            'image.max' => 'Kích thước ảnh không được vượt quá 2MB.',
        ];
    }
}

