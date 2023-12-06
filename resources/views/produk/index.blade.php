@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('produk.tambah') }}" class="btn btn-primary mb-3">Tambah Produk</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Tanggal Produksi</th>
              <th>ID Kategori</th>
              <th>ID Brand</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->nama_produk }}</td>
                <td>{{ $row->harga }}</td>
                <td>{{ $row->tgl_produksi }}</td>
                <td>{{ $row->stok }}</td>
                <td>{{ $row->kategori ? $row->kategori->nama_kategori : 'Tidak ada kategori' }}</td>
                <td>{{ $row->brand ? $row->brand->nama_brand : 'Tidak ada brand' }}</td>
                <td>
                  <a href="{{ route('produk.edit', $row->id_produk) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('produk.hapus', $row->id_produk) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Tabel Data Produk yang Telah Dihapus -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Produk yang Telah Dihapus</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableDeleted" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Tanggal Produksi</th>
              <th>ID Kategori</th>
              <th>ID Brand</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($deletedData as $deletedRow)
              <tr>
                <td>{{ $deletedRow->nama_produk }}</td>
                <td>{{ $deletedRow->harga }}</td>
                <td>{{ $deletedRow->tgl_produksi }}</td>
                <td>{{ $deletedRow->stok }}</td>
                <td>{{ $deletedRow->kategori ? $deletedRow->kategori->nama_kategori : 'Tidak ada kategori' }}</td>
                <td>{{ $deletedRow->brand ? $deletedRow->brand->nama_brand : 'Tidak ada brand' }}</td>
                <td>
                  <form action="{{ route('produk.restore', $deletedRow->id_produk) }}" method="post" style="display: inline;">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success">Restore</button>
                  </form>

                  <form action="{{ route('produk.hapusPermanent', $deletedRow->id_produk) }}" method="post" style="display: inline;" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Hapus Permanent</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
