<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('pengguna.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Pengguna</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kelas.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Kelas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('siswa.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('guru.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Guru</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pelajaran.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Mata Pelajaran</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ujian.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Manajemen Ujian</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Logout</span></a>
    </li>

</ul>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik logout, kalau serius mau keluar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>
