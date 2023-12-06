<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Kategori extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_kategori';

    protected $table = 'kategori';
    protected $fillable = ['nama_kategori', 'tipe', 'jml_produk', 'deskripsi'];

    public function produk()
	{
		return $this->belongsTo(Kategori::class, 'fk_kategori');
	}
}