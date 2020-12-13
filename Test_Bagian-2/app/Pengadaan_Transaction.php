<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan_Transaction extends Model
{
    public $table = "pengadaan_transactions";
    protected $fillable = ['id_supplier','tanggal_pengadaan','status_cetak', 'kode_pengadaan'];

    public function supplier(){
        return $this->belongsTo('App\Supplier', 'id_supplier', 'id');
    }

    public function pengadaan_detail()
    {
        return $this->hasMany('App\Pengadaan_Detail', 'id', 'id_pengadaan');
    }
}
