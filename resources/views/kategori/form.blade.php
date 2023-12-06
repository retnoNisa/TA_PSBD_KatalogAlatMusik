@extends('layouts.app')
@section('tittle', 'Form Kategori')

@section('content')
<form action="{{ isset($kategori) ? route('kategori.tambah.update', $kategori->id_kategori): route('kategori.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($kategori)? 'Form Edit Kategori': 'Form Tambah Kategori' }}</h6>
                </div>
                <div class="card-body">
{{--                     
                    <div class="form-group">
                        <label for="id_brand">ID Brand</label>
                        <input type="text" class="form-control" id="id_brand" name="id_brand" value="{{ isset($brand) ? $brand->id_brand:'' }}">
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ isset($kategori) ? $kategori->nama_kategori:'' }}">
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" value="{{ isset($kategori) ? $kategori->tipe:'' }}">
                    </div>
                    <div class="form-group">
                        <label for="jml_produk">Jumlah Produk</label>
                        <input type="text" class="form-control" id="jml_produk" name="jml_produk" value="{{ isset($kategori) ? $kategori->jml_produk:'' }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ isset($kategori) ? $kategori->deskripsi:'' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
    
@endsection