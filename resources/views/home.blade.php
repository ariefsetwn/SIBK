@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div>
  <div>
    <!-- Content Row -->
    <div class="row">
      
    <!-- Jumlah Siswa -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-1 font-weight-bold text">{{$siswa}}</div>
              <div class="text-xs font-weight-bold text text-uppercase">Siswa</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-user-graduate fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah guru -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-secondary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h5 mb-1 font-weight-bold text">{{$guru_bk}}</div>
                    <div class="text-xs font-weight-bold text text-uppercase">Guru bk</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-chalkboard-teacher fa-2x"></i>
                  </div>
              </div>
          </div>
      </div>
    </div>

    
    
    <!-- pelanggaran siswa -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h5 mb-1 font-weight-bold text">{{$pelanggaran_siswa}}</div>
                    <div class="text-xs font-weight-bold text text-uppercase">Pelanggaran Siswa</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- kelas -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="h5 mb-1 font-weight-bold text">{{$kelas}}</div>
                          <div class="text-xs font-weight-bold text text-uppercase">Kelas</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clone fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
  </div>
  </div>
  


      {{-- @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
      @endif --}}

      {{-- {{ __('You are logged in!') }}
      @foreach ($user as $u)
        {{$u->role->nama}}
      @endforeach --}}
 
@endsection