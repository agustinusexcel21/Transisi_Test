<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan_Detail extends Model
{
    public $table = "pengadaan_details";
    protected $fillable = ['id_pengadaan','id_sparepart','satuan','jumlah_sparepart'];

    public function pengadaan_transaction()
    {
        return $this->belongsTo('App\Pengadaan_Transaction', 'id_pengadaan', 'id');
    }

    public function sparepart()
    {
        return $this->belongsTo('App\Sparepart', 'id_sparepart', 'id');
    }
}
