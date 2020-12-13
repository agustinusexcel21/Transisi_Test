<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['nama_service', 'harga_service'];

    public function service_detail()
    {
        return $this->hasMany('App\Service_Detail', 'id', 'id_service');
    }
}
