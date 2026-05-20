<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProdiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // diubah dari false ke true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fakultas_id'   => 'required',
            'nama_prodi'    => 'required|min:3',
            'nama_kaprodi'  => 'required|min:3',
            // foto tidak wajib saat update (boleh kosong = pakai foto lama)
            'photo_kaprodi' => 'nullable|max:1024|mimetypes:image/*',
        ];
    }
}