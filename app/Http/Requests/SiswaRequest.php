<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class SiswaRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    // $segment = Request::segment(2);
    // if ($segment == "create" || $segment == "store") {
    return [
      'nis' => 'required|numeric|unique:siswa,nis',
      'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
      'jenis_kelamin' => 'required',
      'agama' => 'required',
      'alamat' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required|date',
      'telepon' => 'required|numeric',
      'email' => 'required',
      'kelas_id' => 'required',
      'tahun_ajaran_id' => 'required',
      'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
      'nama_ortu' => 'required',
      'telepon_ortu' => 'required',
      'pekerjaan_ortu' => 'required',
      'alamat_ortu' => 'required',
    ];
  }

  public function messages()
  {
    $messages = [
      'nis.required' => 'NIS harus diisi',
      'nis.numeric' => 'NIS harus angka',
      'nis.unique' => 'NIS sudah ada',
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
      'kelas_id.required' => 'Kelas belum dipilih',
      'tahun_ajaran_id.required' => 'Tahun ajaran belum dipilih',
      'foto.image' => 'Foto harus berupa file gambar',
      'foto.mimes' => 'Foto harus memiliki format jpeg, jpg, atau png',
      'foto.max' => 'Foto maksimal 2MB',
      'nama_ortu.required' => 'Nama Orang tua belum diisi',
      'telepon_ortu.required' => 'Nomor telepon belum diisi',
      'pekerjaan_ortu.required' => 'Pekerjaan Orang tua belum diisi',
      'alamat_ortu.required' => 'Alamat Orang tua belum diisi',
    ];

    return $messages;
  }
}
