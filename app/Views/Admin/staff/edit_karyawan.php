<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<h1>Edit Karyawan</h1>
<hr>

<form method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?= $karyawan['nama']; ?>" class="form-control<?= ($validation->hasError('nama')) ? ' is-invalid' : ''; ?>" id="nama">
        <?php if ($validation->hasError('nama')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
            </div>
        <?php endif; ?>
    </div>


    <div class="form-group">
        <label for="Status_Karyawan">Status Karyawan</label>
        <input type="text" name="Status_Karyawan" value="<?= $karyawan['Status_Karyawan']; ?>" class="form-control<?= ($validation->hasError('Status_Karyawan')) ? ' is-invalid' : ''; ?>" id="Status_Karyawan">
        <?php if ($validation->hasError('Status_Karyawan')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Status_Karyawan'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="Jabatan">Jabatan</label>
        <input type="text" name="Jabatan" value="<?= $karyawan['Jabatan']; ?>" class="form-control<?= ($validation->hasError('Jabatan')) ? ' is-invalid' : ''; ?>" id="Jabatan">
        <?php if ($validation->hasError('Jabatan')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Jabatan'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-md-2">
            <img width="200px" height="200px" src="/sbadmin/img/karyawan/<?= ($karyawan['path']) ? $karyawan['path'] : 'default.png'; ?>" alt="Gambar" class="img-thumbnail img-preview">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="custom-file">
                    <input type="file" onchange="previewImg()" class="custom-file-input<?= ($validation->hasError('path')) ? ' is-invalid' : ''; ?>" name="path" value="<?= $karyawan['path']; ?>" id="customFile">
                    <?php if ($validation->hasError('path')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('path'); ?>
                        </div>
                    <?php endif; ?>
                    <label class="custom-file-label" for="customFile"><?= ($karyawan['path']) ? $karyawan['path'] : 'Pilih Gambar'; ?></label>
                </div>
            </div>
            <div class="row justify-content-end mt-5">
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>