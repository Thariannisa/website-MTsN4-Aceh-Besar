<?= $this->extend('user/layout/baseBeranda'); ?>

<?= $this->section('content'); ?>

<section class="welcome">
    <div class="container-fluid">
        <div class="row welcome-row">
            <div class="col-md-6 welcome-img">
                <img src="/img/kepsek.png" alt="">
            </div>
            <div class="col-md-6">
                <div class="kata-sambutan">
                    <h1 class="txt-green">Selamat Datang !</h1>
                    <hr class="hr-green">
                    <p>Selamat datang di website resmi MTsN 4 Jeureula Aceh Besar. Semoga melalui sarana website ini dapat memberikan sajian informasi yang bermanfaat untuk kita semua khususnya MTsN 4 Jeureula Aceh Besar</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('user/layout/component/beritaCarousel'); ?>

<section class="info-bar">
    <div class="container-fluid info-bar-flex">
        <div class="info-bar-item">
            <div class="counter" data-target="<?= $jmlfasilitas; ?>"><?= $jmlfasilitas; ?></div>
            <div class="logo">
                <i class="fas fa-landmark"></i>
            </div></i>

            <h4>Fasilitas</h4>
        </div>
        <div class="info-bar-item">
            <div class="counter" data-target="<?= $jmlpengajar; ?>"><?= $jmlpengajar; ?></div>
            <div class="logo">
                <i class="fas fa-chalkboard-teacher"></i>
            </div></i>

            <h4>Pengajar</h4>
        </div>
        <div class="info-bar-item">
            <div class="counter" data-target="230">0</div>
            <div class="logo">
                <i class="fas fa-users"></i>
            </div>

            <h4>Murid</h4>
        </div>

        <div class="info-bar-item">
            <div class="counter" data-target="<?= $jmlorganisasi; ?>"><?= $jmlorganisasi; ?></div>
            <div class="logo">
                <i class="fas fa-star-half-alt"></i>
            </div></i>

            <h4>Organisasi</h4>
        </div>
        <div class="info-bar-item">
            <div class="counter" data-target="<?= $jmlprestasi; ?>"><?= $jmlprestasi; ?></div>
            <div class="logo">
                <i class="fas fa-trophy"></i>
            </div></i>

            <h4>Prestasi</h4>
        </div>
    </div>
</section>

<section class="end">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 pengumuman-box">
                <div class="judul">
                    <h1 class="txt-green before-pop-up">Pengumuman</h1>

                </div>
                <?php foreach ($pengumuman as $p) : ?>
                    <div class="baris-pengumuman">
                        <div class="gambar">
                            <img src="/gambar/pengumuman/<?= $p['path_pengumuman']; ?>" alt="">
                        </div>
                        <div class="isi-pengumuman">
                            <a href="/pengumuman/detail/<?= $p['slug']; ?>" class="judul-kecil" style="font-size:1.3em;"><?= character_limiter($p['judul_pengumuman'], 100, '...'); ?></a>
                            <div class="waktu-upld">
                                <i class="far fa-clock" style="margin-right:3px;"></i><?= date('d F Y', strtotime($p['updated_at'])); ?>
                            </div>
                        </div>
                    </div>
                    <hr class="hr-custom">
                <?php endforeach; ?>
                <div class="read-more">

                    <a href="/pengumuman">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-4 visimisi-box">
                <div class="judul">
                    <h1 class="txt-green before-pop-up">Sistem Informasi</h1>

                </div>

                <div class="sistem-informasi-flex">
                    <a href="http://elearning.mtsn4acehbesar.com/" class="sistem">
                        <div class="logo">
                            <i class="fab fa-leanpub"></i>
                        </div>
                        <div class="sistem-judul">
                            E-learning
                        </div>
                        <div class="sistem-desc">
                            Sistem pembelajaran elektronik atau e-pembelajaran yang diterapkan pada platform berupa website yang dapat diakses di mana saja.
                        </div>
                    </a>
                    <a href="http://raport.mtsn4acehbesar.com/" class="sistem">
                        <div class="logo">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="sistem-judul">
                            E-Rapor
                        </div>
                        <div class="sistem-desc">
                            Sistem evaluasi hasil pembelajaran elektronik oleh guru yang dilakukan secara digital
                        </div>
                    </a>
                </div>
                <!-- <div style="background-image:url('/img/covervisimisi.jpg');background-size:cover;background-position:center;" class="d-block w-100 h-100" alt="...">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="#" style="height:765px" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-block">
                                    <h2>VISI</h2>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="#" style="height:765px" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-block">
                                    <h2>MISI</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<section class="galeri">
    <div class="container-fluid">
        <div class="judul">
            <h1 class="txt-green before-pop-up" style="margin-bottom:1.2rem;">Galeri</h1>

        </div>
        <div class="container">
            <div class="row">
                <!-- <div class="grid-container-foto"> -->
                <?php foreach ($galeri as $g) : ?>
                    <div class="col-md-3 galeri-foto">
                        <div class="zoom-hover">
                            <a href="/galeri">
                                <i class="fas fa-search-plus"></i>
                            </a>
                        </div>
                        <a href="/galeri"><img src="/gambar/galeri/<?= $g['path_gambar'] ?>"></a>

                    </div>
                <?php endforeach; ?>
                <!-- </div> -->
            </div>
        </div>
        <div class="row">
            <a class="btn btn-green" href="/galeri" role="button">Lihat Semua</a>
        </div>
    </div>
</section>


<?= $this->endSection(); ?>