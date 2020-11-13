<!--<section class="tatatertib">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($fasilitas as $a) : ?>
                <?= $a['judul']; ?>
                <?= $a['deskripsi']; ?>
                <div> <img src="/sbadmin/img/fasilitas/<?= $a['path'] ?>" width="100px" height="100px" alt=""></div>
            <?php endforeach ?>
        </div>
    </div>
</section>


<div class="container-fluid">
        <div class="row">
            <div class="col-md-5 welcome-img">
                <?php foreach ($fasilitas as $a) : ?>
                    <div> <img src="/sbadmin/img/fasilitas/<?= $a['path'] ?>" width="100px" height="100px" alt=""></div>
                    <div class="col-md-7">
                        <div class="kata-sambutan">
                            <?= $a['judul']; ?>
                            <hr>
                            <?= $a['deskripsi']; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

</section>


<section class="card">
    <?php foreach ($fasilitas as $a) : ?>

        <div class="card mb-3" style="max-width: 1650px;">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <div> <img src="/sbadmin/img/fasilitas/<?= $a['path'] ?>" width="300px" height="300px" alt=""></div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5><?= $a['judul']; ?></h5>
                        <p class="card-text"><?= $a['deskripsi']; ?></p>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>