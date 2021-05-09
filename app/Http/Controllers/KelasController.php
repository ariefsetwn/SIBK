<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Requests\KelasRequest;

class KelasController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $kelas = Kelas::OrderBy('id', 'asc')->get();
    return view('admin.kelas.index', compact('kelas'));
  }

  public function create()
  {
    $kelas = Kelas::all();
    return view('admin.kelas.create', compact('kelas'));
  }

  public function store(KelasRequest $request)
  {
    Kelas::create([
      'nama' => $request->nama
    ]);

    session()->flash('pesan', 'Data Berhasil Ditambah');
    return redirect('/kelas');
  }

  public function edit($id)
  {
    $kelas = Kelas::findOrFail($id);
    return view('admin.kelas.edit', compact('kelas'));
  }

  public function update($id, KelasRequest $request)
  {
    $kelas = Kelas::findOrFail($id);
    $kelas->nama = $request->nama;
    $kelas->save();

    session()->flash('pesan', 'Data Berhasil Diubah');
    return redirect('/kelas');
  }

  public function destroy($id)
  {
    $kelas = Kelas::findOrFail($id);
    $kelas->delete($id);

    session()->flash('pesan', 'Data Berhasil Dihapus');
    return redirect()->back();
  }
}
