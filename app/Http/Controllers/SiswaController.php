<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Http\Requests\SiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($thn = null, $kls = null)
  {
    // if (!empty($thn)) {
    //   $tahun_ajaran = TahunAjaran::OrderBy('nama', 'asc')->get();
    //   $siswa = Siswa::where('tahun_ajaran_id', $thn)->get();
    //   return view('admin.siswa.index', compact('siswa', 'tahun_ajaran'));
    // }

    // if (!empty($kls)) {
    //   $kelas = Kelas::OrderBy('id', 'asc')->get();
    //   $siswa = Siswa::where('kelas_id', $kls)->get();
    //   return view('admin.siswa.index', compact('siswa', 'kelas'));
    // }
    $tahun_ajaran = TahunAjaran::OrderBy('nama', 'asc')->get();
    $kelas = Kelas::OrderBy('id', 'asc')->get();

    // if (!empty($thn) && !empty($kls)) {
    //   $siswa = Siswa::where('tahun_ajaran_id', $thn)->where('kelas_id', $kls)->get();
    // } else if (!empty($thn)) {
    if (!empty($thn)) {
      $siswa = Siswa::where('tahun_ajaran_id', $thn)->get();
    } else if (!empty($kls)) {
      $siswa = Siswa::where('kelas_id', $kls)->get();
    } else {
      $siswa = Siswa::OrderBy('nis', 'asc')->get();
    }

    //jika kelas atau tahun ajaran tidak disortir
    return view('admin.siswa.index', compact('siswa', 'kelas', 'tahun_ajaran'));
  }

  public function show($nis = null)
  {
    $user = auth()->user();
    $role = $user->role->nama;

    if ($role == "Admin" || $role == 'Gurubk') {

      $siswa = DB::select('SELECT siswa.*, kelas.nama AS nama_kelas,
             tahun_ajaran.nama AS nama_tahun_ajaran
             FROM siswa
             JOIN kelas ON kelas.id = siswa.kelas_id
             JOIN tahun_ajaran ON tahun_ajaran.id = siswa.tahun_ajaran_id
             WHERE nis = ' . $nis);

      return view('admin.siswa.detail', ['siswa' => $siswa]);
    } else if ($role == "Siswa") {
      $nis = $user->siswa->nis;
      // $siswa = Siswa::where('nis', $id)->get();
      $siswa = DB::select('SELECT siswa.*, kelas.nama AS nama_kelas,
             tahun_ajaran.nama AS nama_tahun_ajaran
             FROM siswa
             JOIN kelas ON kelas.id = siswa.kelas_id
             JOIN tahun_ajaran ON tahun_ajaran.id = siswa.tahun_ajaran_id
             WHERE nis = ' . $nis);

      return view('siswa.profile', ['siswa' => $siswa]);
    } else {
      return abort('404');
    }
  }

  public function create()
  {
    $kelas = Kelas::orderBy('id', 'asc')->get();
    $tahun_ajaran = TahunAjaran::orderBy('nama', 'asc')->get();
    return view('admin.siswa.create', ['kelas' => $kelas, 'tahun_ajaran' => $tahun_ajaran]);
  }

  public function store(SiswaRequest $request)
  {
    $nis = $request->nis;
    $foto = $request->file('foto');
    $extension = $foto->extension();
    $nama_foto = "";

    if (!empty($foto)) {
      $nama_foto = time() . "_" . $nis . "." . $extension;
      $nama_folder = 'img';
      $foto->move($nama_folder, $nama_foto);
    }

    Siswa::create([
      'nis' => $nis,
      'nama' => $request->nama,
      'jenis_kelamin' => $request->jenis_kelamin,
      'agama' => $request->agama,
      'alamat' => $request->alamat,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'telepon' => $request->telepon,
      'email' => $request->email,
      'kelas_id' => $request->kelas_id,
      'tahun_ajaran_id' => $request->tahun_ajaran_id,
      'nama_ortu' => $request->nama_ortu,
      'telepon_ortu' => $request->telepon_ortu,
      'pekerjaan_ortu' => $request->pekerjaan_ortu,
      'alamat_ortu' => $request->alamat_ortu,
      'foto' => $nama_foto
    ]);

    session()->flash('pesan', 'Data Berhasil Ditambah');
    return redirect('/siswa');
  }

  public function edit($id = '')
  {
    $user = auth()->user();
    $role = $user->role->nama;

    // Jika role Admin atau Gurubk
    if ($role == 'Admin' || $role == 'Gurubk') {
      $siswa = Siswa::findOrFail($id);
      $kelas = Kelas::orderBy('id', 'asc')->get();
      $tahun_ajaran = TahunAjaran::orderBy('nama', 'asc')->get();
      return view('admin.siswa.edit', ['siswa' => $siswa, 'kelas' => $kelas, 'tahun_ajaran' => $tahun_ajaran]);
    } // Jika role Siswa
    elseif ($role == 'Siswa') {
      $id = $user->siswa->nis;
      $siswa = Siswa::where('nis', $id)->first();
      $kelas = Kelas::orderBy('nama', 'asc')->get();
      $tahun_ajaran = TahunAjaran::orderBy('nama', 'asc')->get();
      return view('siswa.ubah_profile', ['siswa' => $siswa, 'kelas' => $kelas, 'tahun_ajaran' => $tahun_ajaran]);
    } else {
      return abort('404');
    }
  }

  public function update($id = '', UpdateSiswaRequest $request)
  {
    $user = auth()->user();
    $role = $user->role->nama;
    if ($role == 'Admin' || $role == 'Gurubk') {
      $siswa = Siswa::findOrFail($id);

      if (!empty($request->file('foto'))) {
        $nis = $siswa->nis;
        $foto = $request->file('foto');
        $extension = $foto->extension();
        $nama_foto = time() . "_" . $nis . "." . $extension;
        $nama_folder = 'img';
        $foto->move($nama_folder, $nama_foto);
        $siswa->foto = $nama_foto;
      }

      // $siswa->nis = $request->nis;
      $siswa->nama = $request->nama;
      $siswa->kelas_id = $request->kelas_id;
      $siswa->tahun_ajaran_id = $request->tahun_ajaran_id;
      $siswa->jenis_kelamin = $request->jenis_kelamin;
      $siswa->agama = $request->agama;
      $siswa->tempat_lahir = $request->tempat_lahir;
      $siswa->tanggal_lahir = $request->tanggal_lahir;
      $siswa->alamat = $request->alamat;
      $siswa->telepon = $request->telepon;
      $siswa->email = $request->email;
      $siswa->nama_ortu = $request->nama_ortu;
      $siswa->telepon_ortu = $request->telepon_ortu;
      $siswa->pekerjaan_ortu = $request->pekerjaan_ortu;
      $siswa->alamat_ortu = $request->alamat_ortu;
      $siswa->save();

      session()->flash('pesan', 'Data Berhasil Diubah');
      return redirect('/siswa');
    } else if ($role == "Siswa") {
      $id = $user->siswa->nis;
      $siswa = Siswa::where('nis', $id)->first();

      if (!empty($request->file('foto'))) {
        $nis = $id;
        $foto = $request->file('foto');
        $extension = $foto->extension();
        $nama_foto = time() . "_" . $nis . "." . $extension;
        $nama_folder = 'img';
        $foto->move($nama_folder, $nama_foto);
        $siswa->foto = $nama_foto;
      }

      // $siswa->nis = $request->nis;
      $siswa->nama = $request->nama;
      $siswa->kelas_id = $request->kelas_id;
      $siswa->tahun_ajaran_id = $request->tahun_ajaran_id;
      $siswa->jenis_kelamin = $request->jenis_kelamin;
      $siswa->agama = $request->agama;
      $siswa->tempat_lahir = $request->tempat_lahir;
      $siswa->tanggal_lahir = $request->tanggal_lahir;
      $siswa->alamat = $request->alamat;
      $siswa->telepon = $request->telepon;
      $siswa->email = $request->email;
      $siswa->nama_ortu = $request->nama_ortu;
      $siswa->telepon_ortu = $request->telepon_ortu;
      $siswa->pekerjaan_ortu = $request->pekerjaan_ortu;
      $siswa->alamat_ortu = $request->alamat_ortu;
      $siswa->save();

      session()->flash('pesan', 'Data Berhasil Diubah');
      return redirect('/siswa/profile');
    } else {
      return abort('404');
    }
  }

  public function destroy($id)
  {
    $siswa = Siswa::findOrFail($id);
    $siswa->delete($id);

    session()->flash('pesan', 'Data Berhasil Dihapus');
    return redirect()->back();
  }
}
