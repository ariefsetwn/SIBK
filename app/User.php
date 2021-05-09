<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'username', 'password', 'is_active', 'role_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  // protected $casts = [
  //   'email_verified_at' => 'datetime',
  // ];

  public function role()
  {
    return $this->belongsTo('App\Models\Role');
  }

  public function siswa()
  {
    return $this->belongsTo('App\Models\Siswa', 'username');
  }

  public function hasRole($role)
  {
    return $this->role()->where('nama', $role)->count() == 1;
  }

  public function guru_bk()
  {
    return $this->belongsTo('App\Models\Gurubk', 'username');
  }

  public function pelanggaran_siswa()
  {
    return $this->belongsTo('App\Models\PelanggaranSiswa', 'username', 'nis');
  }
}
