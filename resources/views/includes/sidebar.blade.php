<aside class="main-sidebar sidebar-light-navy border-right">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ url('/logo.svg') }}" alt="Logo" class="brand-image" />
        <span class="brand-text text-poppins fw-medium">
            IT INVENTORY
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/item" class="nav-link {{ Request::is('item') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Goods</p>
                    </a>
                </li>
                <li class="nav-header font-weight-bold">Main</li>
                <li class="nav-item">
                    <a href="/purchase-order" class="nav-link {{ Request::is('purchase-order') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>Purchase Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/sales-order" class="nav-link {{ Request::is('sales-order') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Sales Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/invoice" class="nav-link {{ Request::is('invoice') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Invoice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/history" class="nav-link {{ Request::is('history') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>History</p>
                    </a>
                </li>
                {{-- {{ request()->session()->get('user')['name'] }} --}}
                @if (request()->session()->get('user')['role'] === 'SUPERADMIN')
                    <li class="nav-header font-weight-bold">Setup</li>
                    <li class="nav-item">
                        <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
