<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/berita" role="button">kembali</a>
<a class="btn btn-info" href="/admin/berita/edit/<?= $b['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
<a class="btn btn-danger" href="/admin/berita/hapus/<?= $b['id']; ?>" role="button"><i class="fas fa-trash-alt"></i></a>
<br>
<br>

<img src="/gambar/berita/<?= $b['path_berita'] ?>" width="100px" height="100px" alt="">
<br>
<br>
<h1><?= $b['judul_berita']; ?></h1>
<p><?= $b['isi_berita']; ?></p>
<?php $data = $user->where(['id' => $b['userId']])->first() ?>
<h4>Oleh : <?= $data['nama'] ?></h4>
<?= $this->endSection(); ?>