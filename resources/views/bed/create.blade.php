@extends('layouts.master')

@section('page_title')
    Tambah Tempat Tidur | HemoCare RSU Mitra Sejati
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Tempat Tidur</a>
            </li>
            <li class="breadcrumb-item active">Tambah Tempat Tidur</li>
        </ol>
    </nav>

    <div class="card mb-4">

        <h5 class="card-header">Tambah Tempat Tidur</h5>
        <div class="card-body">
            <form action="{{route('bed.store')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="bed_number" class="form-label">Nomor Tempat Tidur</label>
                    <input type="text" class="form-control" id="bed_number" name="bed_number" placeholder="Masukkan Nomor Tempat Tidur" required />
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Tempat Tidur</label>
                    <select class="form-select" id="status" name="status" required aria-label="Default select example">
                        <option selected disabled hidden>Pilih Status Tempat Tidur</option>
                        <option value="0">Tersedia</option>
                        <option value="1">Digunakan</option>
                    </select>
                </div>
                <input type="hidden" id="uploaded_by" name="uploaded_by" value="<?php echo auth()->user()->user_id ?>">

                <div class="form-group row mb-3">
                    <div class="col-md-12 offset-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tambah') }}
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
</div>
@endsection
