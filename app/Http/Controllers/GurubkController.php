<?php

namespace App\Http\Controllers;

use App\Http\Requests\GurubkRequest;
use App\Http\Requests\GurubkEditRequest;
use App\Models\Gurubk;

class GurubkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $guru_bk = Gurubk::all();
        return view('admin.guru-bk.index', compact('guru_bk'));
    }
    public function show($nip = null)
    {
        $user = auth()->user();
        $role = $user->role->nama;

        if ($role == "Admin") {
            $guru_bk = Gurubk::findOrfail($nip);
            return view('admin.guru-bk.detail', compact('guru_bk'));
        } else if ($role == "Gurubk") {
            $nip = $user->guru_bk->nip;
            $guru_bk = Gurubk::where('nip', $nip)->get();
            return view('guru-bk.profile', compact('guru_bk'));
        } else {
            return abort('404');
        }
    }
    public function create()
    {
        return view('admin.guru-bk.create');
    }

    public function store(GurubkRequest $request)
    {
        $nip = $request->nip;
        $foto = $request->file('foto');
        $extension = $foto->extension();
        $nama_foto = "";

        if (!empty($foto)) {
            $nama_foto = time() . "_" . $nip . "." . $extension;
            $nama_folder = 'img';
            $foto->move($nama_folder, $nama_foto);
        }

        Gurubk::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'foto' => $nama_foto
        ]);

        session()->flash('pesan', 'Data Berhasil Ditambah');
        return redirect('/guru-bk');
    }

    public function edit($id = '')
    {
        $user = auth()->user();
        $role = $user->role->nama;

        if ($role == 'Admin') {
            $guru_bk = Gurubk::findOrFail($id);
            return view('admin.guru-bk.edit', compact('guru_bk'));
        } else if ($role == 'Gurubk') {
            $id = $user->guru_bk->nip;
            $guru_bk = Gurubk::where('nip', $id)->get();
            return view('guru-bk.ubah_profile', compact('guru_bk'));
        } else {
            return abort('404');
        }
    }

    public function update($id = '', GurubkEditRequest $request)
    {

        $user = auth()->user();
        $role = $user->role->nama;
        if ($role == 'Admin') {
            $guru_bk = Gurubk::findOrFail($id);

            if (!empty($request->file('foto'))) {
                $nip = $request->nip;
                $foto = $request->file('foto');
                $extension = $foto->extension();
                $nama_foto = time() . "_" . $nip . "." . $extension;
                $nama_folder = 'img';
                $foto->move($nama_folder, $nama_foto);
                $guru_bk->foto = $nama_foto;
            }

            $guru_bk->nama = $request->nama;
            $guru_bk->jenis_kelamin = $request->jenis_kelamin;
            $guru_bk->agama = $request->agama;
            $guru_bk->tempat_lahir = $request->tempat_lahir;
            $guru_bk->tanggal_lahir = $request->tanggal_lahir;
            $guru_bk->alamat = $request->alamat;
            $guru_bk->telepon = $request->telepon;
            $guru_bk->email = $request->email;
            $guru_bk->save();

            session()->flash('pesan', 'Data Berhasil Diubah');
            return redirect('/guru-bk');
        } else if ($role == "Gurubk") {
            $id = $user->guru_bk->nip;
            $guru_bk = Gurubk::where('nip', $id)->first();

            if (!empty($request->file('foto'))) {
                $nip = $request->nip;
                $foto = $request->file('foto');
                $nama_foto = time() . "_" . $nip;
                $nama_folder = 'img';
                $foto->move($nama_folder, $nama_foto);
                $guru_bk->foto = $nama_foto;
            }

            $guru_bk->nama = $request->nama;
            $guru_bk->jenis_kelamin = $request->jenis_kelamin;
            $guru_bk->agama = $request->agama;
            $guru_bk->tempat_lahir = $request->tempat_lahir;
            $guru_bk->tanggal_lahir = $request->tanggal_lahir;
            $guru_bk->alamat = $request->alamat;
            $guru_bk->telepon = $request->telepon;
            $guru_bk->email = $request->email;
            $guru_bk->save();

            session()->flash('pesan', 'Data Berhasil Diubah');
            return redirect('/guru-bk/profile');
        } else {
            return abort('404');
        }
    }

    public function destroy($id)
    {
        $guru_bk = Gurubk::findOrFail($id);
        $guru_bk->delete($id);

        session()->flash('pesan', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
