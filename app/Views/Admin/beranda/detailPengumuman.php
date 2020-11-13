<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/pengumuman" role="button">kembali</a>
<a class="btn btn-info" href="/admin/pengumuman/edit/<?= $b['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
<a class="btn btn-danger" href="/admin/pengumuman/hapus/<?= $b['id']; ?>" role="button"><i class="fas fa-trash-alt"></i></a>
<br>
<br>

<img src="/gambar/pengumuman/<?= $b['path_pengumuman'] ?>" width="100px" height="100px" alt="">
<br>
<br>
<h1><?= $b['judul_pengumuman']; ?></h1>
<p><?= $b['isi_pengumuman']; ?></p>

<?php if (strcmp('Tidak ada berkas', $b['file_pengumuman']) === 0) : ?>
    <h5>tidak ada berkas</h5>
<?php else : ?>
    <a href="/file/pengumuman/<?= ($b['file_pengumuman']) ? $b['file_pengumuman'] : 'default.png'; ?>" download class="badge badge-primary">unduh file</a>
<?php endif; ?>

<br>

<?php $data = $user->where(['id' => $b['userId']])->first() ?>
<h4>Oleh : <?= $data['nama'] ?></h4>
<?= $this->endSection(); ?>