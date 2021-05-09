<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
  protected $table = "kategori";
  protected $fillable = [
    'nama', 'poin'
  ];

  public function pelanggaran_siswa()
  {
    return $this->hasMany('App\Models\PelanggaranSiswa');
  }
}
