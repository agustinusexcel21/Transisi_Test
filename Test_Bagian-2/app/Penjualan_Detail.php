<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan_Detail extends Model
{
    public $table = "penjualan_details";
    protected $fillable = ['id_penjualan','id_sparepart','jumlah_sparepart','harga_sparepart','sub_total'];

    public function penjualan_transaction()
    {
        return $this->belongsTo('App\Penjualan_Transaction', 'id_penjualan', 'id');
    }

    public function sparepart()
    {
        return $this->belongsTo('App\Sparepart', 'id_sparepart', 'id');
    }

    public function pembayaran_transaction()
    {
        return $this->hasMany('App\Pembayaran_Transaction', 'id', 'id_penjualan_detail');
    }
}