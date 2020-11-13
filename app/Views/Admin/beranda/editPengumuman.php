<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/pengumuman" role="button">Kembali</a>

<div class="form-pengumuman">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>


        <div class="form-group">
            <label for="judulPengumuman">Judul Pengumuman</label>
            <input type="text" value="<?= $b['judul_pengumuman']; ?>" class="form-control <?= ($validation->hasError('judulPengumuman')) ? 'is-invalid' : ''; ?>" id="judulPengumuman" name="judulPengumuman" aria-describedby="emailHelp">
            <?php if ($validation->hasError('judulPengumuman')) : ?>
                <?= $validation->getError('judulPengumuman'); ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="teks">Isi Pengumuman</label>
            <textarea class="form-control <?= ($validation->hasError('isiPengumuman')) ? 'is-invalid' : ''; ?>" id="teks" name="isiPengumuman" rows="15"><?= $b['isi_pengumuman']; ?></textarea>
            <?php if ($validation->hasError('isiPengumuman')) : ?>
                <?= $validation->getError('isiPengumuman'); ?>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-md-2">
                <img width="200px" height="200px" src="/gambar/pengumuman/<?= $b['path_pengumuman']; ?>" alt="Gambar" class="img-thumbnail img-preview">
            </div>

            <div class="col-md-10">
                <div class="custom-file">
                    <label class="custom-file-label" for="gambarPengumuman"><?= $b['path_pengumuman']; ?>)</label>
                    <input type="file" onchange="previewAja()" value="<?= $b['path_pengumuman']; ?>" class="custom-file-input <?= ($validation->hasError('gambarPengumuman')) ? 'is-invalid' : ''; ?>" id="gambarPengumuman" name="gambarPengumuman">
                    <?php if ($validation->hasError('gambarPengumuman')) : ?>
                        <?= $validation->getError('gambarPengumuman'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <br>
        <div class="custom-file">
            <label class="custom-file-label" for="filePengumuman"><?= $b['file_pengumuman']; ?>)</label>
            <input type="file" onchange="previewAja()" value="<?= $b['file_pengumuman']; ?>" class="custom-file-input <?= ($validation->hasError('berkasPengumuman')) ? 'is-invalid' : ''; ?>" id="filePengumuman" name="berkasPengumuman">
            <?php if ($validation->hasError('berkasPengumuman')) : ?>
                <?= $validation->getError('berkasPengumuman'); ?>
            <?php endif; ?>
        </div>


        <button type="submit" class="btn btn-primary">Ubah Pengumuman</button>
    </form>
</div>
<?= $this->endSection(); ?>