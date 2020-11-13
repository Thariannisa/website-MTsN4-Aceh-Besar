<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<h1>Edit Pengajar</h1>
<hr>

<form method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?= $pengajar['nama']; ?>" class="form-control<?= ($validation->hasError('nama')) ? ' is-invalid' : ''; ?>" id="nama">
        <?php if ($validation->hasError('nama')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="nip">Nip</label>
        <input type="text" name="nip" value="<?= $pengajar['nip']; ?>" class="form-control<?= ($validation->hasError('nip')) ? ' is-invalid' : ''; ?>" id="nip">
        <?php if ($validation->hasError('nip')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('nip'); ?>
            </div>
        <?php endif; ?>
    </div>


    <div class="form-group">
        <label for="Mata_Pelajaran">Mata Pelajaran</label>
        <input type="text" name="Mata_Pelajaran" value="<?= $pengajar['Mata_Pelajaran']; ?>" class="form-control<?= ($validation->hasError('Mata_Pelajaran')) ? ' is-invalid' : ''; ?>" id="Mata_Pelajaran">
        <?php if ($validation->hasError('Mata_Pelajaran')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Mata_Pelajaran'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="Status_Guru">Status Guru</label>
        <input type="text" name="Status_Guru" value="<?= $pengajar['Status_Guru']; ?>" class="form-control<?= ($validation->hasError('Status_Guru')) ? ' is-invalid' : ''; ?>" id="Status_Guru">
        <?php if ($validation->hasError('Status_Guru')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Status_Guru'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="Status_Kepegawaian">Status Kepegawaian</label>
        <input type="text" name="Status_Kepegawaian" value="<?= $pengajar['Status_Kepegawaian']; ?>" class="form-control<?= ($validation->hasError('Status_Kepegawaian')) ? ' is-invalid' : ''; ?>" id="Status_Kepegawaian">
        <?php if ($validation->hasError('Status_Kepegawaian')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Status_Kepegawaian'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-md-2">
            <img width="200px" height="200px" src="/sbadmin/img/pengajar/<?= ($pengajar['path']) ? $pengajar['path'] : 'default.png'; ?>" alt="Gambar" class="img-thumbnail img-preview">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="custom-file">
                    <input type="file" onchange="previewImg()" class="custom-file-input<?= ($validation->hasError('path')) ? ' is-invalid' : ''; ?>" name="path" value="<?= $pengajar['path']; ?>" id="customFile">
                    <?php if ($validation->hasError('path')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('path'); ?>
                        </div>
                    <?php endif; ?>
                    <label class="custom-file-label" for="customFile"><?= ($pengajar['path']) ? $pengajar['path'] : 'Pilih Gambar'; ?></label>
                </div>
            </div>
            <div class="row justify-content-end mt-5">
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>