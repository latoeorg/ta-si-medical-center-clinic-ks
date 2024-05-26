<aside class="main-sidebar sidebar-light-success border-right">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ url('/logo.png') }}" alt="Logo" class="brand-image" />
        <span class="brand-text text-poppins fw-medium">
            Jira Medical Center
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/obat" class="nav-link {{ Request::is('obat') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>Obat</p>
                    </a>
                </li>
                <li class="nav-header font-weight-bold">Rekam Medis</li>
                <li class="nav-item">
                    <a href="/rekam-medis" class="nav-link {{ Request::is('rekam-medis') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>Pemeriksaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pasien" class="nav-link {{ Request::is('pasien') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/riwayat-rekam-medis"
                        class="nav-link {{ Request::is('riwayat-rekam-medis') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Riwayat Pemeriksaan</p>
                    </a>
                </li>
                <li class="nav-header font-weight-bold">Setup</li>
                <li class="nav-item">
                    <a href="/kategori-obat" class="nav-link {{ Request::is('kategori-obat') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>Kategori Obat</p>
                    </a>
                </li>
                @if (request()->session()->get('user')['role'] === 'KEPALA_KLINIK')
                    <li class="nav-item">
                        <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Staff</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
