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
                <li class="nav-header font-weight-bold">Setup</li>
                <li class="nav-item">
                    <a href="/jenis-obat" class="nav-link {{ Request::is('jenis-obat') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>Jenis Obat</p>
                    </a>
                </li>
                @if (request()->session()->get('user')['role'] === 'OWNER')
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
