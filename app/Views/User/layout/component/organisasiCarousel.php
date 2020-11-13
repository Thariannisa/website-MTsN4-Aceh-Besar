<section class="berita">
    <div class="container-custom">

        <div class="slider-box">
            <div class="judul">
                <h1 class="txt-green">Galeri</h1>
            </div>
            <div class="berita-carousel">
                <?php foreach ($galeri as $b) : ?>
                    <div class="carousel-cell" data-toggle="modal" data-target="#exampleModal-<?= $b['id']; ?>">
                        <img class="img-organisasi" src="/gambar/galeri/<?= $b['path_gambar']; ?>" alt="">
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Modal -->

        </div>
    </div>
</section>