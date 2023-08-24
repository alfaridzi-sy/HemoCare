<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('master/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('master/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('master/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('master/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('master/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('master/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('master/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('master/assets/js/dashboards-analytics.js') }}"></script>

<script>
    // Ambil URL saat ini
    var currentUrl = window.location.href;

    // Ambil semua elemen <a> di dalam menu
    var menuLinks = document.querySelectorAll('.menu-link');

    // Loop melalui setiap elemen <a> di dalam menu
    menuLinks.forEach(function(link) {
        // Bandingkan href dari elemen <a> dengan URL saat ini
        if (link.getAttribute('href') === currentUrl) {
            // Tambahkan kelas 'active' jika cocok
            link.closest('.menu-item').classList.add('active');
        }
    });
</script>


<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
