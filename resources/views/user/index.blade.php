@extends('layouts.master')

@section('page_title')
    Daftar Akun | Kidney Care RSU Mitra Sejati
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Akun</a>
            </li>
            <li class="breadcrumb-item active">Daftar Akun</li>
        </ol>
    </nav>

    <!-- Alert Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('error') }}
        </div>
    @endif
    <!-- /Alert Message -->

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Akun</h5>
            <a href="{{route('user.create')}}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Hak Akses</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($users as $k => $u)
                    <tr>
                        <td>{{$k + 1}}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->username }}</td>
                        <td>
                            @if ($u->role == "Administrator")
                                <span class="badge bg-label-info me-1">{{ $u->role }}</span>
                            @endif
                            @if ($u->role == "Petugas")
                                <span class="badge bg-label-warning me-1">{{ $u->role }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('user.edit',['user' => $u->user_id])}}">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" href="javascript:void(0);" data-user-id="{{ $u->user_id }}">
                                        <i class="bx bx-trash me-1"></i>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Konfirmasi Hapus Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Semua informasi terkait data ini akan hilang dan tidak dapat dikembalikan.
                    Apakah Anda yakin ingin melanjutkan?
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
            var userIdToDelete; // Untuk menyimpan ID pengguna yang akan dihapus

            // Ketika tombol delete pada dropdown di klik
            $('.dropdown-item[data-bs-toggle="modal"]').click(function() {
                userIdToDelete = $(this).data('user-id');
            });

            // Ketika tombol Lanjut pada modal di klik
            $('#deleteButton').click(function() {
                if (userIdToDelete) {
                    $.ajax({
                        url: '/user/' + userIdToDelete,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.href = '/user';
                        },
                        error: function(error) {
                            window.location.href = '/user';
                        }
                    });
                }
            });

        });
    </script>
@endpush
