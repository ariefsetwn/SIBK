<body id="page-top">
  <!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
      <div class="sidebar-brand-icon">
        <img src="/assets/img/logo.png"  width="50px">
      </div>
      <div class=" sidebar-brand-text mx-1">SIBK</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-1">

    <!-- ####### Admin dan Guru bk####### -->
  @if(auth()->user()->role->nama == 'Admin' || auth()->user()->role->nama == 'Gurubk')
  <!-- Admin Dashboard -->
  <li class="nav-item {{ Request::segment(1) == 'home' ? 'active' : '' }}">
      <a class="nav-link text-white" href="/home">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    @if(auth()->user()->role->nama == 'Admin')
    <!-- Admin user -->
    <li class="nav-item {{ Request::segment(1) == 'user' ? 'active' : '' }}">
      <a class="nav-link text-white" href="/user">
        <i class="fas fa-fw fa-users"></i>
        <span>User</span>
      </a>
    </li>
    @endif
    
    <!-- Admin Siswa -->
      <li class="nav-item {{ Request::segment(1) == 'siswa' ? 'active' : '' }}">
        <a class="nav-link text-white" href="/siswa">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Siswa</span>
        </a>
      </li>
      
      @if(auth()->user()->role->nama == 'Admin')
      <!-- Admin guru bk -->
      <li class="nav-item {{ Request::segment(1) == 'guru-bk' ? 'active' : '' }}">
        <a class="nav-link text-white" href="/guru-bk">
          <i class="fas fa-fw fa-chalkboard-teacher"></i>
          <span>Guru BK</span>
        </a>
      </li>
      @endif
      
      <!-- Admin Pelanggaran Siswa -->
      <li class="nav-item {{ Request::segment(1) == 'pelanggaran-siswa' ? 'active' : '' }}">
        <a class="nav-link text-white" href="/pelanggaran-siswa">
        <i class="fas fa-fw fa-clipboard"></i>
        <span>Pelanggaran Siswa</span>
      </a>
    </li>
    
    @if(auth()->user()->role->nama == 'Admin')
    <!-- Admin Kategori-->
    <li class="nav-item {{ Request::segment(1) == 'kategori' ? 'active' : '' }}">
      <a class="nav-link text-white" href="/kategori">
        <i class="fas fa-fw fa-list"></i>
        <span>Kategori</span>
      </a>
    </li>
    @endif

    <!-- Admin laporan -->
    <li class="nav-item {{ Request::segment(1) == 'laporan' ? 'active' : '' }}">
      <a class="nav-link text-white" href="/laporan">
        <i class="fas fa-fw fa-print"></i>
        <span>Laporan</span>
      </a>
    </li>

    @if(auth()->user()->role->nama == 'Admin')
      <!-- Admin Kelas -->
      <li class="nav-item {{ Request::segment(1) == 'kelas' ? 'active' : '' }}">
        <a class="nav-link text-white" href="/kelas">
          <i class="fas fa-fw fa-clone"></i>
          <span>Kelas</span>
        </a>
      </li>
      
      <!-- Admin tahun ajaran -->
      <li class="nav-item {{ Request::segment(1) == 'tahun-ajaran' ? 'active' : '' }}">
        <a class="nav-link text-white" href="/tahun-ajaran">
          <i class="fas fa-fw fa-align-left"></i>
          <span>Tahun Ajaran</span>
        </a>
      </li>

      
      @endif
      
      <!-- ####### Siswa ####### -->
      @elseif(auth()->user()->role->nama == 'Siswa')
      
      <!-- Admin Dashboard -->
      <li class="nav-item {{ Request::segment(2) == 'profile' ? 'active' : '' }}">
        <a class="nav-link text-white" href="/siswa/profile">
          <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <!-- Siswa pelanggaran-siswa -->
      <li class="nav-item {{ Request::segment(2) == 'pelanggaran-siswa' ? 'active' : '' }}">
        <a class="nav-link text-white" href="/siswa/pelanggaran-siswa">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Detail Pelanggaran</span>
        </a>
      </li>

  @endif
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->