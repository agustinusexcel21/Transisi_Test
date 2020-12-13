<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Sparepart extends Model
{
    protected $table = 'spareparts';
    protected $fillable = ['kode_sparepart','nama_sparepart', 'merk_sparepart', 'tipe_sparepart', 'kode_lokasi', 'harga_jual', 'harga_beli', 'satuan', 'stock_minimal', 'gambar_sparepart'];

    public function penjualan_detail()
    {
        return $this->hasMany('App\Penjualan_Detail', 'id', 'id_sparepart');
    }

    public function pengadaan_detail()
    {
        return $this->hasMany('App\Pengadaan_Detail', 'id', 'id_sparepart');
    }

    public function history_detail()
    {
        return $this->hasMany('App\History_Detail', 'id', 'id_sparepart');
    }
}
