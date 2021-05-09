@extends('layouts.master')

@section('title', 'User')
<!-- ########## User Index  ########## -->
@section('content')

<!-- Button Tambah -->
<a href="/user/create" class="btn btn-primary">Tambah User</a>
<div class="table-responsive mt-3">
<!-- Session Alert Success  -->
@if (!empty(session('pesan')))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{session('pesan')}}</strong>
</div>
@endif
<!-- Data Table -->
<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Role</th>
      <th>Bergabung Pada</th>
      <th>Status</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($user as $u)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $u->username }}</td>
      <td>{{ $u->role->nama }}</td>
      <td>{{ date("d-m-Y", strtotime($u->created_at))}}</td>
      <td>{{ $u->is_active}}</td>
      <td>
        <a href="/user/{{$u->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
        <form action="/user/{{$u->id}}/destroy" method="post" class="d-inline">
          @csrf
          @method('DELETE')
          <input type="submit" value="Hapus" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection