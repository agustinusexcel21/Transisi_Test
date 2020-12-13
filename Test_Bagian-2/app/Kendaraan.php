<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    public $table = "kendaraans";
    protected $fillable = ['id_customer','no_polisi','merk','tipe'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }

    public function kendaraan_detail()
    {
        return $this->hasMany('App\Kendaraan_Detail', 'id', 'id_kendaraan');
    }
}
