<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelanggaranSiswa extends Model
{
  protected $table = "pelanggaran_siswa";
  protected $fillable = [
    'tanggal', 'nis', 'kategori_id', 'keterangan'
  ];

  public function siswa()
  {
    return $this->belongsTo('App\Models\Siswa', 'nis');
  }

  public function kategori()
  {
    return $this->belongsTo('App\Models\Kategori');
  }

  // public function kelas()
  // {
  //   return $this->hasManyThrough('App\Models\Kelas', 'App\Models\Siswa');
  // }
}
