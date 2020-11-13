<?= $this->extend('user/layout/base'); ?>

<?= $this->section("content"); ?>

<section class="judul">

    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Pengajar</h1>
        </div>
    </div>
</section>
<section class="pengajar">
    <div class="search-staff">
        <form class="form-inline my-2 my-lg-0" method="get">
            <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Cari Pengajar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>

    <div class="card-staff">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Mata Pelajaran</th>
                        <th>Status Kepegawaian</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($halamanSekarang - 1)); ?>
                    <?php foreach ($pengajar as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?> </th>
                            <td><img src="/sbadmin/img/pengajar/<?= ($t['path']) ? $t['path'] : 'default.png'; ?>" width="100px" height="100px" alt=""></td>
                            <td><?= $t['nama']; ?></td>
                            <td><?= $t['nip']; ?></td>
                            <td><?= $t['Mata_Pelajaran']; ?></td>
                            <td><?= $t['Status_Kepegawaian']; ?></td>
                            <td><?= $t['Jabatan']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <?= $pager->links('guru', 'pagination'); ?>

</section>

<?= $this->endSection(); ?>