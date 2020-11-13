<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/pengumuman" role="button">Kembali</a>

<div class="form-pengumuman">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="judulPengumuman">Judul Pengumuman</label>
            <input type="text" value="<?= old('judulPengumuman'); ?>" class="form-control <?= ($validation->hasError('judulPengumuman')) ? 'is-invalid' : ''; ?>" id="judulPengumuman" name="judulPengumuman" aria-describedby="emailHelp">
            <?php if ($validation->hasError('judulPengumuman')) : ?>
                <?= $validation->getError('judulPengumuman'); ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="teks">Isi Pengumuman</label>
            <textarea class="form-control <?= ($validation->hasError('isiPengumuman')) ? 'is-invalid' : ''; ?>" id="teks" name="isiPengumuman" rows="15"><?= old('isiPengumuman'); ?></textarea>
            <?php if ($validation->hasError('isiPengumuman')) : ?>
                <?= $validation->getError('isiPengumuman'); ?>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-md-2">
                <img width="200px" height="200px" src="/gambar/pengumuman/default.png" alt="Gambar" class="img-thumbnail img-preview">
            </div>
            <div class="col-md-10">
                <div class="custom-file">
                    <label class="custom-file-label" for="customFile">Gambar (maksimal 5mb)</label>
                    <input type="file" onchange="previewImg()" value="<?= old('gambarPengumuman'); ?>" class="custom-file-input <?= ($validation->hasError('gambarPengumuman')) ? 'is-invalid' : ''; ?>" id="customFile" name="gambarPengumuman">
                    <?php if ($validation->hasError('gambarPengumuman')) : ?>
                        <?= $validation->getError('gambarPengumuman'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <br>

        <div class="custom-file">
            <label class="custom-file-label" for="berkas">File Pengumuman</label>
            <input type="file" value="<?= old('berkasPengumuman'); ?>" class="custom-file-input <?= ($validation->hasError('berkasPengumuman')) ? 'is-invalid' : ''; ?>" id="berkas" name="berkasPengumuman">
            <?php if ($validation->hasError('berkasPengumuman')) : ?>
                <?= $validation->getError('berkasPengumuman'); ?>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Upload Pengumuman</button>
    </form>
</div>
<?= $this->endSection(); ?>