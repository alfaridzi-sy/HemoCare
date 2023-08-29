@extends('layouts.master')

@section('page_title')
    Daftar Tempat Tidur | Kidney Care RSU Mitra Sejati
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Tempat Tidur</a>
            </li>
            <li class="breadcrumb-item active">Daftar Tempat Tidur</li>
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
            <h5 class="mb-0">Daftar Tempat Tidur</h5>
            <a href="{{route('bed.create')}}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <thead>
                    <tr>
                    <th>Nomor Tempat Tidur</th>
                    <th>Status</th>
                    <th>Upload By</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($beds as $k => $b)
                    <tr>
                        <td>{{ $b->bed_number }}</td>
                        <td>
                            @if ($b->status == 0)
                                <span class="badge bg-label-success me-1">Tersedia</span>
                            @endif
                            @if ($b->status == 1)
                                <span class="badge bg-label-danger me-1">Digunakan</span>
                            @endif
                        </td>
                        <td>{{ $b->user->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('bed.edit',['bed' => $b->bed_id])}}">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" href="javascript:void(0);" data-bed-id="{{ $b->bed_id }}">
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
                    <h5 class="modal-title" id="modalCenterTitle">Konfirmasi Hapus Tempat Tidur</h5>
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
            var bedIdToDelete; // Untuk menyimpan ID pengguna yang akan dihapus

            // Ketika tombol delete pada dropdown di klik
            $('.dropdown-item[data-bs-toggle="modal"]').click(function() {
                bedIdToDelete = $(this).data('bed-id');
            });

            // Ketika tombol Lanjut pada modal di klik
            $('#deleteButton').click(function() {
                if (bedIdToDelete) {
                    $.ajax({
                        url: '/bed/' + bedIdToDelete,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.href = '/bed';
                        },
                        error: function(error) {
                            window.location.href = '/bed';
                        }
                    });
                }
            });

        });
    </script>
@endpush
