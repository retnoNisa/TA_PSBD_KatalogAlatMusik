@extends('layouts.app')

@section('title', 'Data Brand')

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Brand</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('brand.tambah') }}" class="btn btn-primary mb-3">Tambah Brand</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID Brand</th>
                <th>Nama Brand</th>
                <th>Origin</th>
                <th>Reputasi</th>
                <th>Tahun Berdiri</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->nama_brand }}</td>
                <td>{{ $row->origin }}</td>
                <td>{{ $row->reputasi }}</td>
                <td>{{ $row->tahun_berdiri }}</td>
                
                <td>
                  <a href="{{ route('brand.edit', $row->id_brand) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('brand.hapus', $row->id_brand) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Tabel Data Brand yang Telah Dihapus -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Brand yang Telah Dihapus</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableDeleted" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Nama Brand</th>
                <th>Origin</th>
                <th>Reputasi Produk</th>
                <th>Tahun Berdiri</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($deletedData as $deletedRow)
              <tr>
                <td>{{ $deletedRow->nama_brand }}</td>
                <td>{{ $deletedRow->origin }}</td>
                <td>{{ $deletedRow->reputasi }}</td>
                <td>{{ $deletedRow->tahun_berdiri }}</td>
                
                <td>
                  <form action="{{ route('brand.restore', $deletedRow->id_brand) }}" method="post" style="display: inline;">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success">Restore</button>
                  </form>

                  <form action="{{ route('brand.hapusPermanent', $deletedRow->id_brand) }}" method="post" style="display: inline;" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen data ini?')">
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
