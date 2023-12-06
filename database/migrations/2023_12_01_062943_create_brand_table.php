<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->id('id_brand');
            //$table->string('id_brand')->nullable();
            $table->string('nama_brand')->nullable();
            $table->string('origin')->nullable();
            $table->string('reputasi')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->timestamps();
        });

        Schema::table('produk', function(Blueprint $table){
            $table->dropColumn('id_brand');
            $table->foreignId('fk_brand')->nullable()->references('id_brand')->on('brand');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand');
    }
};