<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_produk';
    protected $table = 'produk';

    protected $fillable = ['nama_produk', 'harga', 'tgl_produksi', 'fk_kategori', 'fk_brand', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'fk_kategori');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'fk_brand');
    }
}