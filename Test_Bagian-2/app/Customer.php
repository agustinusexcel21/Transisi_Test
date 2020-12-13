<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['nama_customer','alamat_customer', 'kontak_customer'];

    public function kendaraan()
    {
        return $this->hasMany('App\Kendaraan', 'id', 'id_customer');
    }

    public function penjualan_transaction(){   
        return $this->hasMany('App\Penjualan_Transaction', 'id', 'id_customer');
    }
}
