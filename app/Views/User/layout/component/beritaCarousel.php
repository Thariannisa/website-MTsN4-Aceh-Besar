<section class="berita">
    <div class="container-custom">

        <div class="slider-box">
            <div class="judul">
                <h1 class="txt-green">Berita</h1>
            </div>
            <div class="berita-carousel">
                <?php foreach ($sliderBerita as $b) : ?>
                    <div class="carousel-cell">
                        <a href="/berita/detail/<?= $b['slug']; ?>"> <img class="img-sedang" src="/gambar/berita/<?= $b['path_berita']; ?>" alt=""></a>
                        <div class="berita-wrap">
                            <div class="waktu-upld">
                                <i class="far fa-clock" style="margin-left:.4em;margin-right:3px;"></i><?= date('d F Y', strtotime($b['updated_at'])); ?>
                            </div>
                            <a href="/berita/detail/<?= $b['slug']; ?>" class="judul-kecil"><?= character_limiter($b['judul_berita'], 40, '...'); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="berita-more" href="/berita">Selengkapnya <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>