<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliesProductRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có quyền gửi yêu cầu này không.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Thay đổi tùy theo yêu cầu của bạn
    }

    /**
     * Quy tắc validation cho yêu cầu.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'product_type' => 'required|integer',
            'kind_product_type' => 'nullable|integer',
            'status' => 'required|integer',
        ];

        if(!$this->isMethod('put')){
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }

    /**
     * Các thông báo lỗi tùy chỉnh.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên vật liệu là bắt buộc.',
            'type.required' => 'Thương hiệu là bắt buộc.',
            'product_type.required' => 'Loại sản phẩm là bắt buộc.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'image.required' => 'Trạng thái là bắt buộc.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'image.max' => 'Kích thước tệp hình ảnh không được vượt quá 2MB.',
        ];
    }
}
