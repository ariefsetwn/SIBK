<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GurubkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nip' => 'required|numeric|unique:guru_bk,nip',
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'telepon' => 'required|numeric',
            'email' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        $messages = [
            'nip.required' => 'NIP harus diisi',
            'nip.numeric' => 'NIP harus angka',
            'nip.unique' => 'NIP sudah ada',
            'nama.required' => 'Nama harus diisi',
            'nama.regex' => 'Nama harus berupa huruf',
            'jenis_kelamin.required' => 'Jenis kelamin belum dipilih',
            'agama.required' => 'Agama belum dipilih',
            'alamat.required' => 'Alamat harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'Tanggal lahir tidak valid',
            'telepon.required' => 'Nomor telepon harus diisi',
            'telepon.numeric' => 'Nomor telepon harus angka',
            'email.required' => 'Email harus diisi',
            'foto.image' => 'Foto harus berupa file gambar',
            'foto.mimes' => 'Foto harus memiliki format jpeg, jpg, atau png',
            'foto.max' => 'Foto maksimal 2MB'
        ];

        return $messages;
    }
}
