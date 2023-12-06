@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian</h6>
    </div>
    <div class="card-body">
        @if (isset($brands) && count($brands) > 0)
            <h3>Merek</h3>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Merek</th>
                            <th>Nama Merek</th>
                            <th>Asal</th>
                            <th>Reputasi</th>
                            <th>Tahun Berdiri</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id_brand }}</td>
                                <td>{{ $brand->nama_brand }}</td>
                                <td>{{ $brand->origin }}</td>
                                <td>{{ $brand->reputasi }}</td>
                                <td>{{ $brand->tahun_berdiri }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (isset($categories) && count($categories) > 0)
            <h3>Kategori</h3>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Tipe</th>
                            <th>Jumlah Produk</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id_kategori }}</td>
                                <td>{{ $category->nama_kategori }}</td>
                                <td>{{ $category->tipe }}</td>
                                <td>{{ $category->jml_produk }}</td>
                                <td>{{ $category->deskripsi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (isset($products) && count($products) > 0)
            <h3>Produk</h3>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Tanggal Produksi</th>
                            <th>Stok</th>
                            <th>ID Kategori</th>
                            <th>ID Merek</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id_produk }}</td>
                                <td>{{ $product->nama_produk }}</td>
                                <td>{{ $product->harga }}</td>
                                <td>{{ $product->tgl_produksi }}</td>
                                <td>{{ $product->stok }}</td>
                                <td>{{ $product->fk_kategori }}</td>
                                <td>{{ $product->fk_brand }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (!isset($brands) && !isset($categories) && !isset($products))
            <p>Tidak ada hasil ditemukan.</p>
        @endif
    </div>
</div>
@endsection
