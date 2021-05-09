<li class="nav-item {{ Request::segment(1) == $name ? 'active' : ''}}">
  <a class="nav-link text-white" href="/@if(auth()->user()->role->nama == 'Siswa')siswa/@elseif(auth()->user()->role->nama == 'Gurubk')guru-bk/@endif{{$name}}">
    <i class="fas fa-fw fa-table"></i>
    <span>{{ucwords(str_replace("-"," ",$name))}}</span>
  </a>
</li>