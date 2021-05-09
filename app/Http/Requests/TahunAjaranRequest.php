<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TahunAjaranRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'nama' => 'required|unique:tahun_ajaran,nama,' . $this->id,
      'is_active' => 'required',
    ];
  }

  public function messages()
  {
    $messages = [
      'nama.required' => 'Tahun ajaran harus diisi',
      'nama.unique' => 'Tahun ajaran sudah ada',
      'is_active.required' => 'belum dipilih',
    ];

    return $messages;
  }
}
