@extends('layouts.admin')
@section('content')
    <div class="col-md-12 mt-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img class="card-img card-img-left" src="{{ asset('photos/kos/' . $datakos->foto) }}" alt="Card image" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $datakos->nama }}</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    Pemilik : {{ $datakos->pemilikkos->nama }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    Lokasi : {{ $datakos->lokasi }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    Harga : {{ $datakos->harga }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    Jumlah Kamar : {{ $datakos->jumlah_kamar }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    Tipe Kos : {{ $datakos->tipekos }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    Status : {{ $datakos->status }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('datakos') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
