<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomCheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'delivery_date' => 'required|date',
            'delivery_address' => 'required|string',
            'custom_details' => 'required|string',
            'notes' => 'nullable|string',
            'total_price' => 'nullable|numeric|min:150000',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Nama lengkap wajib diisi.',
            'customer_email.required' => 'Email wajib diisi.',
            'customer_email.email' => 'Format email tidak valid.',
            'customer_phone.required' => 'Nomor WhatsApp wajib diisi.',
            'delivery_date.required' => 'Tanggal pengiriman wajib diisi.',
            'delivery_address.required' => 'Alamat pengiriman wajib diisi.',
            'custom_details.required' => 'Detail custom cake wajib diisi.',
            'total_price.min' => 'Harga custom cake minimal Rp 150.000.',
        ];
    }
}
