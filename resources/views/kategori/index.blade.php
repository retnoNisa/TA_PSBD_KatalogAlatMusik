@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('kategori.tambah') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>tipe</th>
                <th>Jumlah Produk</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->nama_kategori }}</td>
                <td>{{ $row->tipe }}</td>
                <td>{{ $row->jml_produk }}</td>
                <td>{{ $row->deskripsi }}</td>
                
                <td>
                  <a href="{{ route('kategori.edit', $row->id_kategori) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('kategori.hapus', $row->id_kategori) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Tabel Data Kategori yang Telah Dihapus -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Kategori yang Telah Dihapus</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableDeleted" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Kategori</th>
              <th>Tipe</th>
              <th>Jumlah Produk</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($deletedData as $deletedRow)
              <tr>
                <td>{{ $deletedRow->nama_kategori }}</td>
                <td>{{ $deletedRow->tipe }}</td>
                <td>{{ $deletedRow->jml_produk }}</td>
                <td>{{ $deletedRow->deskripsi }}</td>
                
                <td>
                  <form action="{{ route('kategori.restore', $deletedRow->id_kategori) }}" method="post" style="display: inline;">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success">Restore</button>
                  </form>

                  <form action="{{ route('kategori.hapusPermanent', $deletedRow->id_kategori) }}" method="post" style="display: inline;" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen data ini?')">
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
