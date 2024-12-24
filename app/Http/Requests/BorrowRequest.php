<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowRequest extends FormRequest
{
    /**
     * Xác định người dùng có quyền thực hiện yêu cầu này không.
     */
    public function authorize(): bool
    {
        return true; // Đảm bảo yêu cầu được phép thực thi
    }

    /**
     * Quy tắc xác thực áp dụng cho yêu cầu này.
     */
    public function rules(): array
    {
        return [
            'reader_name' => 'required|exists:readers,name', // Kiểm tra tên người mượn
            'book_name' => 'required|exists:books,name', // Kiểm tra tên sách
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi.
     */
    public function messages(): array
    {
        return [
            'reader_name.required' => 'Tên người mượn là bắt buộc.',
            'reader_name.exists' => 'Tên người mượn không tồn tại.',
            'book_name.required' => 'Tên sách là bắt buộc.',
            'book_name.exists' => 'Tên sách không tồn tại.',
        ];
    }
}
