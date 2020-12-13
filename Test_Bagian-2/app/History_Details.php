<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_Details extends Model
{
    public $table = "history_details";
    protected $fillable = ['id_barang_history',	'id_sparepart',	'satuan'];

    public function barang_history()
    {
        return $this->belongsTo('App\Barang_History', 'id_barang_history', 'id');
    }

    public function sparepart()
    {
        return $this->belongsTo('App\Sparepart', 'id_sparepart', 'id');
    }
}
