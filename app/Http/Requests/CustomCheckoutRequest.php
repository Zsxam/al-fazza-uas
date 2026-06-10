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
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|email|max:100',
            // No WhatsApp maksimal 15 angka
            'customer_phone' => 'required|string|max:15',
            'delivery_date' => 'required|date',
            // Alamat maksimal 300 karakter
            'delivery_address' => 'nullable|string|max:100',
            // Karena detail kue digabung semua, kita beri batas aman maksimal 300 karakter
            'custom_details' => 'required|string|max:300',
            // Catatan maksimal 250 karakter
            'notes' => 'nullable|string|max:250',
            'ukuran' => 'required|string|in:16 cm,18 cm,20 cm,22 cm,24 cm,30 cm',
            'total_price' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            // Pesan jika field tidak diisi (required)
            'customer_name.required' => 'Nama lengkap wajib diisi.',
            'customer_email.required' => 'Email wajib diisi.',
            'customer_phone.required' => 'Nomor WhatsApp wajib diisi.',
            'delivery_date.required' => 'Tanggal pengiriman wajib diisi.',
            'custom_details.required' => 'Detail desain kue belum lengkap, mohon isi form dengan benar.',
            
            // Pesan error jika melebihi batas karakter (max)
            'customer_phone.max' => 'Nomor WhatsApp tidak boleh lebih dari 15 digit.',
            'delivery_address.max' => 'Alamat terlalu panjang, maksimal 300 karakter.',
            'custom_details.max' => 'Teks tema atau tulisan kue Anda terlalu panjang, persingkat pesan Anda.',
            'notes.max' => 'Catatan tambahan maksimal 250 karakter.',
            
            // Pesan format salah
            'customer_email.email' => 'Format email tidak valid.',
        ];
    }
}
