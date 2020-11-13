<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/akademik/prestasi" role="button">Kembali</a>

<div class="form-prestasi">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>


        <div class="form-group">
            <label for="judulPrestasi">Judul Prestasi</label>
            <input type="text" value="<?= $p['judul_prestasi']; ?>" class="form-control <?= ($validation->hasError('judulPrestasi')) ? 'is-invalid' : ''; ?>" id="judulPrestasi" name="judulPrestasi" aria-describedby="emailHelp">
            <?php if ($validation->hasError('judulPrestasi')) : ?>
                <?= $validation->getError('judulPrestasi'); ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="kategoriPrestasi">Kategori Prestasi</label>
            <input type="text" value="<?= $p['kategori']; ?>" class="form-control <?= ($validation->hasError('kategoriPrestasi')) ? 'is-invalid' : ''; ?>" id="kategoriPrestasi" name="kategoriPrestasi" aria-describedby="emailHelp">
            <?php if ($validation->hasError('kategoriPrestasi')) : ?>
                <?= $validation->getError('kategoriPrestasi'); ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="isiPrestasi">Isi Prestasi</label>
            <textarea class="form-control <?= ($validation->hasError('isiPrestasi')) ? 'is-invalid' : ''; ?>" id="isiPrestasi" name="isiPrestasi" rows="15"><?= $p['isi_prestasi']; ?></textarea>
            <?php if ($validation->hasError('isiPrestasi')) : ?>
                <?= $validation->getError('isiPrestasi'); ?>
            <?php endif; ?>
        </div>
        <div class="custom-file">
            <label class="custom-file-label" for="gambarPrestasi"><?= $p['path_prestasi']; ?>)</label>
            <input type="file" onchange="previewAja()" value="<?= $p['path_prestasi']; ?>" class="custom-file-input <?= ($validation->hasError('gambarPrestasi')) ? 'is-invalid' : ''; ?>" id="gambarPrestasi" name="gambarPrestasi">
            <?php if ($validation->hasError('gambarPrestasi')) : ?>
                <?= $validation->getError('gambarPrestasi'); ?>
            <?php endif; ?>
        </div>


        <button type="submit" class="btn btn-primary">Ubah Prestasi</button>
    </form>
</div>
<?= $this->endSection(); ?>