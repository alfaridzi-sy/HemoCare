@extends('layouts.master')

@section('page_title')
    Tambah Akun | Kidney Care RSU Mitra Sejati
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">Akun</a>
            </li>
            <li class="breadcrumb-item active">Tambah Akun</li>
        </ol>
    </nav>

    <div class="card mb-4">

        <h5 class="card-header">Tambah Akun</h5>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Pengguna" required />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required />
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Hak Akses</label>
                    <select class="form-select" id="role" name="role" required aria-label="Default select example">
                        <option selected disabled hidden>Pilih Hak Akses Pengguna</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Petugas">Petugas</option>
                    </select>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-md-12 offset-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tambah') }}
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
</div>
@endsection
