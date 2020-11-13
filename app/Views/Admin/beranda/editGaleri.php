<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/galeri" role="button">Kembali</a>

<div class="form-berita">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="judulGaleri">Judul Gambar</label>
            <input type="text" value="<?= $b['judul_gambar']; ?>" class="form-control <?= ($validation->hasError('judulGaleri')) ? 'is-invalid' : ''; ?>" id="judulGaleri" name="judulGaleri" aria-describedby="emailHelp">
            <?php if ($validation->hasError('judulGaleri')) : ?>
                <div class="invalid-feedback">

                    <?= $validation->getError('judulGaleri'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-2">
                <img width="200px" height="200px" src="/gambar/galeri/<?= $b['path_gambar']; ?>" alt="Gambar" class="img-thumbnail img-preview">
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="custom-file">
                        <input type="file" onchange="previewImg()" class="custom-file-input<?= ($validation->hasError('gambarGaleri')) ? ' is-invalid' : ''; ?>" name="gambarGaleri" value="<?= old('gambarGaleri'); ?>" id="customFile">
                        <?php if ($validation->hasError('gambarGaleri')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambarGaleri'); ?>
                            </div>
                        <?php endif; ?>
                        <label class="custom-file-label" for="customFile"><?= $b['path_gambar']; ?></label>
                    </div>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ubah Foto</button>
    </form>
</div>
<?= $this->endSection(); ?>