<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get(); 
        $deletedData = Kategori::onlyTrashed()->get(); 
        return view('kategori.index', ['data' => $kategori, 'deletedData' => $deletedData]);
    }

    public function tambah() {
        return view('kategori.form');
    }

    public function simpan(Request $request){
        $data = [
            'nama_kategori' => $request->nama_kategori,
            'tipe' => $request->tipe,
            'jml_produk' => $request->jml_produk,
            'deskripsi' => $request->deskripsi,
        ];

        Kategori::create($data);

        return redirect()->route('kategori');
    }

    public function edit($id_kategori) {
        $kategori = Kategori::find($id_kategori);

        if ($kategori) {
            return view('kategori.form', ['kategori' => $kategori]);
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('kategori')->with('error', 'Data tidak ditemukan');
        }
    }

    public function update($id_kategori, Request $request) {
        $kategori = Kategori::find($id_kategori);

        if ($kategori) {
            $data = [
                'nama_kategori' => $request->nama_kategori,
                'tipe' => $request->tipe,
                'jml_produk' => $request->jml_produk,
                'deskripsi' => $request->deskripsi,
            ];

            $kategori->update($data);
            return redirect()->route('kategori');
        } else {
            // Handle jika data tidak ditemukan
            return redirect()->route('kategori')->with('error', 'Data tidak ditemukan');
        }
    }

    public function hapus($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);

        if ($kategori) {
            $kategori->delete();
            return redirect()->route('kategori')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('kategori')->with('error', 'Data tidak ditemukan');
        }
    }

    public function restore($id_kategori)
    {
        $kategori = Kategori::withTrashed()->find($id_kategori);

        if ($kategori) {
            $kategori->restore();
            return redirect()->route('kategori')->with('success', 'Data berhasil dipulihkan.');
        } else {
            return redirect()->route('kategori')->with('error', 'Data tidak ditemukan');
        }
    }


    public function hapusPermanent($id_kategori)
    {
        $kategori = Kategori::withTrashed()->find($id_kategori);

        if ($kategori) {
            $kategori->forceDelete();
            return redirect()->route('kategori')->with('success', 'Data berhasil dihapus permanen.');
        } else {
            return redirect()->route('kategori')->with('error', 'Data tidak ditemukan');
        }
    }

}
