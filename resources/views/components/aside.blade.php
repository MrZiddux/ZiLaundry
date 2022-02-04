<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">ZiLaundry</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('/') ? 'active bg-gradient-primary' : '' }}" href="/">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Data</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('outlet') ? 'active bg-gradient-primary' : '' }}" href="/outlet">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Outlets</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('member') ? 'active bg-gradient-primary' : '' }}" href="/member">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Members</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('package') ? 'active bg-gradient-primary' : '' }}" href="/package">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Packages</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('user') ? 'active bg-gradient-primary' : '' }}" href="/user">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Transaction</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('transaction') ? 'active bg-gradient-primary' : '' }}" href="/transaction">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">money</i>
            </div>
            <span class="nav-link-text ms-1">Transaction</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Utilities</h6>
        </li>
        @auth
        <li class="nav-item">
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link text-white bg-transparent border-0">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </button>
            </form>
        </li>
        @endauth
        </ul>
    </div>
</aside>
