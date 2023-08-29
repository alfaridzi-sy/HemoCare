@extends('layouts.master')

@section('page_title')
    Ubah Data Tempat Tidur | Kidney Care RSU Mitra Sejati
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Tempat Tidur</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Tempat Tidur</li>
        </ol>
    </nav>

    <div class="card mb-4">

        <h5 class="card-header">Ubah Data Tempat Tidur</h5>
        <div class="card-body">
            <form action="{{ route('bed.update', $bed->bed_id) }}" method="POST" id="updateForm">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="bed_number" class="form-label">Nomor Tempat Tidur</label>
                    <input type="text" class="form-control" id="bed_number" name="bed_number" value="{{ $bed->bed_number }}" required />
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Tempat Tidur</label>
                    <select class="form-select" id="status" name="status" required aria-label="Default select example">
                        <option value="0" <?php if ($bed->status ==  "0" ) echo "selected"; ?>>Tersedia</option>
                        <option value="1" <?php if ($bed->status ==  "1" ) echo "selected"; ?>>Digunakan</option>
                    </select>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-md-12 offset-md-12 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                            {{ __('Update') }}
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            {{ __('Reset') }}
                        </button>
                        <a href="{!! url('bed') !!}" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Konfirmasi Ubah Data Tempat Tidur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda telah melakukan perubahan pada data tempat tidur.
                    Klik "Lanjut" untuk mengonfirmasi perubahan, atau "Batal" untuk membatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary" id="deleteButton">Lanjut</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#deleteButton').click(function() {
            // Izinkan pengiriman form setelah tombol "Lanjut" ditekan
            $('#updateForm').submit();
        });
    });
</script>
@endpush

