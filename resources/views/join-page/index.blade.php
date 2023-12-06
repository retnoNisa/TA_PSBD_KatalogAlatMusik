@extends('layouts.app')

@section('title', 'Join Page')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil INNER JOIN</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {{-- <th>ID Produk</th> --}}
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Tanggal Produksi</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Brand</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            {{-- <td>{{ $result->id_produk }}</td> --}}
                            <td>{{ $result->nama_produk }}</td>
                            <td>{{ $result->harga }}</td>
                            <td>{{ $result->tgl_produksi }}</td>
                            <td>{{ $result->stok }}</td>
                            <td>{{ $result->nama_kategori }}</td>
                            <td>{{ $result->nama_brand }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
