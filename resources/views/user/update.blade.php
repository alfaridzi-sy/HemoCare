@extends('layouts.master')

@section('page_title')
    Ubah Data Akun | Kidney Care RSU Mitra Sejati
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Akun</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Akun</li>
        </ol>
    </nav>

    <div class="card mb-4">

        <h5 class="card-header">Ubah Data Akun</h5>
        <div class="card-body">
            <form action="{{ route('user.update', $user->user_id) }}" method="POST" id="updateForm">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user -> name }}" required />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $user -> username }}" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru Jika Ingin Merubah Password" />
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Hak Akses</label>
                    <select class="form-select" id="role" name="role" required aria-label="Default select example">
                        <option selected disabled hidden>Pilih Hak Akses Pengguna</option>
                        <option value="Administrator" <?php if ($user->role ==  "Administrator" ) echo "selected"; ?>>Administrator</option>
                        <option value="Petugas" <?php if ($user->role ==  "Petugas" ) echo "selected"; ?>>Petugas</option>
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
                        <a href="{!! url('user') !!}" class="btn btn-danger">Batal</a>
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
                    <h5 class="modal-title" id="modalCenterTitle">Konfirmasi Ubah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda telah melakukan perubahan pada data pengguna.
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

