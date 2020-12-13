<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai')->index();
            $table->integer('id_cabang')->index();
            $table->integer('id_penjualan')->index();
            $table->date('tanggal_pembayaran');
            $table->timestamp('waktu_pembayaran');
            $table->float('total_biaya');
            $table->float('diskon');
            $table->float('total_akhir');
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
        Schema::dropIfExists('pembayaran_transactions');
    }
}
