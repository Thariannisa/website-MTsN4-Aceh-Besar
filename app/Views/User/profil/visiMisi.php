<?= $this->extend('user/layout/base'); ?>

<?= $this->section('content'); ?>
<section class="judul">
    <div class="container-fluid">
        <div class="row">
            <h1 class="col-md-12 judulHalaman">Visi dan Misi</h1>
        </div>
    </div>
</section>

<section class="visimisi">
    <div class="container-fluid">
        <div class="row" style="border: 1px solid rgba(0, 0, 0, .1);margin-bottom:3rem;">
            <div class="col-md-8" style="padding:0;">
                <div class="visimisiTeks before-pop-up" style="padding:3em;margin:3.5em 0;">
                    <h1>Visi</h1>
                    <p>Terwujudnya warga Madrasah yang bertaqwa, berkahlakul karimah, berprestasi, kreatif ,inovatif, serta berwawasan lingkungan.</p>
                </div>
            </div>
            <div class="col-md-4 visimisi-img" style="padding:0;">
                <img src="/img/rsz_visi.jpg" alt="" width="360px" height="513px">
            </div>
        </div>
        <div class="row" style="border: 1px solid rgba(0, 0, 0, .1);">
            <div class="col-md-4 visimisi-img" style="padding:0;">
                <img src="/img/rsz_misi.jpg" alt="" width="360px" height="513px">
            </div>
            <div class="col-md-8" style="padding:0;">
                <div class="visimisiTeks before-pop-up" style="padding:3em;margin:3.5em 0;">
                    <h1>Misi</h1>
                    <p>1. Mengembangkan Potensi siswa yang kreatif, inovatif, dan berprestasi yang</p>
                    <p> 2. Meningkatkan kompetensi guru dan tenaga kependidikan sesuai dengan bidang ilmunya.</p>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection(); ?>