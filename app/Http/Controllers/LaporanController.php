<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\PelanggaranSiswa;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use PDF;

class LaporanController extends Controller
{
    public function index($kls = null, $thn = null)
    {
        $siswa = Siswa::select('siswa.*')
            ->join('pelanggaran_siswa', 'pelanggaran_siswa.nis', 'siswa.nis')
            ->distinct('siswa.nis')
            ->get();
        // return view('admin.laporan.index', compact('siswa'));

        $tahun_ajaran = TahunAjaran::OrderBy('nama', 'asc')->get();
        $kelas = Kelas::OrderBy('id', 'asc')->get();

        if (!empty($thn) && !empty($kls)) {
            $siswa = Siswa::where('tahun_ajaran_id', $thn)->where('kelas_id', $kls)->get();
        } else if (!empty($thn)) {
            $siswa = Siswa::where('tahun_ajaran_id', $thn)->get();
        } else if (!empty($kls)) {
            $siswa = Siswa::where('kelas_id', $kls)->get();
        } else {
            $siswa = Siswa::OrderBy('nis', 'asc')->get();
        }

        //jika kelas atau tahun ajaran tidak disortir
        return view('admin.laporan.index', compact('siswa', 'kelas', 'tahun_ajaran'));
    }

    public function pelanggaran_siswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $pelanggaran_siswa = PelanggaranSiswa::where('nis', $id)->orderBy('tanggal', 'desc')->get();
        return view('admin.laporan.pelanggaran_siswa', compact('siswa', 'pelanggaran_siswa'));
    }

    public function data_print()
    {
        $pelanggaran_siswa = PelanggaranSiswa::orderBy('nis', 'desc')
            ->orderBy('tanggal', 'desc')->get();
        $pdf = PDF::loadview('admin.laporan.data_print', compact('pelanggaran_siswa'));
        return $pdf->download('Laporan Pelanggaran data Siswa');
    }

    public function siswa_print($id)
    {
        $siswa = Siswa::findOrFail($id);
        $pelanggaran_siswa = PelanggaranSiswa::where('nis', $id)->orderBy('tanggal', 'desc')->get();
        $jumlah = PelanggaranSiswa::where('nis', $id)
            ->join('kategori', 'kategori.id', 'pelanggaran_siswa.kategori_id')->sum('poin');
        $pdf = PDF::loadview('admin.laporan.siswa_print', compact('siswa', 'pelanggaran_siswa', 'jumlah'));
        return $pdf->download('Laporan Pelanggaran Siswa');
    }
}
