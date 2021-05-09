<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class UserRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    $role = auth()->user()->role->nama;
    if (($role == 'Admin' && Request::segment(1) == 'ubah-password') || $role == 'Siswa' || $role == 'Gurubk') {
      return [
        'old_password' => ['required'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ];
    } else if ($role == 'Admin' && Request::segment(3) == 'update') {
      return [
        'username' => ['required', 'max:50', 'unique:users,username,' . $this->id],
        'is_active' => ['required'],
        'role_id' => ['required'],
      ];
    } else if ($role == 'Admin') {
      return [
        'username' => ['required', 'max:50', 'unique:users,username,' . $this->id],
        'password' => ['required', 'string', 'min:8'],
        'is_active' => ['required'],
        'role_id' => ['required'],
      ];
    } else {
      return abort('401');
    }
  }

  public function messages()
  {
    $messages = [
      'username.required' => 'Username harus diisi',
      'username.unique' => 'Username sudah ada',
      'is_active.required' => 'belum dipilih',
      'role_id.required' => 'Role belum dipilih',
      'old_password.required' => 'Silakan isi password lama',
      'password.required' => 'Silakan isi password',
      'password.min' => 'Password minimal 8 karakter',
      'password.confirmed' => 'Password tidak sama',
    ];

    return $messages;
  }
}
