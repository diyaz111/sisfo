<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="/upload/logo/{{$logo->gambar}}" width="50px" height="50px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link @yield('home')" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @yield('kategori')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/visimisi">Visi & Misi</a>
                        <a class="dropdown-item" href="/struktur">Struktur Organisasi</a>
                        <a class="dropdown-item" href="/sarana">Sarana dan Prasarana</a>
                        <a class="dropdown-item" href="/artikel-tentang">Tentang Kami</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link @yield('gtk')" href="/gtk-ui">GTK</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @yield('kurikulum')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kurikulum
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- ekstrakulikuler -->
                    <a class="dropdown-item" href="/ekstakurikuler">Ekstakurikuler</a>
                    <a class="dropdown-item" href="/pendaftaranSiswa">Pendaftaran Siswa/i Baru</a>
                    <!-- register online -->
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('artikel')" href="/artikel-ui">Artikel</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                @auth
                @role('admin|penulis')
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Admin</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#">Logout</a>
                    </li>
                @endrole

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
