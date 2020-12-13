<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = ['nama_supplier','alamat_supplier', 'kontak_supplier'];

    public function sales()
    {
        return $this->hasMany('App\Sales', 'id', 'id_supplier');
    }

    public function pengadaan_transaction()
    {
        return $this->hasMany('App\Pengadaan_Transaction', 'id', 'id_supplier');
    }

    public function barang_history()
    {
        return $this->hasMany('App\Barang_History', 'id', 'id_supplier');
    }
}
