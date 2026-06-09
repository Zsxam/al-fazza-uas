<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_status' => 'required|in:baru,diproses,dikirim,selesai',
        ];
    }

    public function messages(): array
    {
        return [
            'order_status.required' => 'Status pesanan wajib dipilih.',
            'order_status.in' => 'Status pesanan tidak valid.',
        ];
    }
}
