<?= $this->extend('user/layout/base'); ?>

<?= $this->section('content'); ?>

<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Tata Tertib</h1>
        </div>
    </div>
</section>

<section class="tatatertib">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($tata as $t) : ?>
                <div class="col-md-12 isi">
                    <p><?= $t['tatatertib']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>