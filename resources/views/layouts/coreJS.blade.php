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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        const currentUrl = window.location.href;

        // Loop melalui setiap menu link
        $('.menu-link').each(function() {
            const linkUrl = $(this).attr('href');

            // Bandingkan URL link dengan URL saat ini
            if (currentUrl.includes(linkUrl)) {
                $(this).addClass('active'); // Tambahkan kelas active
                $(this).closest('.menu-item').addClass('active'); // Tambahkan juga pada parent .menu-item
            }
        });
    });
</script>

@stack('scripts')

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
