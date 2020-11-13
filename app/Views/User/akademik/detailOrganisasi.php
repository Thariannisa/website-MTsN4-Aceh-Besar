<?= $this->extend('user/layout/base'); ?>

<?= $this->section('content'); ?>

<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Organisasi</h1>
        </div>
    </div>
</section>

<section class="detail-berita">
    <div class="container-fluid" style="padding: 0 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="judul">
                    <h6 class="judul-detail"><?= $o['judul_organisasi']; ?></h6>

                    <?php $data = $user->where(['id' => $o['userId']])->first() ?>
                    <div class="admin-upld" style="font-style:bold;">
                        <?= $data['nama'] ?>
                    </div>
                    <div class="waktu-upld">
                        <?= date('d F Y', strtotime($o['updated_at'])); ?>
                    </div>
                </div>
                <div class="isi-detail"><?= $o['isi_organisasi']; ?></div>
                <hr>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->include('user/layout/component/organisasiCarousel'); ?>

<?= $this->endSection(); ?>