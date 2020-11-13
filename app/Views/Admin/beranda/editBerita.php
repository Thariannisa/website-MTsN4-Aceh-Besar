<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/berita" role="button">Kembali</a>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="form-berita">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>


        <div class="form-group">
            <label for="judulBerita">Judul Berita</label>
            <input type="text" value="<?= $b['judul_berita']; ?>" class="form-control <?= ($validation->hasError('judulBerita')) ? 'is-invalid' : ''; ?>" id="judulBerita" name="judulBerita" aria-describedby="emailHelp">
            <?php if ($validation->hasError('judulBerita')) : ?>
                <?= $validation->getError('judulBerita'); ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="teks">Isi Berita</label>
            <textarea class="form-control <?= ($validation->hasError('isiBerita')) ? 'is-invalid' : ''; ?>" id="teks" name="isiBerita" rows="15"><?= $b['isi_berita']; ?></textarea>
            <?php if ($validation->hasError('isiBerita')) : ?>
                <?= $validation->getError('isiBerita'); ?>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-md-2">
                <img width="200px" height="200px" src="/gambar/berita/<?= $b['path_berita']; ?>" alt="Gambar" class="img-thumbnail img-preview">
            </div>

            <div class="col-md-10">
                <div class="custom-file">
                    <label class="custom-file-label" for="customFile"><?= $b['path_berita']; ?>)</label>
                    <input type="file" onchange="previewImg()" value="<?= old('gambarBerita'); ?>" class="custom-file-input <?= ($validation->hasError('gambarBerita')) ? 'is-invalid' : ''; ?>" id="customFile" name="gambarBerita">
                    <?php if ($validation->hasError('gambarBerita')) : ?>
                        <?= $validation->getError('gambarBerita'); ?>
                    <?php endif; ?>
                    <label class="custom-file-label" for="customFile"><?= $b['path_berita']; ?></label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ubah Berita</button>
    </form>
</div>
<?= $this->endSection(); ?>