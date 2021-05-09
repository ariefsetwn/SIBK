<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('auth.login');
});

// Route Group Admin Middleware
Route::group(['middleware' => ['role:Admin']], function () {
  //Route::resource('user', 'UserController');
  Route::get('/user', 'UserController@index');
  Route::get('/user/create', 'UserController@create');
  Route::post('/user/store', 'UserController@store');
  Route::get('/user/{id}/edit', 'UserController@edit');
  Route::put('/user/{id}/update', 'UserController@update');
  Route::delete('/user/{id}/destroy', 'UserController@destroy');
});

// Route Group Siswa Middleware
Route::group(['middleware' => ['role:Siswa']], function () {
  //Route Siswa -> Profile
  Route::get('/siswa/profile', 'SiswaController@show');
  Route::get('/siswa/profile/ubah', 'SiswaController@edit');
  Route::put('/siswa/profile/simpan', 'SiswaController@update');
  //Route Siswa -> PelanggaranSiswa
  Route::get('/siswa/pelanggaran-siswa', 'PelanggaranSiswaController@index');
  Route::get('/siswa/pelanggaran-siswa/{id}/detail', 'PelanggaranSiswaController@show');
  Route::post('/siswa/pelanggaran-siswa/store', 'PelanggaranSiswaController@store');
  Route::get('/siswa/pelanggaran-siswa/ubah', 'PelanggaranSiswaController@edit');
  Route::put('/siswa/pelanggaran-siswa/simpan', 'PelanggaranSiswaController@update');
  //Route Siswa -> Setting / Ubah Password
  Route::get('/siswa/ubah-password', 'UserController@edit');
  Route::put('/siswa/ubah-password/simpan', 'UserController@update');
});
// Route Group Admin & Gurubk Middleware
Route::group(['middleware' => ['role:Admin,Gurubk']], function () {
  // Route Admin -> Siswa
  Route::get('/siswa', 'SiswaController@index');
  Route::get('/siswa/{id}/detail', 'SiswaController@show');
  Route::get('/siswa/create', 'SiswaController@create');
  Route::post('/siswa/store', 'SiswaController@store');
  Route::get('/siswa/{id}/edit', 'SiswaController@edit');
  Route::put('/siswa/{id}/update', 'SiswaController@update');
  Route::delete('/siswa/{id}/destroy', 'SiswaController@destroy');
  Route::get('/siswa/{thn?}', 'SiswaController@index');
  Route::get('/siswa/{kls?}', 'SiswaController@index');
  // Route::get('/siswa/tahun/{thn?}/kelas/{kls?}', 'SiswaController@index');
  // // Route Admin -> Kategori
  Route::get('/kategori', 'KategoriController@index');
  Route::get('/kategori/{id}/detail', 'KategoriController@show');
  Route::get('/kategori/create', 'KategoriController@create');
  Route::post('/kategori/store', 'KategoriController@store');
  Route::get('/kategori/{id}/edit', 'KategoriController@edit');
  Route::put('/kategori/{id}/update', 'KategoriController@update');
  Route::delete('/kategori/{id}/destroy', 'KategoriController@destroy');
  // Route Admin -> Laporan
  Route::get('/laporan', 'LaporanController@index');
  Route::get('/laporan/{id}/lihat', 'LaporanController@pelanggaran_siswa');
  Route::get('/laporan/siswa', 'LaporanController@siswa');
  Route::get('/laporan/{id}/print', 'LaporanController@siswa_print');
  Route::get('/laporan/cetak_pdf', 'LaporanController@data_print');
  Route::get('/laporan/{kls?}/{thn?}', 'LaporanController@index');
  // Route Admin -> Kelas
  Route::get('/kelas', 'KelasController@index');
  Route::get('/kelas/create', 'KelasController@create');
  Route::post('/kelas/store', 'KelasController@store');
  Route::get('/kelas/{id}/edit', 'KelasController@edit');
  Route::put('/kelas/{id}/update', 'KelasController@update');
  Route::delete('/kelas/{id}/destroy', 'KelasController@destroy');
  // Route Admin -> Tahun Ajaran
  Route::get('/tahun-ajaran', 'TahunAjaranController@index');
  Route::get('/tahun-ajaran/create', 'TahunAjaranController@create');
  Route::post('/tahun-ajaran/store', 'TahunAjaranController@store');
  Route::get('/tahun-ajaran/{id}/edit', 'TahunAjaranController@edit');
  Route::put('/tahun-ajaran/{id}/update', 'TahunAjaranController@update');
  Route::delete('/tahun-ajaran/{id}/destroy', 'TahunAjaranController@destroy');
  // Route Admin -> Pelanggaran Siswa
  Route::get('/pelanggaran-siswa', 'PelanggaranSiswaController@index');
  Route::get('/pelanggaran-siswa/{id}/detail', 'PelanggaranSiswaController@show');
  Route::get('/pelanggaran-siswa/create', 'PelanggaranSiswaController@create');
  Route::post('/pelanggaran-siswa/store', 'PelanggaranSiswaController@store');
  Route::get('/pelanggaran-siswa/{id}/edit', 'PelanggaranSiswaController@edit');
  Route::put('/pelanggaran-siswa/{id}/update', 'PelanggaranSiswaController@update');
  Route::delete('/pelanggaran-siswa/{id}/destroy', 'PelanggaranSiswaController@destroy');
  Route::get('/pelanggaran-siswa/{kls?}/{thn?}', 'PelanggaranSiswaController@index');
  // Route Admin -> Gurubk
  Route::get('/guru-bk', 'GurubkController@index');
  Route::get('/guru-bk/{id}/detail', 'GurubkController@show');
  Route::get('/guru-bk/create', 'GurubkController@create');
  Route::post('/guru-bk/store', 'GurubkController@store');
  Route::get('/guru-bk/{id}/edit', 'GurubkController@edit');
  Route::put('/guru-bk/{id}/update', 'GurubkController@update');
  Route::delete('/guru-bk/{id}/destroy', 'GurubkController@destroy');


  // Route Admin -> Ubah Password
  Route::get('/ubah-password', 'UserController@edit');
  Route::put('/ubah-password/update', 'UserController@update');
});

Route::group(['middleware' => ['role:Gurubk']], function () {
  //Route Guru bk -> Profile
  Route::get('/guru-bk/profile', 'GurubkController@show');
  Route::get('/guru-bk/profile/ubah', 'GurubkController@edit');
  Route::put('/guru-bk/profile/simpan', 'GurubkController@update');
  // Route Guru bk -> Setting / Ubah Password
  Route::get('/guru-bk/ubah-password', 'UserController@edit');
  Route::put('/guru-bk/ubah-password/simpan', 'UserController@update');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
