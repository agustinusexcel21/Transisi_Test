<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabangs';
    protected $fillable = ['nama_cabang','alamat_cabang'];

    public function user()
    {
        return $this->hasMany('App\User', 'id', 'id_cabang');
    }

    public function pembayaran_transaction()
    {
        return $this->hasMany('App\Pembayaran_Transaction', 'id', 'id_cabang');
    }
}
