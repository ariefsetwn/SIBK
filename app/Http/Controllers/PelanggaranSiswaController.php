<?php

namespace App\Http\Controllers;

use App\Models\PelanggaranSiswa;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Kategori;
use App\Models\Gurubk;
use App\Http\Requests\PelanggaranSiswaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PDF;

class PelanggaranSiswaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($kls = null, $thn = null)
  {
    $user = auth()->user();
    $role = $user->role->nama;

    if ($role == "Admin" || $role == 'Gurubk') {
      $pelanggaran_siswa = PelanggaranSiswa::orderBy('nis', 'desc')
        ->orderBy('tanggal', 'desc')
        ->get();

      // sortir kelas dan tahun ajaran
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
      // return view('admin.pelanggaran-siswa.index', compact('siswa', 'kelas', 'tahun_ajaran'));
      // return view('admin.pelanggaran-siswa.index', compact('pelanggaran_siswa'));
      return view('admin.pelanggaran-siswa.index', compact('pelanggaran_siswa', 'siswa', 'kelas', 'tahun_ajaran'));
    } else if ($role == "Siswa") {
      $nis = $user->siswa->nis;
      $pelanggaran_siswa = PelanggaranSiswa::where('nis', '=', $nis)->OrderBy('tanggal', 'desc')->get();
      return view('siswa.pelanggaran-siswa.index', compact('pelanggaran_siswa'));
    }
  }

  public function show($id = null)
  {
    $user = auth()->user();
    $role = $user->role->nama;
    $pelanggaran_siswa = PelanggaranSiswa::findOrFail($id);
    if ($role == "Admin" || $role == 'Gurubk') {
      $pelanggaran_siswa = DB::select('SELECT p.tanggal, keterangan, p.id,
                        s.nis, s.nama AS nama_siswa,
                        i.id AS id_kategori, i.nama AS nama_kategori, i.poin,
                        k.nama AS nama_kelas
                        FROM pelanggaran_siswa p
                        INNER JOIN siswa s
                                ON s.nis = p.nis 
                        INNER JOIN kategori i
                                ON i.id = p.kategori_id 
                        INNER JOIN kelas k
                                ON k.id = s.kelas_id
                             WHERE p.id = ' . $id);
      $kategori = Kategori::all();
      return view('admin.pelanggaran-siswa.detail', compact('pelanggaran_siswa', 'kategori'));
    } else if ($role == "Siswa") {
      $nis = $user->siswa->nis;
      $pelanggaran_siswa =  DB::select("SELECT p.tanggal, keterangan, p.id AS id_pelanggaran_siswa,
                    s.nis, s.nama AS nama_siswa,
                    i.id AS id_kategori, i.nama AS nama_kategori,
                    k.nama AS nama_kelas
                    FROM pelanggaran_siswa p
                    INNER JOIN siswa s
                            ON s.nis = p.nis 
                    INNER JOIN kategori i
                            ON i.id = p.kategori_id 
                    INNER JOIN kelas k
                            ON k.id = s.kelas_id           
                        WHERE s.nis = $nis ");
      return view('siswa.pelanggaran-siswa.detail', compact('pelanggaran_siswa'));
    }
  }

  public function create()
  {
    $siswa = Siswa::orderBy('nis', 'asc')->get();
    $kategori = Kategori::orderBy('nama', 'asc')->get();
    $pelanggaran_siswa = PelanggaranSiswa::all();
    return view('admin.pelanggaran-siswa.create', compact('kategori', 'pelanggaran_siswa', 'siswa'));
  }

  public function store(PelanggaranSiswaRequest $request)
  {
    $user = auth()->user();
    $role = $user->role->nama;

    if ($role == "Admin" || $role == 'Gurubk') {
      $nis = $request->nis;
      $siswa = Siswa::where('nis', '=', $nis)->first();
      // Cek apakah siswa dengan nis tersebut ada
      if ($siswa === null) {
        session()->flash('pesan', 'Siswa tidak ditemukan');
        return redirect()->back();
      }

      PelanggaranSiswa::create([
        'nis' => $request->nis,
        'tanggal' => date("Y-m-d"),
        'kategori_id' => $request->kategori_id,
        'keterangan' => $request->keterangan
      ]);

      session()->flash('pesan', 'Data Berhasil Ditambah');
      return redirect('/pelanggaran-siswa');
      // Jika role adalah Siswa
    } else {
      return abort('404');
    }
  }

  public function edit($id = null)
  {
    $user = auth()->user();
    $role = $user->role->nama;

    if ($role == "Admin" || $role == 'Gurubk') {
      $siswa = Siswa::All();
      $pelanggaran_siswa = PelanggaranSiswa::findOrFail($id);
      $kategori = Kategori::all();
      return view('admin.pelanggaran-siswa.edit', compact('pelanggaran_siswa', 'kategori', 'siswa'));
    } else {
      return abort('404');
    }
  }

  public function update($id = null, PelanggaranSiswaRequest $request)
  {
    $user = auth()->user();
    $role = $user->role->nama;

    if ($role == "Admin" || $role == 'Gurubk') {
      $detail = $request->detail;
      if ($detail == "detail") {
        $id_kategori = $request->id_kategori;
        $pelanggaran_siswa = PelanggaranSiswa::findOrFail($id);
        $kategori = Kategori::findOrFail($id_kategori);
        $isi = (int) $request->isi;
        $kategori->isi = $kategori->isi + $isi;
        $kategori->save();
        $pelanggaran_siswa->save();
        session()->flash('pesan', 'Berhasil Diubah');
        return redirect('/pelanggaran-siswa');
      }

      $id_kategori = $request->id_kategori;
      $pelanggaran_siswa = PelanggaranSiswa::findOrFail($id);
      $kategori = Kategori::findOrFail($id_kategori);
      $pelanggaran_siswa->nis = $request->nis;
      $pelanggaran_siswa->kategori_id = $request->kategori_id;
      $pelanggaran_siswa->keterangan = $request->keterangan;
      $pelanggaran_siswa->save();

      session()->flash('pesan', 'Data Berhasil Diubah');
      return redirect('/pelanggaran-siswa');
    } else {
      return abort('404');
    }
  }

  public function destroy($id, Request $request)
  {
    $id_kategori = $request->id_kategori;
    $pelanggaran_siswa = PelanggaranSiswa::findOrFail($id);
    $kategori = Kategori::findOrFail($id_kategori);
    $pelanggaran_siswa->delete($id);

    session()->flash('pesan', 'Data berhasil dihapus');
    return redirect()->back();
  }
}
