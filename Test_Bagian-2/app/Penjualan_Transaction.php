<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan_Transaction extends Model
{
    public $table = "penjualan_transactions";
    protected $fillable = ['id_customer','id_pegawai','tanggal_transaksi','status','biaya_sparepart','biaya_service','kode_transaksi'];

    public function customer(){
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }

    public function penjualan_detail()
    {
        return $this->hasMany('App\Penjualan_Detail', 'id', 'id_penjualan');
    }

    public function kendaraan_detail()
    {
        return $this->hasMany('App\Kendaraan_Detail', 'id', 'id_penjualan');
    }

    public function service_detail()
    {
        return $this->hasMany('App\Service_Detail', 'id', 'id_penjualan');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_pegawai', 'id');
    }
}
