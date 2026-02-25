<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="/content" class="brand-link">
            <span class="brand-text fw-light">Admin Perpustakaan</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" role="menu">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/content"
                        class="nav-link {{ Request::is('content') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Data Buku -->
                <li class="nav-item">
                    <a href="/update"
                        class="nav-link {{ Request::is('update*') ? 'active' : '' }}">
                        <i class="bi bi-book"></i>
                        <p>Data Buku</p>
                    </a>
                </li>

                <!-- Buku Pinjaman -->
                <li class="nav-item">
                    <a href="/tambah-buku"
                        class="nav-link {{ Request::is('tambah-buku*') ? 'active' : '' }}">
                        <i class="bi bi-person-fill-lock"></i>
                        <p>Buku Pinjaman</p>
                    </a>
                </li>

                <!-- Buku Pengembalian -->
                <li class="nav-item">
                    <a href="/pengembalian-buku"
                        class="nav-link {{ Request::is('pengembalian*') ? 'active' : '' }}">
                        <i class="bi bi-arrow-counterclockwise"></i>
                        <p>Buku Pengembalian</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/card/user"
                        class="nav-link {{ Request::is('pengembalian*') ? 'active' : '' }}">
                        <i class="bi bi-card-heading"></i>
                        <p>Card</p>
                    </a>
                </li>

                <!-- Jadwal Perpustakaan -->
                <li class="nav-item">
                    <a href="/jadwal"
                        class="nav-link {{ Request::is('jadwal*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-date"></i>
                        <p>Jadwal Perpustakaan</p>
                    </a>
                    <!-- end Jadwal Perpustakaan -->

                    <!-- Berita Perpustakaan -->
                <li class=" nav-item">
                    <a href="/berita"
                        class="nav-link {{ Request::is('berita*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i>
                        <p>Berita Perpustakaan</p>
                    </a>
                    <!-- end Berita Perpustakaan -->

                    <!-- Data Anggota -->
                <li class=" nav-item">
                    <a href="/anggota"
                        class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <p>Data Anggota</p>
                    </a>
                </li>

                <!-- <li class=" nav-item">
                    <a href="/info-card"
                        class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <p>Info Card</p>
                    </a>
                </li> -->

                <!-- hero -->
                <!-- <li class=" nav-item">
                    <a href="/info-hero"
                        class="nav-link {{ Request::is('hero*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <p>Info Hero</p>
                    </a>
                </li> -->

                <!-- end hero -->

                <li class=" nav-item">
                    <a href="/userhi"
                        class="nav-link {{ Request::is('userhi*') ? 'active' : '' }}">
                        <i class="bi bi-border-style"></i>
                        <p>userhi</p>
                    </a>
                </li>


                <!-- Data Petugas -->
                <li class="nav-item">
                    <a href="/petugas"
                        class="nav-link {{ Request::is('petugas*') ? 'active' : '' }}">
                        <i class="bi bi-person-fill-lock"></i>
                        <p>Data Petugas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/form/user"
                        class="nav-link {{ Request::is('petugas*') ? 'active' : '' }}">
                        <i class="bi bi-person-lines-fill"></i>
                        <p>Form Contact</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/loginjoin"
                        class="nav-link {{ Request::is('loginjoin*') ? 'active' : '' }}">
                        <i class="bi bi-door-open"></i>
                        <p>Login Join</p>
                    </a>
                </li>


                <!-- Ubah Password -->
                <li class="nav-item">
                    <a href="/ubah-pass"
                        class="nav-link {{ Request::is('ubah-pass*') ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
