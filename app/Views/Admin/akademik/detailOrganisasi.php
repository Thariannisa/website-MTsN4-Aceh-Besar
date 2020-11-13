<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/akademik/organisasi" role="button">kembali</a>
<a class="btn btn-info" href="/admin/akademik/organisasi/edit/<?= $o['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
<a class="btn btn-danger" href="/admin/akademik/organisasi/delete/<?= $o['id']; ?>" role="button"><i class="fas fa-trash-alt"></i></a>
<br>
<br>

<br>
<br>
<h1><?= $o['judul_organisasi']; ?></h1>
<p><?= $o['isi_organisasi']; ?></p>
<?php $data = $user->where(['id' => $o['userId']])->first() ?>
<h4>Oleh : <?= $data['nama'] ?></h4>
<?= $this->endSection(); ?>