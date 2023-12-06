<?php

namespace App\Models;

class Search
{
    public static function search($query)
    {
        // Sesuaikan dengan model dan kolom yang ingin Anda cari
        $Produk = Produk::where('name', 'like', '%' . $query . '%')->get();
        $user = User::where('name', 'like', '%' . $query . '%')->get();

        return [
            'Produk' => $Produk,
            'user' => $user,
            // Tambahkan jenis data lain yang ingin Anda cari di sini
        ];
    }
}
