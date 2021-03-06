<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('pesanHapus')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('pesanHapus'); ?>
    </div>
<?php endif; ?>
<a class="btn btn-primary" href="/admin/fasilitas/create" role="button">Tambah</a>
<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <div class="row justify-content-between">

            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Fasilitas</h6>
                <h6 class="m-0 font-weight-bold text-primary"><input type="checkbox" id="select-all"> Pilih Semua</h6>
            </div>
            <div class="col-6">
                <a class="btn btn-danger ml-auto" data-toggle="modal" href="#myModal" role="button"><i class="fas fa-trash-alt"></i></a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/admin/fasilitas/delete" method="post">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($fasilitas as $a) : ?>
                            <tr>
                                <th scope="row"><input type="checkbox" class="checkInput" value="<?= $a['id']; ?>" name="id[]"><?= $i++; ?></th>
                                <td><img src="/sbadmin/img/fasilitas/<?= $a['path']; ?>" width="100px" height="100px" alt=""></td>
                                <td><a href="/admin/fasilitas/detail/<?= $a['id']; ?>"><?= $a['judul']; ?></a></td>

                                <td><a class="btn btn-info" href="/admin/fasilitas/edit/<?= $a['id']; ?>" role="button"><i class="fas fa-edit"></i></a></td>



                            </tr>
                        <?php endforeach; ?>
                        <!-- Modal HTML -->
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Ingin Menghapus?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapusnya? data akan terhapus secara permanen</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" role="button" style="color:white;text-align:center;" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>