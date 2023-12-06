@extends('layouts.app')

@section('tittle', 'Selamat Datang di Katalog Alat Musik Kami')

@section('content')
<div class="row">
    <!-- Brand Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('brand') }}" style="text-decoration: none; color: inherit;">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Brand</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-guitar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Produk Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('produk') }}" style="text-decoration: none; color: inherit;">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Produk</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-music fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kategori Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('kategori') }}" style="text-decoration: none; color: inherit;">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Kategori</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-drum fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Join Table Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('join.page') }}" style="text-decoration: none; color: inherit;">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Join Tabel</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-microphone fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection
