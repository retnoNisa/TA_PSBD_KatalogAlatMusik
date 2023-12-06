@extends('layouts.app')
@section('tittle', 'Form Brand')

@section('content')
<form action="{{ isset($brand) ? route('brand.tambah.update', $brand->id_brand): route('brand.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($brand)? 'Form Edit Brand': 'Form Tambah Brand' }}</h6>
                </div>
                <div class="card-body">
{{--                     
                    <div class="form-group">
                        <label for="id_brand">ID Brand</label>
                        <input type="text" class="form-control" id="id_brand" name="id_brand" value="{{ isset($brand) ? $brand->id_brand:'' }}">
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="nama_brand">Nama Brand</label>
                        <input type="text" class="form-control" id="nama_brand" name="nama_brand" value="{{ isset($brand) ? $brand->nama_brand:'' }}">
                    </div>
                    <div class="form-group">
                        <label for="origin">origin</label>
                        <input type="text" class="form-control" id="origin" name="origin" value="{{ isset($brand) ? $brand->origin:'' }}">
                    </div>
                    <div class="form-group">
                        <label for="reputasi">Reputasi</label>
                        <input type="text" class="form-control" id="reputasi" name="reputasi" value="{{ isset($brand) ? $brand->reputasi:'' }}">
                    </div>
                    <div class="form-group">
                        <label for="tahun_berdiri">Tahun Berdiri</label>
                        <input type="text" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="{{ isset($brand) ? $brand->tahun_berdiri:'' }}">
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