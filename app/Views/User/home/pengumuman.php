<?= $this->extend('user/layout/base'); ?>

<?= $this->section('content'); ?>

<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Pengumuman</h1>
        </div>
    </div>
</section>

<section class="indeks-berita">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8" style="padding:1rem;">

                <?php foreach ($pengumuman as $b) : ?>
                    <div class="baris-item-flex">

                        <div class="item">
                            <div class="gambar-item" style=" margin-right: 1rem;">
                                <img class=img-sedang src="/gambar/pengumuman/<?= $b['path_pengumuman']; ?>" alt=""></div>

                            <div class="judul-besar">
                                <a href="/pengumuman/detail/<?= $b['slug']; ?>"><?= character_limiter($b['judul_pengumuman'], 100, '...'); ?></a>
                                <div class="isi-item">
                                    <div class="info-item">
                                        <?php $data = $user->where(['id' => $b['userId']])->first() ?>
                                        <div class="admin-upld" style="font-style:bold;">
                                            <?= $data['nama'] ?>
                                        </div>
                                        <div class="waktu-upld" style="margin:0 0.7rem;">
                                            <?= date('d F Y', strtotime($b['updated_at'])); ?>
                                        </div>
                                    </div>
                                    <h5><?= character_limiter($b['isi_pengumuman'], 100, '...'); ?></h5>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                <?php endforeach; ?>

                <?php if ($pager) : ?>
                    <?= $pager->links('pengumuman', 'pagination'); ?>
                <?php endif; ?>
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
                                <a href="/berita/detail/<?= $b['slug']; ?>" class="judul-kecil"><?= character_limiter($r['judul_berita'], 100, '...'); ?></a>
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