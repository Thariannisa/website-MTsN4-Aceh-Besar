<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/fasilitas" role="button">kembali</a>
<a class="btn btn-info" href="/admin/fasilitas/edit/<?= $a['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
<a class="btn btn-danger" href="/admin/fasilitas/delete/<?= $a['id']; ?>" role="button"><i class="fas fa-trash-alt"></i></a>
<br>
<br>

<img src="/sbadmin/img/fasilitas/<?= $a['path'] ?>" width="100px" height="100px" alt="">
<br>
<br>
<h1><?= $a['judul']; ?></h1>
<p><?= $a['deskripsi']; ?></p>
<?php $data = $user->where(['id' => $a['userId']])->first() ?>
<h4>Oleh : <?= $data['nama'] ?></h4>
<?= $this->endSection(); ?>