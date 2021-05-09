@extends('layouts.master')

@section('title', 'Ubah User')
<!-- ########## User Edit  ########## -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/user/{{$user->id}}/update" method="POST">
  @CSRF
  @method('PUT')
<!-- Username -->
<div class="form-group row">
  <label for="username" class="col-sm-2 col-form-label">Username</label>
  <div class="col-sm-10">
    <input type="text" id="username" name="username" value="{{old('username') == '' ? $user->username : old('username')}}" class="form-control @error('username') is-invalid @enderror">
    @error('username')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Password -->
<div class="form-group row">
  <label for="password" class="col-sm-2 col-form-label">Password</label>
  <div class="col-sm-10">
    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
    @error('password')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Is Active / Status -->
<div class="form-group row">
  <label for="is_active" class="col-sm-2 col-form-label">Status</label>
  <div class="col-sm-10">
  <select id="is_active" name="is_active" class="form-control @error('is_active') is-invalid @enderror">
    <option value="aktif" @if(old('is_active') == 'aktif' || $user->username == 'aktif') selected @endif>Aktif</option>
    <option value="non-aktif" @if(old('is_active') == 'non-aktif' || $user->username == 'non-aktif') selected @endif>Tidak Aktif</option>
  </select>
  @error('is_active')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Role -->
<div class="form-group row">
  <label for="role_id" class="col-sm-2 col-form-label">Role</label>
  <div class="col-sm-10">
  <select id="role_id" name="role_id" class="form-control @error('role_id') is-invalid @enderror">
    @foreach ($role as $r)
      <option value="{{$r->id}}" {{old('role_id') == $r->id || $user->username == $r->id ? 'selected' : ''}}> {{$r->nama}} </option>
    @endforeach
  </select>
  @error('role_id')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Button -->
<div class="form-group row">
  <div class="col-sm-2 col-form-label"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/user" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>
@endsection