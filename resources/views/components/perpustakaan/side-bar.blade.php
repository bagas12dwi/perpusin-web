        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #1F1F1F;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i>
                        <img src="/asssets/img/logo-admin.png" alt="" height="40" />

                    </i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Perpustakaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage data
            </div>

            <li class="nav-item {{ $title == 'Buku' ? 'active' : '' }}">
                <a class="nav-link" href="/product-admin">
                    <i class="bi bi-book-fill icon-nav"></i>
                    <span>Buku</span></a>
            </li>
            <li class="nav-item {{ $title == 'Pengembalian' ? 'active' : '' }}">
                <a class="nav-link" href="/user">
                    <i class="bi bi-arrow-return-right"></i>
                    <span>Pengembalian</span></a>
            </li>
            <li class="nav-item {{ $title == 'Rekap Transaksi' ? 'active' : '' }}">
                <a class="nav-link" href="/transaksi">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Riwayat Peminjaman</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
