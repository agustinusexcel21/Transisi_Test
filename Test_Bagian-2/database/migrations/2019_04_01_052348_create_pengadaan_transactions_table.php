<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengadaanTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaan_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_supplier')->index();
            $table->date('tanggal_pengadaan');
            $table->enum('status_cetak',['SUDAH CETAK','BELUM CETAK']);
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
        Schema::dropIfExists('pengadaan_transactions');
    }
}
