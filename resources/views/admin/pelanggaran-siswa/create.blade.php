@extends('layouts.master')

@section('title', 'Tambah Pelanggaran')
<!-- ########## Pelanggaran Create  ########## -->
@section('content')

@if (!empty(session('pesan')))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong>{{session('pesan')}}</strong>
</div>
@endif
<div class="col-11 mx-auto">
<!-- Form -->
<form action="/pelanggaran-siswa/store" method="POST">
  @CSRF
<!-- Siswa -->
<div class="form-group row">
  <label for="nis" class="col-sm-2 col-form-label">NIS</label>
  <div class="col-sm-10">
    <input type="text" id="nis" name="nis" value="{{old('nis')}}" class="form-control @error('nis') is-invalid @enderror">
    @error('nis')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>

{{-- <div class="form-group row">
  <label for="nis" class="col-sm-2 col-form-label">Siswa</label>
  <div class="col-sm-10">
  <select id="nis" name="nis" class="form-control @error('nis') is-invalid @enderror">
    <option value="">Pilih</option>
    @foreach ($siswa as $i)
      @if ($i->nis)
        <option value="{{$i->nis}}"> {{$i->nis}} | {{$i->nama}} </option>
      @endif
    @endforeach
  </select>
  @error('nis')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div> --}}
<!-- kategori -->
<div class="form-group row">
  <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
  <div class="col-sm-10">
  <select id="kategori_id" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
    <option value="">Pilih</option>
    @foreach ($kategori as $i)
      @if ($i->nama)
        <option value="{{$i->id}}"> {{$i->poin}} | {{$i->nama}} </option>
      @endif
    @endforeach
  </select>
  @error('kategori_id')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Keterangan -->
<div class="form-group row">
  <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
  <div class="col-sm-10">
  <textarea id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" cols="20" rows="2">{{old('keterangan')}}</textarea>
  @error('keterangan')
    <div class="invalid-feedback"> {{$message}} </div>
  @enderror
  </div>
</div>
<!-- Button -->
<div class="form-group row">
  <div class="col-sm-2 col-form-label"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/pelanggaran-siswa" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>
@endsection