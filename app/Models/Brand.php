<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_brand';

    protected $table = 'brand';
    protected $fillable = ['nama_brand', 'origin', 'reputasi', 'tahun_berdiri'];

    public function produk()
	{
		return $this->belongsTo(Brand::class, 'fk_brand');
	}
}