<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Brand;

class ProdukController extends Controller
{
    // public function index()
    // {
    //     $produk = Produk::withTrashed()->get();
    //     return view('produk.index', ['data' => $produk]);
    // }

    public function index()
    {
        $produk = Produk::get(); // Menampilkan data produk yang belum dihapus
        $deletedData = Produk::onlyTrashed()->get(); // Menampilkan data produk yang sudah dihapus

        return view('produk.index', ['data' => $produk, 'deletedData' => $deletedData]);
    }


    public function tambah()
    {
        $kategori = Kategori::get();
        $brand = Brand::get();
        return view('produk.form', ['kategori' => $kategori, 'brand' => $brand]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'tgl_produksi' => $request->tgl_produksi,
            'stok' => $request->stok,
            'fk_kategori' => $request->fk_kategori,
            'id_brand' => $request->id_brand,
        ];

        Produk::create($data);

        return redirect()->route('produk');
    }

    public function edit($id_produk)
    {
        $produk = Produk::find($id_produk);
        $kategori = Kategori::get();
        $brand = Brand::get();
        return view('produk.form', ['produk' => $produk, 'kategori' => $kategori, 'brand' => $brand]);
    }

    public function update($id_produk, Request $request)
    {
        $produk = Produk::find($id_produk);

        if ($produk) {
            $data = [
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'tgl_produksi' => $request->tgl_produksi,
                'stok' => $request->stok,
                'fk_kategori' => $request->fk_kategori,
                'fk_brand' => $request->fk_brand,
            ];

            $produk->update($data);
            return redirect()->route('produk');
        } else {
            return redirect()->route('produk')->with('error', 'Data tidak ditemukan');
        }
    }

    // public function hapus($id_produk)
    // {
    //     Produk::find($id_produk)->delete();
    //     return redirect()->route('produk');
    // }

    public function hapus($id_produk)
    {
        $produk = Produk::find($id_produk);

        if ($produk) {
            $produk->delete();
            return redirect()->route('produk')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('produk')->with('error', 'Data tidak ditemukan');
        }
    }


    // public function restore($id_produk)
    // {
    //     $produk = Produk::withTrashed()->find($id_produk);

    //     if ($produk) {
    //         $produk->restore();
    //         return redirect()->route('produk')->with('success', 'Data berhasil dipulihkan.');
    //     } else {
    //         return redirect()->route('produk')->with('error', 'Data tidak ditemukan');
    //     }
    // }

    public function restore($id_produk)
    {
        $produk = Produk::withTrashed()->find($id_produk);

        if ($produk) {
            $produk->restore();
            return redirect()->route('produk')->with('success', 'Data berhasil dipulihkan.');
        } else {
            return redirect()->route('produk')->with('error', 'Data tidak ditemukan');
        }
    }


    public function hapusPermanent($id_produk)
    {
        $produk = Produk::withTrashed()->find($id_produk);

        if ($produk) {
            $produk->forceDelete();
            return redirect()->route('produk')->with('success', 'Data berhasil dihapus permanen.');
        } else {
            return redirect()->route('produk')->with('error', 'Data tidak ditemukan');
        }
    }
}
