<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_History extends Model
{
    public $table = "barang_histories";
    protected $fillable = ['id_supplier', 'tanggal_masuk'];

    public function user(){
        return $this->belongsTo('App\User', 'id_pegawai', 'id');
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier', 'id_supplier', 'id');
    }

    public function history_detail()
    {
        return $this->hasMany('App\History_Detail', 'id', 'id_barang_history');
    }
}
