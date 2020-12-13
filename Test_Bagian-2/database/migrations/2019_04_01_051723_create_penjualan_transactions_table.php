<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->index();
            $table->integer('id_pegawai')->index();
            $table->date('tanggal_transaksi');
            $table->timestamp('waktu_transaksi');
            $table->enum('status',['PROSES','SELESAI']);
            $table->float('biaya_sparepart');
            $table->float('biaya_service');         
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
        Schema::dropIfExists('penjualan_transactions');
    }
}
