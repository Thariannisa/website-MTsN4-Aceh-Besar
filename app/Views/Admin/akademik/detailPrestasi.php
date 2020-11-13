<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/berita" role="button">kembali</a>
<a class="btn btn-info" href="/admin/akademik/prestasi/edit/<?= $p['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
<a class="btn btn-danger" href="/admin/akademik/prestasi/delete/<?= $p['id']; ?>" role="button"><i class="fas fa-trash-alt"></i></a>
<br>
<br>

<img src="/sbadmin/img/prestasi/<?= $p['path_prestasi'] ?>" width="100px" height="100px" alt="">
<br>
<br>
<h1><?= $p['judul_prestasi']; ?></h1>
<p><?= $p['isi_prestasi']; ?></p>
<?php $data = $user->where(['id' => $p['userId']])->first() ?>
<h4>Oleh : <?= $data['nama'] ?></h4>
<?= $this->endSection(); ?>