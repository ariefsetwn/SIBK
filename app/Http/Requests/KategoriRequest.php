<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'nama' => 'required',
      'poin' => 'required',
    ];
  }

  public function messages()
  {
    $messages = [
      'nama.required' => 'Nama kategori belum diisi',
      'poin.required' => 'Poin kategori belum diisi',
    ];

    return $messages;
  }
}
