<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gurubk extends Model
{
    protected $table = "guru_bk";
    protected $primaryKey = "nip";
    protected $fillable = [
        'nip', 'nama', 'jenis_kelamin', 'alamat',
        'tempat_lahir', 'tanggal_lahir', 'telepon',
        'email', 'foto', 'agama'
    ];
}
