<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use App\Http\Requests\TahunAjaranRequest;

class TahunAjaranController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $tahun_ajaran = TahunAjaran::orderBy('nama', 'asc')->get();
    return view('admin.tahun-ajaran.index', compact('tahun_ajaran'));
  }

  public function create()
  {
    $tahun_ajaran = TahunAjaran::all();
    return view('admin.tahun-ajaran.create', compact('tahun_ajaran'));
  }

  public function store(TahunAjaranRequest $request)
  {
    TahunAjaran::create([
      'nama' => $request->nama
    ]);

    session()->flash('pesan', 'Data Berhasil Ditambah');
    return redirect('/tahun-ajaran');
  }

  public function edit($id)
  {
    $tahun_ajaran = TahunAjaran::findOrFail($id);
    return view('admin.tahun-ajaran.edit', compact('tahun_ajaran'));
  }

  public function update($id, TahunAjaranRequest $request)
  {
    $tahun_ajaran = TahunAjaran::findOrfail($id);
    $tahun_ajaran->nama = $request->nama;
    $tahun_ajaran->is_active = $request->is_active;
    $tahun_ajaran->save();

    session()->flash('pesan', 'Data Berhasil Diubah');
    return redirect('/tahun-ajaran');
  }

  public function destroy($id)
  {
    $tahun_ajaran = TahunAjaran::findOrFail($id);
    $tahun_ajaran->delete($id);

    session()->flash('pesan', 'Data Berhasil Dihapus');
    return redirect()->back();
  }
}
