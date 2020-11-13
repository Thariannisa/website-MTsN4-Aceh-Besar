<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/berita" role="button">Kembali</a>
<div class="form-berita">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="teks">Visi</label>
            <textarea class="form-control <?= ($validation->hasError('visi')) ? 'is-invalid' : ''; ?>" id="teks" name="visi" rows="3"><?= $b['visi']; ?></textarea>
            <?php if ($validation->hasError('visi')) : ?>
                <?= $validation->getError('visi'); ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="teks2">Misi</label>
            <textarea class="form-control <?= ($validation->hasError('misi')) ? 'is-invalid' : ''; ?>" id="teks2" name="misi" rows="3"><?= $b['misi']; ?></textarea>
            <?php if ($validation->hasError('misi')) : ?>
                <?= $validation->getError('misi'); ?>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection(); ?>