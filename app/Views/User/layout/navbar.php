<header id="header">
    <a class="navbar-brand" href="/">
        <img src="/img/logonew.png" width="60" height="60" class="d-inline-block align-top" alt="" loading="lazy">
        <div class="text-brand">
            <h4>Madrasah Tsanawiyah Negeri 4 Jeureula</h4>
            <h5>Aceh Besar</h5>
        </div>
    </a>
</header>
<nav class="navbar navbar-expand-lg navbar-light navbar-fixed bg-green">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= (uri_string() === '/' || uri_string() === "berita" || strpos(uri_string(), "berita/detail")) ? 'active' : ''; ?>">
                    <a class="nav-link" href="/">BERANDA</a>
                </li>
                <li class="nav-item <?= (uri_string() === "visimisi" || uri_string() === "struktursekolah" || uri_string() === "tatatertib") ? 'active' : ''; ?> dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PROFIL
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/visimisi">Visi & Misi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/struktursekolah">Struktur Sekolah</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/tatatertib">Tata Tertib</a>
                    </div>
                </li>
                <li class="nav-item <?= (uri_string() === "karyawan" || uri_string() === "pengajar") ? 'active' : ''; ?> dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        STAFF
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/karyawan">Karyawan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/pengajar">Pengajar</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        AKADEMIK
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/organisasi">Organisasi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/prestasi">Prestasi</a>
                    </div>
                </li>
                <li class="nav-item <?= (uri_string() === 'fasilitas') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/fasilitas">FASILITAS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SISTEM INFORMASI
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://elearning.mtsn4acehbesar.com/">E-learning</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://raport.mtsn4acehbesar.com/">E-Rapor</a>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-search" method="post" action="/search">
                        <?= csrf_field(); ?>
                        <input type="text" name="search">
                        <i class="fa fa-search"></i>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>