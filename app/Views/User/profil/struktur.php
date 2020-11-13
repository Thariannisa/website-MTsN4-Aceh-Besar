<?= $this->extend('user/layout/base'); ?>

<?= $this->section('content'); ?>

<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Struktur Sekolah</h1>
        </div>
    </div>
</section>

<section class="visimisi">
    <div class="container-fluid">
        <?php foreach ($struktur as $s) : ?>
            <div class="row">
                <div class="col-md-12 isi">
                    <img width="600px" height="400px" src="/gambar/struktur/<?= $s['path_struktur']; ?>" alt="Gambar" class="img-thumbnail img-preview">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?= $this->endSection(); ?>