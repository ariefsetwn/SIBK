<!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        
            @if(auth()->user()->role->nama == 'Admin')
              <!-- Nama Admin -->
              Admin
            </span>
              <!-- Foto Admin -->
              <i class="fas fa-fw fa-user-tie fa-2x"></i>
            @endif

            @if(auth()->user()->role->nama == 'Gurubk')
              <!-- Nama guru bk -->
              {{ Auth::user()->guru_bk->nama }}
            </span>
              <!-- Foto guru bk -->
              <img class="img-profile rounded-circle" src="
              @if(empty(Auth::user()->guru_bk->foto))
                /img/default.jpeg
              @else
                {{"/img/" . Auth::user()->guru_bk->foto}}
              @endif
              ">
            @endif

            @if(auth()->user()->role->nama == 'Siswa')
              <!-- Nama Siswa -->
              {{ Auth::user()->siswa->nama }}
            </span>
              <!-- Foto Siswa -->
              <img class="img-profile rounded-circle" src="
              @if(empty(Auth::user()->siswa->foto))
                /img/default.jpeg
              @else
                {{"/img/" . Auth::user()->siswa->foto}}
              @endif
              ">
            @endif
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <!-- Tampilkan Jika Role adalah Siswa -->
              @if(Auth::user()->role->nama == 'Admin'
              //  || Auth::user()->role->nama == 'Gurubk'
               )
              <a class="dropdown-item" href="/ubah-password">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Ubah Password
              </a>
              <!-- Tampilkan Jika Role adalah Siswa -->
              @elseif(Auth::user()->role->nama == 'Siswa')
              {{-- <a class="dropdown-item" href="/siswa/profile">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a> --}}
              {{-- <div class="dropdown-divider"></div> --}}
              <a class="dropdown-item" href="/siswa/ubah-password">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Ubah Password
              </a>
              <!-- Tampilkan Jika Role adalah Gurubk -->
              @elseif(Auth::user()->role->nama == 'Gurubk')
              <a class="dropdown-item" href="/guru-bk/profile">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/guru-bk/ubah-password">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Ubah Password
              </a>
              @endif
            <div class="dropdown-divider"></div>
            <!-- Dropdown - Logout -->
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
            
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
<div class="container-fluid">
  <div class="col">
  <!-- Page Heading -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary text-center">@yield('title')</h3>
    </div>
    <div class="card-body">