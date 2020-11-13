<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/fasilitas" role="button">Kembali</a>

<div class="form-fasilitas">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="judul">Judul Fasilitas</label>
            <input type="text" value="<?= old('judul'); ?>" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" aria-describedby="emailHelp">
            <?php if ($validation->hasError('judul')) : ?>
                <div class="invalid-feedback">

                    <?= $validation->getError('judul'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="teks">Deskripsi</label>
            <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="teks" name="deskripsi" rows="15"><?= old('deskripsi'); ?></textarea>
            <?php if ($validation->hasError('deskripsi')) : ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('deskripsi'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="custom-file">
            <label class="custom-file-label" for="path">Gambar (maksimal 5mb)</label>
            <input type="file" onchange="previewAja()" value="<?= old('path'); ?>" class="custom-file-input <?= ($validation->hasError('path')) ? 'is-invalid' : ''; ?>" id="path" name="path">
            <?php if ($validation->hasError('path')) : ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('path'); ?>
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection(); ?>