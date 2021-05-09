<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  protected $table = "siswa";
  protected $primaryKey = "nis";
  protected $fillable = [
    'nis', 'nama', 'jenis_kelamin', 'alamat',
    'tempat_lahir', 'tanggal_lahir', 'telepon',
    'email', 'foto', 'kelas_id', 'tahun_ajaran_id', 'agama',
    'nama_ortu', 'telepon_ortu', 'pekerjaan_ortu', 'alamat_ortu',
  ];

  public function kelas()
  {
    return $this->belongsTo('App\Models\Kelas');
  }

  public function tahun_ajaran()
  {
    return $this->belongsTo('App\Models\TahunAjaran');
  }

  public function pelanggaran_siswa()
  {
    return $this->belongsTo('App\Models\PelanggaranSiswa');
  }
}
