<?= $this->extend('user/layout/base'); ?>

<?= $this->section('content'); ?>

<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Galeri</h1>
        </div>
    </div>
</section>


<section class="indeks-berita">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="padding:1rem;">
                <div class="row justify-content-between">
                    <?php foreach ($galeri as $g) : ?>
                        <div class="col-md-3 foto-galeri" data-toggle="modal" data-target="#exampleModal-<?= $g['id']; ?>">
                            <img style="height: 200px;width: 250px;margin-top: 1em;margin-bottom: 1em;" src="/gambar/galeri/<?= $g['path_gambar'] ?>">
                        </div>
                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal-<?= $g['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-center h-custom">
                                <div class="modal-content bg-transparent">
                                    <img src="/gambar/galeri/<?= $g['path_gambar'] ?>" width="100%" height="100%" alt="Responsive image">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($pager) : ?>
                    <?= $pager->links('galeri', 'pagination'); ?>
                <?php endif; ?>
            </div>



        </div>

    </div>
</section>


<?= $this->endSection(); ?>