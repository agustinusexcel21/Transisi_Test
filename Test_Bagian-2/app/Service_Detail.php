<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_Detail extends Model
{
    public $table = "service_details";
    protected $fillable = ['id_penjualan','id_service','id_kendaraan_details','harga_service','sub_total'];

    public function penjualan_transaction()
    {
        return $this->belongsTo('App\Penjualan_Transaction', 'id_service', 'id');
    }

    public function kendaraan_detail()
    {
        return $this->belongsto('App\Kendaraan_Detail', 'id_kendaraan_detail', 'id');
    }

    public function service()
    {
        return $this->belongsTo('App\Service', 'id_service', 'id');
    }

    public function pembayaran_transaction()
    {
        return $this->hasMany('App\Pembayaran_Transaction', 'id', 'id_penjualan_detail');
    }
}
