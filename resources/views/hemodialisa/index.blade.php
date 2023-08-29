@extends('layouts.master')

@section('page_title')
    Daftar Tempat Tidur | Kidney Care RSU Mitra Sejati
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Manajemen Status</a>
            </li>
            <li class="breadcrumb-item active">Status Tempat Tidur</li>
        </ol>
    </nav>

    <div class="row">
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
                    <input type="hidden" class="status-value" value="{{ $b->status }}">
                    <input type="hidden" id="idForStatus" value="{{ $b->bed_id }}">
                    @if ($b->status === 0)
                        <h5 class="card-title text-white">Tersedia</h5>
                        <p class="card-text">Tekan kartu untuk penggunaan</p>
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
    </div>

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('hemodialisa.storeBedUsage')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Penggunaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" class="form-control" id="bed_id" name="bed_id" placeholder="Masukkan Nomor Tempat Tidur" required />

                        <div class="mb-3">
                            <label for="bed_number" class="form-label">Nomor Tempat Tidur</label>
                            <input type="text" class="form-control" id="bed_number" name="bed_number" placeholder="Masukkan Nomor Tempat Tidur" required readonly />
                        </div>
                        <div class="mb-3">
                            <label for="bed_number" class="form-label">Jam Mulai</label>
                            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required />
                        </div>
                        <div class="mb-3">
                            <label for="service_time" class="form-label">Waktu Layanan</label>
                            <div class="input-group">
                                <select class="form-select" id="service_time" name="service_time" required aria-label="Default select example">
                                    <option selected disabled hidden>Pilih Waktu Layanan</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <span class="input-group-text" id="basic-addon11">Jam</span>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="uploaded_by" name="uploaded_by" value="<?php echo auth()->user()->user_id ?>" required />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalFinish" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('hemodialisa.finishUsage')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Selesaikan Penggunaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" class="form-control" id="bed_id_finish" name="bed_id_finish" required />

                        <div class="mb-3">
                            <p>Anda yakin ingin menyelesaikan layanan hemodialisa untuk Tempat Tidur #<span id="bed_number_finish"></span> ?</p>
                            <p>Mohon pastikan semua proses telah selesai dan tambahkan keterangan lebih lanjut jika diperlukan.</p>
                        </div>

                        <div class="mb-3">
                            <label for="additional_information" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="additional_information" name="additional_information" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
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

            console.log(timeRemaining);

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

    document.addEventListener('DOMContentLoaded', function () {
        var modalCenter = new bootstrap.Modal(document.getElementById('modalCenter'));
        var modalFinish = new bootstrap.Modal(document.getElementById('modalFinish'));

        document.querySelectorAll('.card').forEach(function(card) {
            card.addEventListener('click', function() {
                var bedNumber = card.getAttribute('data-bed-number');
                var bedId = card.getAttribute('data-bed-id');
                var status = card.querySelector('.status-value').value;

                if (status === '0') {
                    var bedNumberForm = document.getElementById('bed_number');
                    var bedIdForm = document.getElementById('bed_id');
                    bedNumberForm.value = bedNumber;
                    bedIdForm.value = bedId;
                    modalCenter.show();
                } else {
                    var bedNumberFinish = document.getElementById('bed_number_finish');
                    var bedIdFinish = document.getElementById('bed_id_finish');
                    bedNumberFinish.textContent = bedNumber;
                    bedIdFinish.value = bedId;
                    modalFinish.show();
                }
            });
        });
    });

    // Mendapatkan elemen input datetime
    const datetimeInput = document.getElementById('start_time');

    // Mendapatkan tanggal dan waktu saat ini dalam UTC
    const nowUTC = new Date();

    // Menyesuaikan waktu menjadi GMT+7 dengan menambahkan offset
    const asiaGMT7Time = new Date(nowUTC.getTime() + (7 * 60 * 60 * 1000)); // 7 jam dalam milidetik

    // Format tanggal dan waktu ke format ISO 8601
    const isoDateTime = asiaGMT7Time.toISOString().slice(0, 16);

    // Set nilai default pada input datetime
    datetimeInput.value = isoDateTime;

</script>
@endpush
