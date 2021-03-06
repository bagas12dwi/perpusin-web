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
                <a class="nav-link" href="/dashboard-perpustakaan">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage data
            </div>

            <li class="nav-item {{ $title == 'Buku' ? 'active' : '' }}">
                <a class="nav-link" href="/manage-buku">
                    <i class="bi bi-book-fill icon-nav"></i>
                    <span>Buku</span></a>
            </li>
            <li class="nav-item {{ $title == 'Konfirmasi Peminjaman' ? 'active' : '' }}">
                <a class="nav-link" href="/konfirmasi-pinjam">
                    <i class="bi bi-check-circle-fill icon-nav"></i>
                    <span>Konfirmasi Peminjaman</span></a>
            </li>
            <li class="nav-item {{ $title == 'Pengembalian' ? 'active' : '' }}">
                <a class="nav-link" href="/pengembalian">
                    <i class="bi bi-arrow-return-right"></i>
                    <span>Pengembalian</span></a>
            </li>
            <li class="nav-item {{ $title == 'Riwayat Peminjaman' ? 'active' : '' }}">
                <a class="nav-link" href="/riwayat-peminjaman">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Riwayat Peminjaman</span></a>
            </li>

            <li class="nav-item {{ $title == 'Riwayat Denda' ? 'active' : '' }}">
                <a class="nav-link" href="/riwayat-denda">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Riwayat Denda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
