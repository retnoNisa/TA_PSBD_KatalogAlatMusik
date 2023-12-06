<!-- resources/views/produk/form.blade.php -->

@extends('layouts.app')

@section('title', 'Form Produk')

@section('content')
  <form action="{{ isset($produk) ? route('produk.tambah.update', $produk->id_produk) : route('produk.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($produk) ? 'Form Edit Produk' : 'Form Tambah Produk' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ isset($produk) ? $produk->nama_produk : '' }}">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($produk) ? $produk->harga : '' }}">
            </div>
            <div class="form-group">
                <label for="tgl_produksi">Tanggal Produksi</label>
                <input type="text" class="form-control" id="tgl_produksi" name="tgl_produksi" value="{{ isset($produk) ? $produk->tgl_produksi : '' }}">
              </div>
            <div class="form-group">
              <label for="fk_kategori">Kategori Produk</label>
							<select name="fk_kategori" id="fk_kategori" class="custom-select">
								<option value="" selected disabled hidden>-- Pilih Kategori --</option>
								@foreach ($kategori as $row)
									<option value="{{ $row->id_kategori }}" {{ isset($produk) ? ($produk->fk_kategori == $row->id_kategori ? 'selected' : '') : '' }}>
										{{ $row->nama_kategori }}
									</option>
								@endforeach
							</select>
            </div>
            <div class="form-group">
                <label for="fk_brand">Brand Produk</label>
                              <select name="fk_brand" id="fk_brand" class="custom-select">
                                  <option value="" selected disabled hidden>-- Pilih Brand --</option>
                                  @foreach ($brand as $row)
                                      <option value="{{ $row->id_brand }}" {{ isset($produk) ? ($produk->fk_brand == $row->id_brand ? 'selected' : '') : '' }}>
                                          {{ $row->nama_brand }}
                                      </option>
                                  @endforeach
                              </select>
              </div>
            <div class="form-group">
              <label for="stok">Stok Produk</label>
              <input type="number" class="form-control" id="stok" name="stok" value="{{ isset($produk) ? $produk->stok : '' }}">
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
