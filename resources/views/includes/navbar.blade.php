<nav class="main-header navbar navbar-expand navbar-dark bg-success border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user user-menu">
            {{-- <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name=Udin" class="user-image img-circle" alt="User Image">
                <span class="hidden-xs">Udin</span>
            </a> --}}
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name={{ request()->session()->get('user')['name'] }}"
                    class="user-image img-circle" alt="User Image">
                <span class="hidden-xs">{{ request()->session()->get('user')['name'] }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0">
                {{-- <a href="/changepass" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Ganti Password
                </a> --}}
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
