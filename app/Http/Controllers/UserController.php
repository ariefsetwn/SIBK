<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $user = User::all();
    return view('admin.user.index', compact('user'));
  }

  public function create()
  {
    $role = Role::orderBy('nama', 'desc')->get();
    return view('admin.user.create', compact('role'));
  }

  public function store(UserRequest $request)
  {
    User::create([
      'username' => $request->username,
      'password' => Hash::make($request['password']),
      'is_active' => $request->is_active,
      'role_id' => $request->role_id
    ]);

    session()->flash('pesan', 'Data Berhasil Ditambah');
    return redirect('/user');
  }

  public function edit($id = null)
  {
    $user = auth()->user();
    $role = $user->role->nama;

    if (($role == 'Admin' && Request::segment(1) == 'ubah-password')) {
      return view('admin.setting.ubah_password');
    } else if ($role == 'Admin') {
      $user = User::findOrFail($id);
      //$role = Role::all();
      $role = Role::orderBy('nama', 'desc')->get();
      return view('admin.user.edit', compact('user', 'role'));
    } else if ($role == 'Siswa') {
      return view('siswa.ubah_password');
    } else if ($role == 'Gurubk') {
      return view('guru-bk.ubah_password');
    } else {
      return abort('404');
    }
  }

  public function update($id = null, UserRequest $request)
  {
    $role = auth()->user()->role->nama;
    $idUser = auth()->user()->id;
    $user = User::where('id', $idUser)->first();

    if (($role == 'Admin' && Request::segment(1) == 'ubah-password') || $role == 'Gurubk' || $role == 'Siswa') {
      if ($user) {
        if (Hash::check($request['old_password'], $user->password)) {
          $user->password = Hash::make($request['password']);
          $user->save();
          session()->flash('pesan', 'Password berhasil diubah');
          return redirect()->back();
        } else {
          session()->flash('error', 'Password lama salah!');
          return redirect()->back();
        }
      }
    } elseif ($role == 'Admin') {
      $admin = User::findOrFail($id);
      if (!empty($request->password)) {
        $admin->password = Hash::make($request['password']);
      }

      $admin->username = $request->username;
      $admin->is_active = $request->is_active;
      $admin->role_id = $request->role_id;
      $admin->save();

      session()->flash('pesan', 'Data Berhasil Diubah');
      return redirect('/user');
    }
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete($id);

    session()->flash('pesan', 'Data Berhasil Dihapus');
    return redirect()->back();
  }
}
