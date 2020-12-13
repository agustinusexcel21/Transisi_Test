<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran_Transaction extends Model
{
    public $table = "pembayaran_transactions";
    protected $fillable = ['id_pegawai','id_cabang','id_penjualan_detail','id_service_detail','tanggal_pembayaran','waktu_pembayaran','total_biaya','diskon','total_akhir'];

    public function user(){
        return $this->belongsTo('App\User', 'id_pegawai', 'id');
    }

    public function cabang(){
        return $this->belongsTo('App\Cabang', 'id_cabang', 'id');
    }

    public function penjualan_detail(){
        return $this->belongsTo('App\Penjualan_Detail', 'id_penjualan_detail', 'id');
    }

    public function service_detail(){
        return $this->belongsTo('App\Service_Detail', 'id_service_detail', 'id');
    }
}
