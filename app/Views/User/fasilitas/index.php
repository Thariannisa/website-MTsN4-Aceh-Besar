<?= $this->extend('user/layout/base'); ?>

<?= $this->section("content"); ?>
<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Fasilitas</h1>
        </div>
    </div>
</section>
<section class="Fasilitas mb-3">
    <?php foreach ($fasilitas as $a) : ?>
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-md-3 fasilitas-Img">
                    <img src="/sbadmin/img/fasilitas/<?= $a['path'] ?>" width="300px" height="300px" alt="">
                </div>
                <div class="col-md-8 fasilitas-isi">
                    <h1><?= $a['judul']; ?></h1>
                    <p><?= $a['deskripsi']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?= $pager->links('fasilitas', 'pagination'); ?>
</section>
<?= $this->endSection(); ?>