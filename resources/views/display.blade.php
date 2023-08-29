<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Display | Kidney Care RSU Mitra Sejati
    </title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href= "{{ asset('master/assets/img/favicon/icon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('master/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('master/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('master/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('master/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('master/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('master/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <style>
        /* Custom styles */
        .header-logo {
            max-height: 80px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
        }
        .card {
            background-color: #f8f9fa; /* Background color */
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .card-text {
            font-size: 1rem;
        }
        .social-icons-left,
        .social-icons-right {
            display: flex;
            align-items: center;
        }

        .social-icons-right {
            gap: 10px; /* Jarak antara ikon kanan */
        }

        .social-icons-left {
            gap: 15px; /* Jarak antara ikon kiri */
        }

        .floating-whatsapp {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }

        .floating-whatsapp a {
            display: block;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 60px;
            font-size: 24px;
            transition: transform 0.3s, background-color 0.3s;
        }

        .floating-whatsapp a:hover {
            background-color: #128c7e;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container d-flex justify-content-between">
            <div class="navbar-text social-icons-left">
                <a href="mailto:rsu.mitra.sejati@gmail.com" target="_blank">
                    <i class="menu-icon tf-icons bx bx-mail-send"></i>
                    rsu.mitra.sejati@gmail.com
                </a>
            </div>
            <div class="navbar-text social-icons-right">
                <a href="https://www.facebook.com/rsumitrasejati/" target="_blank">
                    <i class="menu-icon tf-icons bx bxl-facebook"></i>
                </a>
                <a href="https://www.instagram.com/rsu_mitra_sejati/" target="_blank">
                    <i class="menu-icon tf-icons bx bxl-instagram"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCWeFOPrpzumSuZGUGEp2ByA" target="_blank">
                    <i class="menu-icon tf-icons bx bxl-youtube"></i>
                </a>
                <a href="https://twitter.com/RSUMS01" target="_blank">
                    <i class="menu-icon tf-icons bx bxl-twitter"></i>
                </a>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Grid pertama untuk logo -->
                <div class="col-md-2">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/mitra.jpeg') }}" alt="Logo" width="100" height="100" class="d-inline-block align-top">
                    </a>
                </div>
                <!-- Grid kedua untuk nama dan alamat perusahaan -->
                <div class="col-md-10">
                    <div class="navbar-text">
                        <h3>Rumah Sakit Umum Mitra Sejati</h3>
                        <span><strong>Alamat:</strong> Jalan Jend. Besar A.H. Nasution No. 7, Pangkalan Mansyur - Medan</span><br>
                        <span><strong>Telp:</strong> 061-7875967</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Content -->
    <div class="container mt-4">
        <h2 class="text-center">Ketersediaan Tempat Tidur Hemodialisa</h2>
        <br>
        <div class="row mt-4">
            @foreach($beds as $b)
            <div class="col-md-6 col-xl-3">
                <div class="card {{ $b->status === 0 ? 'bg-primary' : 'bg-danger' }} text-white mb-3"
                    data-bed-number="{{ $b->bed_number }}"
                    data-bed-id="{{ $b->bed_id }}"
                >
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-white">Tempat Tidur</span>
                            <h3 class="font-weight-bold text-white">#{{ $b->bed_number }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="idForStatus" value="{{ $b->bed_id }}">
                        <input type="hidden" class="status-value" value="{{ $b->status }}">
                        @if ($b->status === 0)
                            <h5 class="card-title text-white">Tersedia</h5>
                            <p class="card-text">Hubungi untuk info lebih lanjut</p>
                        @else
                            <h5 class="card-title text-white">Waktu Pelayanan</h5>
                            @foreach($b->bed_usage as $usage)
                                @if ($usage->service_status === 1)
                                    <p class="card-text countdown" data-target="{{ $usage->finish_time }}"></p>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Add more cards here -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 RSU Mitra Sejati. All rights reserved.</p>
        </div>
    </footer>

    {{-- <div class="floating-whatsapp">
        <a href="https://api.whatsapp.com/send?phone=+6287868771177&text=Halo%2C%20saya%20ingin%20bertanya" target="_blank">
            <i class="bx bx-md bxl-whatsapp"></i>
        </a>
    </div> --}}
    <div class="floating-whatsapp">
        <a href="https://api.whatsapp.com/send?phone=+6287868771177&text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20jadwal%20dan%20pelayanan%20hemodialisa%20di%20RSU%20Mitra%20Sejati" target="_blank">
            <i class="bx bx-md bxl-whatsapp"></i>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Update countdown setiap 1 detik
        var countdownIntervals = [];

        // Memproses setiap elemen dengan class "countdown"
        document.querySelectorAll('.countdown').forEach(function(element) {
            var targetDate = new Date(element.getAttribute('data-target'));

            var countdownInterval = setInterval(function() {
                var now = new Date().getTime();
                var timeRemaining = targetDate - now;

                var hours = Math.floor(timeRemaining / (1000 * 60 * 60));
                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                var formattedTime = hours + ":" + minutes.toString().padStart(2, '0') + ":" + seconds.toString().padStart(2, '0');

                if (timeRemaining < 0) {
                    clearInterval(countdownInterval);
                    element.innerHTML = "Waktu selesai";

                    // Ambil bed_id dari input dengan id "idForStatus" pada card yang bersangkutan
                    var bedId = element.closest('.card').querySelector('#idForStatus').value;

                    // Lakukan permintaan AJAX ke route release-bed untuk mengubah status bed
                    $.ajax({
                        url: "{{ route('hemodialisa.bedRelease') }}",
                        method: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            bed_id: bedId
                        },
                        success: function(response) {
                            console.log(response); // Debug, Anda bisa menghapus ini jika tidak diperlukan
                            window.location.href = "{{ route('hemodialisa.daftarBed') }}";
                        },
                        error: function(error) {
                            console.error(error); // Debug, Anda bisa menghapus ini jika tidak diperlukan
                        }
                    });
                } else {
                    // Jika waktu belum selesai, tampilkan teks countdown
                    element.innerHTML = formattedTime;
                }

            }, 1000);

            countdownIntervals.push(countdownInterval);
        });

        function refreshPage() {
            location.reload();
        }

        // Panggil fungsi refreshPage setiap 5 menit (300000 ms)
        setTimeout(refreshPage, 300000); // 300000 ms = 5 menit
    </script>
</body>
</html>
