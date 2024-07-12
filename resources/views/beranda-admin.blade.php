@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2 text-capitalize">Welcome to Admin
                        {{ Auth::user()->name }}</h5>
                </div>
                <p class="mt-3"><span class="fw-medium">Dashboard Admin</p>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-success rounded shadow">
                                    <i class="mdi mdi-account-outline mdi-24px"></i>
                                </div>
                            </div>
                            <a href="{{ route('datauser') }}" style="text-decoration: none; color: inherit;">
                                <div class="ms-3">
                                    <div class="small mb-1">Data Pengguna</div>
                                    <h5 class="mb-0">{{ $countuser }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-warning rounded shadow">
                                    <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                </div>
                            </div>
                            <a href="{{ route('datakos') }}" style="text-decoration: none; color: inherit;">
                                <div class="ms-3">
                                    <div class="small mb-1">Data Kos</div>
                                    <h5 class="mb-0">{{ $count }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-info rounded shadow">
                                    <i class="mdi mdi-account-outline mdi-24px"></i>
                                </div>
                            </div>
                            <a href="{{ route('datapemilik') }}" style="text-decoration: none; color: inherit;">
                                <div class="ms-3">
                                    <div class="small mb-1">Data Pemilik</div>
                                    <h5 class="mb-0">{{ $countpemilik }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-danger rounded shadow">
                                    <i class="mdi mdi-cart-outline mdi-24px"></i>
                                </div>
                            </div>
                            <a href="{{ route('pemesanans.index') }}" style="text-decoration: none; color: inherit;">
                                <div class="ms-3">
                                    <div class="small mb-1">Data Pemesanan</div>
                                    {{-- <h5 class="mb-0">{{ $jumlahPemesanan }}</h5> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-primary rounded shadow">
                                    <i class="mdi mdi-cash-multiple mdi-24px"></i>
                                </div>
                            </div>
                            <a href="{{ route('pembayaran.show') }}" style="text-decoration: none; color: inherit;">
                                <div class="ms-3">
                                    <div class="small mb-1">Data Pembayaran</div>
                                    {{-- <h5 class="mb-0">{{ $jumlahPembayaran }}</h5> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
