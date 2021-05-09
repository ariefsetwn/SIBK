<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\PelanggaranSiswa;
use App\Models\Gurubk;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $kategori = Kategori::orderBy('nama', 'asc')->get();
    $user = auth()->user();
    $role = $user->role->nama;

    if ($role == "Admin" || $role == 'Gurubk') {
      $kategori = Kategori::orderBy('nama', 'asc')->get();
      return view('admin.kategori.index', compact('kategori'));
    }
  }

  public function create()
  {
    return view('admin.kategori.create');
  }

  public function store(KategoriRequest $request)
  {
    Kategori::create([
      'nama' => $request->nama,
      'poin' => $request->poin
    ]);

    session()->flash('pesan', 'Data Berhasil Ditambah');
    return redirect('/kategori');
  }

  public function edit($id)
  {
    $kategori = Kategori::findOrFail($id);
    return view('admin.kategori.edit', compact('kategori'));
  }

  public function update($id, KategoriRequest $request)
  {
    $kategori = Kategori::findOrFail($id);
    $kategori->nama = $request->nama;
    $kategori->poin = $request->poin;
    $kategori->save();

    session()->flash('pesan', 'Data Berhasil Diubah');
    return redirect('/kategori');
  }

  public function destroy($id)
  {
    $kategori = Kategori::findOrFail($id);
    $kategori->delete($id);

    session()->flash('pesan', 'Data Berhasil Dihapus');
    return redirect()->back();
  }
}
