<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<h1>Edit Fasilitas</h1>
<hr>

<form method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="<?= $fasilitas['judul']; ?>" class="form-control<?= ($validation->hasError('judul')) ? ' is-invalid' : ''; ?>" id="judul">
        <?php if ($validation->hasError('judul')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('judul'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="teks">Deskripsi</label>
        <textarea class="form-control<?= ($validation->hasError('deskripsi')) ? ' is-invalid' : ''; ?>" id="teks" name="deskripsi" rows="3"><?= $fasilitas['deskripsi']; ?></textarea>
        <?php if ($validation->hasError('deskripsi')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('deskripsi'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-2">
            <img width="200px" height="200px" src="/sbadmin/img/fasilitas/<?= ($fasilitas['path']) ? $fasilitas['path'] : 'default.png'; ?>" alt="Gambar" class="img-thumbnail img-preview">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="custom-file">
                    <input type="file" onchange="previewImg()" class="custom-file-input<?= ($validation->hasError('path')) ? ' is-invalid' : ''; ?>" name="path" value="<?= $fasilitas['path']; ?>" id="customFile">
                    <?php if ($validation->hasError('path')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('path'); ?>
                        </div>
                    <?php endif; ?>
                    <label class="custom-file-label" for="customFile"><?= ($fasilitas['path']) ? $fasilitas['path'] : 'Pilih Gambar'; ?></label>
                </div>
            </div>
            <div class="row justify-content-end mt-5">
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>