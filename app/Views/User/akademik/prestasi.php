<?= $this->extend('user/layout/base'); ?>

<?= $this->section("content"); ?>

<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Prestasi</h1>
        </div>
    </div>
</section>

<section class="indeks-prestasi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">

                <?php foreach ($prestasi as $p) : ?>
                    <div class="baris-item-flex">

                        <div class="item">
                            <div class="gambar-item" style=" margin-right: 1rem;">
                                <img class="img-sedang" src="/sbadmin/img/prestasi/<?= $p['path_prestasi']; ?>" alt=""></div>

                            <div class="judul-besar">
                                <a href="/prestasi/detail/<?= $p['slug']; ?>"><?= character_limiter($p['judul_prestasi'], 100, '...'); ?></a>
                                <div class="isi-item">
                                    <div class="info-item">
                                        <?php $data = $user->where(['id' => $p['userId']])->first() ?>
                                        <div class="admin-upld" style="font-style:bold;">
                                            <?= $data['nama'] ?>
                                        </div>
                                        <div class="waktu-upld" style="margin:0 0.7rem;">
                                            <?= date('d F Y', strtotime($p['updated_at'])); ?>
                                        </div>
                                    </div>
                                    <h5><?= character_limiter($p['isi_prestasi'], 100, '...'); ?></h5>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                <?php endforeach; ?>

                <?= $pager->links('prestasi', 'pagination'); ?>
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
                                <a href="/berita/detail/<?= $r['slug']; ?>" class="judul-kecil"><?= character_limiter($r['judul_berita'], 100, '...'); ?></a>
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
</section>


<?= $this->endSection(); ?>