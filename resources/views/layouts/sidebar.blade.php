
<section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU UTAMA</li>
    
    @if (Auth::user()->hasRole('superadmin'))
        
    <li class="{{ (request()->is('superadmin')) ? 'active' : '' }}"><a href="/superadmin"><i class="fa fa-home"></i> <span><i>Beranda</i></span></a></li>
    
    <li class="header">DATA MASTER</li>
    
    
    <li class="{{ (request()->is('superadmin/user*')) ? 'active' : '' }}"><a href="/superadmin/user"><i class="fa fa-check"></i> <span><i>Data User</i></span></a></li>
    <li class="{{ (request()->is('superadmin/bibit*')) ? 'active' : '' }}"><a href="/superadmin/bibit"><i class="fa fa-check"></i> <span><i>Data Bibit</i></span></a></li>
    <li class="{{ (request()->is('superadmin/stok-bibit*')) ? 'active' : '' }}"><a href="/superadmin/stok-bibit"><i class="fa fa-check"></i> <span><i>Data Stok</i></span></a></li>

    <li class="header">DATA TINDAKAN</li>
    <li class="{{ (request()->is('superadmin/pengajuan*')) ? 'active' : '' }}"><a href="/superadmin/pengajuan"><i class="fa fa-check"></i> <span><i>Pengajuan Bibit</i></span></a></li>
    <li class="{{ (request()->is('superadmin/validasi*')) ? 'active' : '' }}"><a href="/superadmin/validasi"><i class="fa fa-check"></i> <span><i>Validasi Bibit</i></span></a></li>
    <li class="{{ (request()->is('superadmin/serahterima*')) ? 'active' : '' }}"><a href="/superadmin/serahterima"><i class="fa fa-check"></i> <span><i>Serah Terima Bibit</i></span></a></li>
    
    <li class="header">DATA LAPORAN</li>
    <li class="{{ (request()->is('superadmin/laporan*')) ? 'active' : '' }}"><a href="/superadmin/laporan"><i class="fa fa-check"></i> <span><i>Laporan</i></span></a></li>
    <li class="header">SETTING</li>
    <li class="{{ (request()->is('superadmin/gp*')) ? 'active' : '' }}"><a href="/superadmin/gp"><i class="fa fa-key"></i> <span><i>Ganti Pass</i></span></a></li>
    <li><a href="/logout"><i class="fa fa-sign-out"></i> <span><i>Logout</i></span></a></li>
    @else
        
    <li class="{{ (request()->is('pemohon')) ? 'active' : '' }}"><a href="/pemohon"><i class="fa fa-home"></i> <span><i>Dashboard</i></span></a></li>
    <li class="{{ (request()->is('pemohon/pengajuan*')) ? 'active' : '' }}"><a href="/pemohon/pengajuan"><i class="fa fa-check"></i> <span><i>Pengajuan Bibit</i></span></a></li>
    <li class="{{ (request()->is('pemohon/serahterima*')) ? 'active' : '' }}"><a href="/pemohon/serahterima"><i class="fa fa-check"></i> <span><i>Serah Terima Bibit</i></span></a></li>
    <li class="{{ (request()->is('pemohon/gp*')) ? 'active' : '' }}"><a href="/pemohon/gp"><i class="fa fa-key"></i> <span><i>Ganti Pass</i></span></a></li>
    <li><a href="/logout"><i class="fa fa-sign-out"></i> <span><i>Logout</i></span></a></li>
    {{-- <li class="{{ (request()->is('pemohon/daftar-layanan*')) ? 'active' : '' }}"><a href="/pemohon/daftar-layanan"><i class="fa fa-list"></i> <span>Daftar Layanan</span></a></li> --}}
    @endif
    </ul>
    <!-- /.sidebar-menu -->
</section>