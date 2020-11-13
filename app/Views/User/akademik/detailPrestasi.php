<?= $this->extend('user/layout/base'); ?>

<?= $this->section('content'); ?>

<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Prestasi</h1>
        </div>
    </div>
</section>

<section class="detail-berita">
    <div class="container-fluid" style="padding: 0 30px;">
        <div class="row">
            <div class="col-md-8">
                <div class="judul">
                    <h6 class="judul-detail"><?= $p['judul_prestasi']; ?></h6>

                    <?php $data = $user->where(['id' => $p['userId']])->first() ?>
                    <div class="admin-upld" style="font-style:bold;">
                        <?= $data['nama'] ?>
                    </div>
                    <div class="waktu-upld">
                        <?= date('d F Y', strtotime($p['updated_at'])); ?>
                    </div>
                </div>
                <div class="gambar-detail">
                    <img class="img-detail" src="/sbadmin/img/prestasi/<?= $p['path_prestasi']; ?>" alt=""></div>
                <div class="isi-detail"><?= $p['isi_prestasi']; ?></div>
                <hr>
            </div>

            <div class="col-md-4 terkini-list">
                <h3>Berita Terkini</h3>
                <hr>
                <?php $i = 1; ?>
                <?php foreach ($recent as $r) : ?>
                    <div class="terkini-flex">
                        <div class="terkini-item">
                            <div class="urutan">
                                <div class="nomor">
                                    <?= $i++; ?>
                                </div>
                            </div>
                            <div class="terkini-judul">
                                <div class="judul-kecil"><?= character_limiter($r['judul_berita'], 100, '...'); ?></div>
                                <div class="waktu-upld">
                                    <i class="far fa-clock" style="margin-right:3px;"></i><?= date('d F Y', strtotime($r['updated_at'])); ?>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->include('user/layout/component/beritaCarousel'); ?>
<?= $this->endSection(); ?>