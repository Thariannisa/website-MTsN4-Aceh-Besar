<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/akademik/organisasi" role="button">Kembali</a>

<div class="form-organisasi">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="judulOrganisasi">Judul Organisasi</label>
            <input type="text" value="<?= old('judulOrganisasi'); ?>" class="form-control <?= ($validation->hasError('judulOrganisasi')) ? 'is-invalid' : ''; ?>" id="judulOrganisasi" name="judulOrganisasi" aria-describedby="emailHelp">
            <?php if ($validation->hasError('judulOrganisasi')) : ?>
                <?= $validation->getError('judulOrganisasi'); ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="teks">Isi Organisasi</label>
            <textarea class="form-control <?= ($validation->hasError('isiOrganisasi')) ? 'is-invalid' : ''; ?>" id="teks" name="isiOrganisasi" rows="15"><?= old('isiOrganisasi'); ?></textarea>
            <?php if ($validation->hasError('isiOrganisasi')) : ?>
                <?= $validation->getError('isiOrganisasi'); ?>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection(); ?>