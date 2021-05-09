<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class PelanggaranSiswaRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    $segment = Request::segment(2);
    $edit = Request::segment(3);
    $siswaCreate = Request::segment(1);
    if ($segment == "create" || $segment == "store" || $edit == "edit" || $edit == "update") {
      return [
        'nis' => 'required',
        'kategori_id' => 'required',
        'keterangan' => 'required'

      ];
    } else if ($siswaCreate == "siswa") {
      return [
        'kategori_id' => 'required',
        'keterangan' => 'required'
      ];
    } else {
      return [
        'kategori_id' => 'required',
        'keterangan' => 'required'
      ];
    }
  }

  public function messages()
  {
    $messages = [
      'nis.required' => 'NIS belum dipilih',
      'kategori_id.required' => 'Kategori belum dipilih',
      'keterangan.required' => 'keterangan belum dimasukkan'
    ];

    return $messages;
  }
}
