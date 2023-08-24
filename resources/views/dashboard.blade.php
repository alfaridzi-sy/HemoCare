@extends('layouts.master')

@section('page_title')
    Dashboard | HemoCare RSU Mitra Sejati
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang! 🎉</h5>
                                <p class="mb-4">
                                    "Selamat datang di HemoCare!
                                    Anda adalah bagian penting dalam pengelolaan data layanan hemodialisa."
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ asset('master/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 order-1">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="btn btn-success menu-icon btn-sm bx bxs-badge-check"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Tersedia</span>
                                <h3 class="card-title mb-2">{{ $isAvailable }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="btn btn-danger menu-icon btn-sm bx bxs-timer"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Digunakan</span>
                                <h3 class="card-title mb-2">{{ $isInUse }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
