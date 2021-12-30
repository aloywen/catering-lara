<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">DASHBOARD ADMIN</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">D</a>
    </div>


    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>

        <li class="nav-item{{ request()->is('dashboard') ? ' active' : ''}}">
            <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="nav-item{{ request()->is('produk') ? ' active' : ''}}">
            <a href="/produk" class="nav-link"><i class="fas fa-briefcase"></i><span>Daftar Paket</span></a>
        </li>

        <li class="nav-item{{ request()->is('pemesanan') ? ' active' : ''}}">
            <a href="/pemesanan" class="nav-link"><i class="fas fa-cart-arrow-down"></i><span>Pemesanan</span></a>
        </li>

        <li class="nav-item{{ request()->is('pembayaran') ? ' active' : ''}}">
            <a href="/pembayaran" class="nav-link"><i class="fab fa-creative-commons"></i><span>Pembayaran</span></a>
        </li>

        <li class="nav-item{{ request()->is('riwayat') ? ' active' : ''}}">
            <a href="/riwayat" class="nav-link"><i class="fas fa-book"></i><span>Riwayat</span></a>
        </li>

        <li class="nav-item{{ request()->is('pengaturan') ? ' active' : ''}}">
            <a href="/pengaturan" class="nav-link"><i class="fas fa-book"></i><span>Pengaturan</span></a>
        </li>

        <li class="nav-item{{ request()->is('logout') ? ' active' : ''}}">
            <a href="/logout" class="nav-link"><i class="fas fa-fire"></i><span>Logout</span></a>
        </li>

    </ul>

</aside>