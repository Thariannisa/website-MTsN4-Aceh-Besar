<?= $this->extend('admin/layout/base'); ?>


<?= $this->section('content'); ?>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <img width="400px" height="300px" style="margin-left:18rem;margin-bottom:2rem;" src="/gambar/struktur/<?= $b['path_struktur']; ?>" alt="Gambar" class="img-thumbnail img-preview">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="custom-file">
                <input type="file" onchange="previewImg()" class="custom-file-input<?= ($validation->hasError('gambarStruktur')) ? ' is-invalid' : ''; ?>" name="gambarStruktur" value="<?= old('gambarStruktur'); ?>" id="customFile">
                <?php if ($validation->hasError('gambarStruktur')) : ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('gambarStruktur'); ?>
                    </div>
                <?php endif; ?>
                <label class="custom-file-label" for="customFile">Maks 8 mb</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection(); ?>