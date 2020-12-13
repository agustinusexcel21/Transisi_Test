<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public $table = "saless";
    protected $fillable = ['id_supplier','nama_sales','kontak_sales'];

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'id_supplier', 'id');
    }
}
