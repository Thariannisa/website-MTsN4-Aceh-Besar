<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="/js/flickity.pkgd.min.js"></script>

<script>
    var elem = document.querySelector('.berita-carousel');
    var flkty = new Flickity(elem, {
        // options
        cellAlign: 'left',
        groupCells: 3,
        autoPlay: true
    });

    function scrollMuncul() {
        let screenPosition = window.innerHeight / 2;
        if (document.querySelector('.kata-sambutan')) {

            const kataSambutan = document.querySelector('.kata-sambutan');
            let posisi = kataSambutan.getBoundingClientRect().top;

            if (posisi < screenPosition)
                kataSambutan.classList.add('kata-sambutan-muncul');

            const welcomeImg = document.querySelector('.welcome-img')
            posisi = welcomeImg.getBoundingClientRect().top;
            // console.log(posisi)
            if (posisi < screenPosition)
                welcomeImg.classList.add('slide-right');

            const infoBarItem = document.querySelector('.info-bar-flex')
            posisi = infoBarItem.getBoundingClientRect().top;
            // console.log(posisi)
            if (posisi < screenPosition)
                infoBarItem.classList.add('pop-up');

            const textGreen = document.querySelectorAll('.txt-green');
            textGreen.forEach(textg => {
                posisi = textg.getBoundingClientRect().top;
                if (posisi < screenPosition)
                    textg.classList.add('pop-up')
            })

        }

        if (document.querySelectorAll('.visimisiTeks')) {

            const visiMisi = document.querySelectorAll('.visimisiTeks');
            console.log(visiMisi)
            visiMisi.forEach(vm => {
                posisi = vm.getBoundingClientRect().top;
                if (posisi < screenPosition)
                    vm.classList.add('pop-up')
            })

        }

        if (document.querySelectorAll('.contact')) {
            const kontak = document.querySelector('.contact')
            posisi = kontak.getBoundingClientRect().top;
            // console.log(posisi)
            if (posisi < screenPosition)
                kontak.classList.add('pop-up');

            const map = document.querySelector('.maps')
            posisi = map.getBoundingClientRect().top;
            // console.log(posisi)
            if (posisi < screenPosition)
                map.classList.add('pop-up');
        }

        const navbar = document.querySelector('.navbar')
        var height = document.getElementById('header').getBoundingClientRect().top
    }

    window.addEventListener('scroll', scrollMuncul);
    var height = $('#header').height();
    $(window).scroll(function() {
        if ($(this).scrollTop() > height) {
            $('.navbar').addClass('navbar-scroll');
        } else {
            $('.navbar').removeClass('navbar-scroll');
        }
    });
</script>