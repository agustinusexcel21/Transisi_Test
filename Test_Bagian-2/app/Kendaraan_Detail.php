<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan_Detail extends Model
{
    public $table = "kendaraan_details";
    protected $fillable = ['id_penjualan','id_pegawai','id_kendaraan'];

    public function penjualan_transaction()
    {
        return $this->belongsTo('App\Penjualan_Transaction', 'id_penjualan', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_pegawai', 'id');
    }

    public function kendaraan()
    {
        return $this->belongsTo('App\Kendaraan', 'id_kendaraan', 'id');
    }
    
    public function service_detail()
    {
        return $this->hasMany('App\Service_Detail', 'id', 'id_kendaraan_details');
    }
}
