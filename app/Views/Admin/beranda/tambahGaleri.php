<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('style'); ?>
<link rel="stylesheet" href="/sbadmin/plugin/dropzone/dropzone.min.css">
<style>
    .dropzone.dz-clickable {
        cursor: pointer;
        min-height: 400px;
    }

    .alert.alert-success {
        animation: oppa 1.5s normal;
    }

    @keyframes oppa {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('headScript'); ?>
<script src="/sbadmin/plugin/dropzone/dropzone.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<a class="btn btn-primary" href="/admin/galeri" role="button">Kembali</a>

<div class="form-berita">

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="/admin/galeri/tambah" method="post" class="dropzone" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">

                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    const CSRF_TOKEN = document.querySelector('input[name="csrf_test_name"]').value
    const berita = document.querySelector(".form-berita"); // Get the <ul> element to insert a new node
    // console.log(CSRF_TOKEN)
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone(".dropzone", {
        maxFilesize: 8, // 8 mb
        acceptedFiles: ".jpg,.jpeg,.png",
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
            'X-Requested-With': 'XMLHttpRequest'
        },
        init: function() {
            this.on("success", function(file, response) {
                // console.log('success')
                let session = document.createElement("div");
                session.classList.add('alert')
                session.classList.add('alert-success')
                session.innerHTML = `Berhasil Menambahkan Foto`


                berita.insertBefore(session, berita.childNodes[0]);

                setTimeout(() => {
                    berita.removeChild(berita.childNodes[0])
                }, 3000);
            });
        }
    });
</script>
<?= $this->endSection(); ?>