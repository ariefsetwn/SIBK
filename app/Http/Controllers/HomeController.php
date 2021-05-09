<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\PelanggaranSiswa;
use App\Models\Gurubk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $role = $user->role->nama;

        if ($role == "Admin" || $role == 'Gurubk') {
            $siswa = Siswa::count();
            $pelanggaran_siswa = PelanggaranSiswa::count();
            $kelas = Kelas::count();
            $kategori = Kategori::count();
            $guru_bk = Gurubk::count();
            return view('home', compact(
                'siswa',
                'guru_bk',
                'pelanggaran_siswa',
                'kelas'
            ));
        } else if ($role == "Siswa") {
            return redirect('/siswa/profile');
        }
    }
}
