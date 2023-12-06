<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori')->nullable();
            $table->string('tipe')->nullable();
            $table->string('jml_produk')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::table('produk', function(Blueprint $table){
            $table->dropColumn('id_kategori');
            $table->foreignId('fk_kategori')->nullable()->references('id_kategori')->on('kategori');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
