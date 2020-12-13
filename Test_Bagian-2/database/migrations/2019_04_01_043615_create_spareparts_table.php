<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("kode_sparepart",6);
            $table->string("nama_sparepart",20);
            $table->string("merk_sparepart",20);
            $table->string("tipe_sparepart",20);
            $table->string("kode_lokasi",12);
            $table->float("harga_jual");
            $table->float("harga_beli");
            $table->string("satuan",10);
            $table->integer("stock");
            $table->integer("stock_minimal");
            $table->string("gambar_sparepart");
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
        Schema::dropIfExists('spareparts');
    }
}
