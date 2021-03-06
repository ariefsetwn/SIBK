<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
  protected $table = "tahun_ajaran";
  protected $fillable = ['nama', 'is_active'];


  public function siswa()
  {
    return $this->hasMany('App\Models\Siswa');
  }
}
