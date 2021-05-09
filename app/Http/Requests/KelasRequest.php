<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'nama' => 'required|unique:kelas,nama,' . $this->id
    ];
  }

  public function messages()
  {
    $messages = [
      'nama.required' => 'Nama kelas harus diisi',
      'nama.unique' => 'Nama kelas sudah ada'
    ];

    return $messages;
  }
}
