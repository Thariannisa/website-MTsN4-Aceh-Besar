<?= $this->extend('admin/layout/base'); ?>


<?= $this->section('content'); ?>

<div class="form-berita">
    <form method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="teks">Tata Tertib</label>
            <textarea class="form-control <?= ($validation->hasError('tatatertib')) ? ' is-invalid' : ''; ?>" id="teks" name="tatatertib" rows="15"><?= $b['tatatertib']; ?></textarea>
            <?php if ($validation->hasError('tatatertib')) : ?>
                <?= $validation->getError('tatatertib'); ?>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection(); ?>