    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Buku</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Buku</h6>
                    <a class="collapse-item" href="<?= base_url('admin/buku/bukurusak') ?>">Data Buku Rusak</a>
                    <a class="collapse-item" href="<?= base_url('admin/buku/bukupinjam') ?>">Data Buku Dipinjam</a>
                    <a class="collapse-item" href="<?= base_url('admin/buku/bukuhilang') ?>">Data Buku Hilang</a>
                    <a class="collapse-item" href="<?= base_url('admin/buku/hutangbuku') ?>">Data Hutang Buku</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
        <!-- pengunjung -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengunjung" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-people-arrows"></i>
                <span>Pengunjung</span>
            </a>
            <div id="pengunjung" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengunjung</h6>
                    <a class="collapse-item" href="<?= base_url('admin/pengunjung/data/index/' . date('Y') . '') ?>">Data Pengunjung</a>
                </div>
            </div>
        </li>
        <!-- end pengunjung -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- anggota perpustakaan -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#anggota" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Anggota Perpustakaan</span>
            </a>
            <div id="anggota" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Anggota</h6>
                    <a class="collapse-item" href="<?= base_url('admin/anggota/data') ?>">Anggota</a>
                    <a class="collapse-item" href="<?= base_url('admin/anggota/data/add') ?>">Tambah Anggota</a>
                </div>
            </div>
        </li>
        <!-- end pengunjung -->
        <hr class="sidebar-divider d-none d-md-block">
        <!--ebook -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ebook" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Ebook</span>
            </a>
            <div id="ebook" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Ebook</h6>
                    <a class="collapse-item" href="<?= base_url('admin/buku/ebook') ?>">Data Ebook</a>
                    <a class="collapse-item" href="<?= base_url('admin/buku/ebook/add') ?>">Tambah Data Ebook</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <!--ebook -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="pengaturan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengaturan</h6>
                    <a class="collapse-item" href="<?= base_url('admin/pengaturan/Prodi') ?>">Prodi</a>
                    <a class="collapse-item" href="<?= base_url('admin/pengaturan/kategori') ?>">Kategori Buku</a>
                </div>
            </div>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->