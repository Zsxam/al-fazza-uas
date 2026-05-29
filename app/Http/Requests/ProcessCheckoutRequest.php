<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessCheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'delivery_date' => 'required|date',
            'delivery_address' => 'required|string',
            'notes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'items.required' => 'Keranjang belanja tidak boleh kosong.',
            'items.array' => 'Format keranjang tidak valid.',
            'items.min' => 'Keranjang belanja minimal berisi 1 produk.',
            'items.*.id.exists' => 'Salah satu produk di keranjang tidak ditemukan di database.',
            'customer_name.required' => 'Nama lengkap wajib diisi.',
            'customer_email.required' => 'Email wajib diisi.',
            'customer_email.email' => 'Format email tidak valid.',
            'customer_phone.required' => 'Nomor WhatsApp wajib diisi.',
            'delivery_date.required' => 'Tanggal pengiriman wajib diisi.',
            'delivery_address.required' => 'Alamat pengiriman wajib diisi.',
        ];
    }
}
