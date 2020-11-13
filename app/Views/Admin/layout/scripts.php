<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="/sbadmin/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script type="text/javascript" src="/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script type="text/javascript" src="/sbadmin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script type="text/javascript" src="/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script type="text/javascript" src="/sbadmin/js/demo/datatables-demo.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

<script>
    if (document.querySelector('#teks'))
        CKEDITOR.replace('teks')
    if (document.querySelector('#teks2'))
        CKEDITOR.replace('teks2')
    var previewImg = () => {
        const sampul = document.querySelector('#customFile')
        const imgPreview = document.querySelector('.img-preview')
        const sampulLabel = document.querySelector('.custom-file-label')

        sampulLabel.textContent = sampul.files[0].name

        const fileSampul = new FileReader()
        fileSampul.readAsDataURL(sampul.files[0])

        fileSampul.onload = res => {
            imgPreview.src = res.target.result
        }
    }

    const sampul = document.querySelectorAll('.custom-file-input')
    const sampulLabel = document.querySelectorAll('.custom-file-label')
    sampul.forEach(input => {
        input.addEventListener('change', res => {
            // console.log(res.target.parentNode.childNodes)
            res.target.parentNode.childNodes[1].innerHTML = res.target.value
        })
    })



    // function to set a given theme/color-scheme
    function setTheme(themeName) {
        localStorage.setItem('theme', themeName);
        document.documentElement.className = themeName;
    }
    // function to toggle between primary and dark theme
    function changeTheme(color) {
        setTheme('theme-' + color)
    }
    // Immediately invoked function to set the theme on initial load
    (function() {
        if (localStorage.getItem('theme') === 'theme-dark') {
            setTheme('theme-dark');
        } else if (localStorage.getItem('theme') === 'theme-primary') {
            setTheme('theme-primary');
        } else if (localStorage.getItem('theme') === 'theme-secondary') {
            setTheme('theme-secondary');
        } else if (localStorage.getItem('theme') === 'theme-warning') {
            setTheme('theme-warning');
        }
    })();


    window.onload = e => {
        e.preventDefault()
        if (document.querySelector('#dataTable_length')) {

            const DatatableLength = document.querySelector('#dataTable_length')
            let showText = DatatableLength.childNodes[0].childNodes[0]
            let entriesText = DatatableLength.childNodes[0].childNodes[2]

            showText.textContent = 'Pilih'
            entriesText.textContent = 'Baris'
            // console.log(DatatableLength.childNodes[0].childNodes[0])

            const DatatableFilter = document.querySelector('#dataTable_filter')

            let searchText = DatatableFilter.childNodes[0].childNodes[0]
            searchText.textContent = 'Cari :'
        }
    }
    if (document.querySelector('#select-all')) {

        const all = document.querySelector('#select-all')
        const checks = document.querySelectorAll('.checkInput')
        all.addEventListener('click', response => {
            checks.forEach(check => {
                check.checked = response.target.checked
            })
        })
    }
</script>