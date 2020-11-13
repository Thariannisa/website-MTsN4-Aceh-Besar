<?= $this->extend('admin/layout/base'); ?>

<?= $this->section('content'); ?>
<form action="<?= base_url('/admin/staff/pengajar'); ?>" enctype="multipart/form-data" method="post" id="formData">
    <?= csrf_field(); ?>

    <div class="row">
        <div class="col-md-10">
            <h1> Tambah Data Pengajar </h1>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btnSubmit" disabled style="width:100%;height:100%">Simpan Data</button>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Nip</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Status Guru</th>
                <th scope="col">Status Kepegawaian</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="formAdd">
            <tr>
                <td scope="row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="path" name="path[]">
                        <label class="custom-file-label" for="path">Choose file</label>
                    </div>
                </td>
                <td>
                    <input type="text" name="nama[]" class="form-control is-invalid" placeholder="Masukkan nama guru">
                </td>
                <td>
                    <input type="text" name="nip[]" class="form-control is-invalid" placeholder="Masukkan nip guru">
                </td>
                <td>
                    <input type="text" name="Mata_Pelajaran[]" class="form-control is-invalid" placeholder="Masukkan Mata Pelajaran">
                </td>
                <td>
                    <input type="text" name="Status_Guru[]" class="form-control is-invalid" placeholder="Masukkan status guru">
                </td>
                <td>
                    <input type="text" name="Status_Kepegawaian[]" class="form-control is-invalid" placeholder="Masukkan status kepegawaian">
                </td>
                <td>
                    <button type="button" class="btn btn-success btnAddData">
                        <i class="fa fa-plus"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</form>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    function getExtension(filename) {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }

    let checkBtn = () => {
        const btnSubmit = document.querySelector('.btnSubmit')
        if (document.querySelector('.is-invalid') === null)
            btnSubmit.disabled = false;
        else
            btnSubmit.disabled = true;

    }
    let changeForm = () => {
        const inputForm = document.querySelectorAll('input')
        inputForm.forEach(input => {
            input.addEventListener('input', res => {
                if (res.target.value != '') {

                    if (res.target.getAttribute('name') === "nip[]") {
                        if (isNaN(res.target.value))
                            res.target.classList.add('is-invalid')
                        else
                            res.target.classList.remove('is-invalid')
                    } else
                        res.target.classList.remove('is-invalid')
                } else
                    res.target.classList.add('is-invalid')

                if (res.target.className === 'custom-file-input') {
                    let file = res.target.files[0]
                    let ext = getExtension(file['name'])
                    let size = file['size'] / 1000
                    if (size <= 4096 && (ext === "jpg" || ext === 'png' || ext === 'jpeg'))
                        res.target.classList.remove('is-invalid')
                    else
                        res.target.classList.add('is-invalid')
                }

                checkBtn()
            })
        })

        const inputFile = document.querySelectorAll('.custom-file')
        inputFile.forEach(input => {
            input.childNodes[1].addEventListener('change', res => {
                input.childNodes[3].textContent = res.target.value
            })
        })

        checkBtn()
    }

    window.onload = e => {
        e.preventDefault()

        const btnAdd = document.querySelector('.btnAddData')
        const formAdd = document.querySelector('.formAdd')
        btnAdd.addEventListener('click', res => {
            let child = document.createElement('tr')
            child.innerHTML = `
             
                <td scope="row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="path" name="path[]">
                        <label class="custom-file-label" for="path">Choose file</label>
                    </div>
                </td>
                <td>
                    <input type="text" name="nama[]" class="form-control is-invalid" placeholder="Masukkan nama guru">
                </td>
                <td>
                    <input type="text" name="nip[]" class="form-control is-invalid" placeholder="Masukkan nip guru">
                </td>
                <td>
                    <input type="text" name="Mata_Pelajaran[]" class="form-control is-invalid" placeholder="Masukkan Mata Pelajaran">
                </td>
                <td>
                    <input type="text" name="Status_Guru[]" class="form-control is-invalid" placeholder="Masukkan status guru">
                </td>
                <td>
                    <input type="text" name="Status_Kepegawaian[]" class="form-control is-invalid" placeholder="Masukkan status kepegawaian">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btnDeleteData">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
          
            `
            formAdd.appendChild(child)
            changeForm()
        })

        window.addEventListener('click', res => {
            let row = res.target
            if (row.classList.contains('btnDeleteData')) {
                row = row.parentNode.parentNode
            } else if (row.parentNode.classList.contains('btnDeleteData')) {
                row = row.parentNode.parentNode.parentNode
            }
            if (row.nodeName == 'TR')
                row.remove()
            changeForm()
        })

    }
</script>
<?= $this->endSection(); ?>