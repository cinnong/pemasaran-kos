@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header text-center my-3"
                        style="background: linear-gradient(to right, #f0def3, #dcb0ef);">
                        <div class="d-flex align-items-center justify-content-center">
                            <h5 class="card-title m-0 text-capitalize fw-bold fs-4">Welcome, {{ Auth::user()->name }}</h5>
                            {{-- <span class="badge bg-secondary ms-2">{{ Auth::user()->role }}</span> --}}
                        </div>
                        {{-- <p class="card-subtitle mt-1 fs-5">Admin Dashboard</p> --}}
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <div class="col">
                                <a href="{{ route('datauser') }}" class="text-decoration-none">
                                    <div class="card h-100 border border-2 border-success">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="avatar avatar-md bg-success rounded-circle">
                                                <i class="mdi mdi-account-outline mdi-24px text-white"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h5 class="card-title mb-0">Data Pengguna</h5>
                                                <p class="card-text fs-5">{{ $countuser }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('datakos') }}" class="text-decoration-none">
                                    <div class="card h-100 border border-2 border-warning">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="avatar avatar-md bg-warning rounded-circle">
                                                <i class="mdi mdi-cellphone-link mdi-24px text-white"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h5 class="card-title mb-0">Data Kos</h5>
                                                <p class="card-text fs-5">{{ $count }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('datapemilik') }}" class="text-decoration-none">
                                    <div class="card h-100 border border-2 border-info">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="avatar avatar-md bg-info rounded-circle">
                                                <i class="mdi mdi-account-outline mdi-24px text-white"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h5 class="card-title mb-0">Data Pemilik</h5>
                                                <p class="card-text fs-5">{{ $countpemilik }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('pemesanans.index') }}" class="text-decoration-none">
                                    <div class="card h-100 border border-2 border-danger">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="avatar avatar-md bg-danger rounded-circle">
                                                <i class="mdi mdi-cart-outline mdi-24px text-white"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h5 class="card-title mb-0">Data Pemesanan</h5>
                                                <p class="card-text fs-5">{{ $countpemesanan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('pembayaran.show') }}" class="text-decoration-none">
                                    <div class="card h-100 border border-2 border-primary">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="avatar avatar-md bg-primary rounded-circle">
                                                <i class="mdi mdi-cash-multiple mdi-24px text-white"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h5 class="card-title mb-0">Data Pembayaran</h5>
                                                <p class="card-text fs-5">{{ $countpembayaran }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
