<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    public function index()
    {
        // INNER JOIN antara produk, kategori, dan brand
        $result = DB::table('produk')
            ->join('kategori', 'produk.fk_kategori', '=', 'kategori.id_kategori')
            ->join('brand', 'produk.fk_brand', '=', 'brand.id_brand')
            ->select('produk.*', 'kategori.nama_kategori', 'brand.nama_brand')
            ->get();

        return view('join-page.index', ['results' => $result]);
    }
}
