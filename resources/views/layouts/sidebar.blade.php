 <div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="">SIPELDA</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="">Dinda</a>
     </div>
     <ul class="sidebar-menu">
       <li class="menu-header">Dashboard</li>
       <li class="{{ Route::is('home') ? 'active' : ''  }}"><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
       @if(Auth::user()->id_role == 2)
       <li class="menu-header">Menu</li>
       <li class="{{ Route::is('permintaan.index') || Route::is('terkirim.detail')  ? 'active' : ''  }}"><a class="nav-link" href="{{route('permintaan.index')}}"><i class="fas fa-file"></i> <span>Data</span></a></li>
       <li class="{{ Route::is('feedback.create') ? 'active' : ''  }}"><a class="nav-link" href="{{route('feedback.create')}}"><i class="fas fa-comments"></i><span>Feed Back</span></a></li>
       @endif
       @if(Auth::user()->id_role == 1)
       <li class="menu-header">Data</li>
       <li class="dropdown {{ Route::is('data.masuk') || Route::is('data.detail') || Route::is('data.diterima') || Route::is('data.proses') || Route::is('detail.proses') || Route::is('data.disetujui') || Route::is('data.terkirim') || Route::is('terkirim.detail')  ? 'active' : '' }}">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder-open"></i><span>Kelola Data</span></a>
         <ul class="dropdown-menu">
           <li class="{{ Route::is('data.masuk') || Route::is('data.detail') ? 'active' : '' }}"><a class="nav-link" href="{{route('data.masuk')}}">Data Masuk</a></li>
           <li class="{{ Route::is('data.proses') || Route::is('detail.proses') ? 'active' : '' }}"><a class="nav-link" href="{{route('data.proses')}}">Data Diproses</a></li>
           <li class="{{ Route::is('data.terkirim') || Route::is('terkirim.detail')  ? 'active' : '' }}"><a class="nav-link" href="{{route('data.terkirim')}}">Data Terkirim</a></li>
         </ul>
       </li>
       <li class="{{ Route::is('sektoral.index') ? 'active' : ''  }}"><a class="nav-link" href="{{route('sektoral.index')}}"><i class="fas fa-book"></i> <span>Sektoral</span></a></li>
       <li class="{{ Route::is('feedback.index') ? 'active' : ''  }}"><a class="nav-link" href="{{route('feedback.index')}}"><i class="fas fa-comments"></i><span>All Feedback</span></a></li>
       <li class="menu-header">Rekap Data</li>
       <li class="{{ Route::is('rekap.index') ? 'active' : ''  }}"><a class="nav-link" href="{{route('rekap.index')}}"><i class="fas fa-book-open"></i><span>All data permohonan</span></a></li>
       <li class="menu-header">User Management</li>
       <li class="dropdown {{ Route::is('admin.index') || Route::is('member.index')  ? 'active' : ''  }}">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>User</span></a>
         <ul class="dropdown-menu">
           <li class="{{ Route::is('admin.index') ? 'active' : ''  }}"><a class="nav-link" href="{{route('admin.index')}}">Data Admin</a></li>
           <li class="{{ Route::is('member.index') ? 'active' : ''  }}"><a class=" nav-link" href="{{route('member.index')}}">Data Member</a></li>
         </ul>
       </li>
       @endif
       <li class="menu-header">Aplikasi</li>
       <li class="{{ Route::is('about.index') ? 'active' : ''  }}"><a class=" nav-link" href="{{route('about.index')}}"><i class="fas fa-question-circle"></i><span>About Us</span></a></li>
   </aside>
 </div>