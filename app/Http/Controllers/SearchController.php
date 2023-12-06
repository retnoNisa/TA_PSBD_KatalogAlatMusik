<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
// public function index(Request $request)
// {
//     $query = $request->input('query');

//     // Cari data di brand, kategori, dan produk
//     $results = Produk::select('produk.*', 'kategori.nama_kategori', 'brand.nama_brand')
//         ->leftJoin('kategori', 'produk.fk_kategori', '=', 'kategori.id_kategori')
//         ->leftJoin('brand', 'produk.fk_brand', '=', 'brand.id_brand')
//         ->where('produk.nama_produk', 'LIKE', "%$query%")
//         ->orWhere('kategori.nama_kategori', 'LIKE', "%$query%")
//         ->orWhere('brand.nama_brand', 'LIKE', "%$query%")
//         ->get();

//     return view('search.index', compact('results'));
// }

public function index(Request $request)
{
    $query = $request->input('query');

    // Cari data di brand, kategori, dan produk
    $brands = Brand::where('nama_brand', 'LIKE', "%$query%")->get();
    $categories = Kategori::where('nama_kategori', 'LIKE', "%$query%")->get();
    $products = Produk::select('produk.*', 'kategori.nama_kategori', 'brand.nama_brand')
        ->leftJoin('kategori', 'produk.fk_kategori', '=', 'kategori.id_kategori')
        ->leftJoin('brand', 'produk.fk_brand', '=', 'brand.id_brand')
        ->where('produk.nama_produk', 'LIKE', "%$query%")
        ->orWhere('kategori.nama_kategori', 'LIKE', "%$query%")
        ->orWhere('brand.nama_brand', 'LIKE', "%$query%")
        ->get();

    return view('search.index', compact('brands', 'categories', 'products'));
}



}
