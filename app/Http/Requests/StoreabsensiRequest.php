<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreabsensiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
                'nama_karyawan' => 'required',
                'tanggal_masuk' => 'required',
                'waktu_masuk' => 'required',
                'status' => 'required',
                'waktu_selesaikerja' => 'required',
        ];
    }
    public function message()
    {
        return[
            'nama_karyawan.required' => "Data Nama karyawan belum diisi",
            'tanggal_masuk.required' => "Data tanggal masuk belum diisi",
            'waktu_masuk.required' => "Data waktu masuk belum diisi",
            'status.required' => "Data status belum diisi",
            'waktu_selsaikerja.required' => "Data waktu selesaikerja belum diisi"
        ];
    }

}
