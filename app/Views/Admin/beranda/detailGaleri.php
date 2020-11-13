<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/galeri" role="button">kembali</a>
<a class="btn btn-info" href="/admin/galeri/edit/<?= $b['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
<a class="btn btn-danger" href="/admin/galeri/hapus/<?= $b['id']; ?>" role="button"><i class="fas fa-trash-alt"></i></a>
<br>
<br>
<h1><?= $b['judul_gambar']; ?></h1>

<br>
<br>
<img src="/gambar/galeri/<?= $b['path_gambar'] ?>" width="600px" height="400px" alt="">
<?php $data = $user->where(['id' => $b['userId']])->first() ?>
<h4>Oleh : <?= $data['nama'] ?></h4>
<?= $this->endSection(); ?>