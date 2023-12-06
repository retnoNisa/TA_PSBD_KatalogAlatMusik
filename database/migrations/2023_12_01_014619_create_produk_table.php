<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk')->nullable();
            $table->string('harga')->nullable();
            $table->string('tgl_produksi')->nullable();
            $table->string('stok')->nullable();
            $table->string('id_kategori')->nullable();
            $table->string('id_brand')->nullable();
            $table->softDeletes(); // Menambahkan kolom soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
