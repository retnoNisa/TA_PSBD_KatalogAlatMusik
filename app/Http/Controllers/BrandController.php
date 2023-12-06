<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::get(); 
        $deletedData = Brand::onlyTrashed()->get(); 
        return view('brand.index', ['data' => $brand, 'deletedData' => $deletedData]);
    }

    public function tambah() {
        return view('brand.form');
    }

    public function simpan(Request $request){
        $data = [
            'nama_brand'=>$request->nama_brand,
            'origin'=>$request->origin,
            'reputasi'=>$request->reputasi,
            'tahun_berdiri'=>$request->tahun_berdiri,
        ];

        Brand::create($data);

        return redirect()->route('brand');
    }

    public function edit($id_brand) {
        $brand = Brand::find($id_brand);

        if ($brand) {
            return view('brand.form', ['brand' => $brand]);
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('brand')->with('error', 'Data tidak ditemukan');
        }
    }

    public function update($id_brand, Request $request) {
        $brand = Brand::find($id_brand);

        if ($brand) {
            $data = [
                'nama_brand'=>$request->nama_brand,
                'origin'=>$request->origin,
                'reputasi'=>$request->reputasi,
                'tahun_berdiri'=>$request->tahun_berdiri,
            ];

            $brand->update($data);
            return redirect()->route('brand');
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('brand')->with('error', 'Data tidak ditemukan');
        }
    }

    public function hapus($id_brand)
    {
        $brand = Brand::find($id_brand);

        if ($brand) {
            $brand->delete();
            return redirect()->route('brand')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('brand')->with('error', 'Data tidak ditemukan');
        }
    }

    public function restore($id_brand)
    {
        $brand = Brand::withTrashed()->find($id_brand);

        if ($brand) {
            $brand->restore();
            return redirect()->route('brand')->with('success', 'Data berhasil dipulihkan.');
        } else {
            return redirect()->route('brand')->with('error', 'Data tidak ditemukan');
        }
    }


    public function hapusPermanent($id_brand)
    {
        $brand = Brand::withTrashed()->find($id_brand);

        if ($brand) {
            $brand->forceDelete();
            return redirect()->route('brand')->with('success', 'Data berhasil dihapus permanen.');
        } else {
            return redirect()->route('brand')->with('error', 'Data tidak ditemukan');
        }
    }
}
