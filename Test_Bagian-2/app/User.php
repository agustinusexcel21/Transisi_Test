<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_role','id_cabang','nama_pegawai', 'email', 'password', 'alamat_pegawai', 'kontak_pegawai', 'gaji_per_minggu'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role', 'id');
    }

    public function cabang()
    {
        return $this->belongsTo('App\Cabang', 'id_cabang', 'id');
    }

    public function penjualan_transaction()
    {
        return $this->hasMany('App\Penjualan_Transaction', 'id', 'id_pegawai');
    }

    public function pembayaran_transaction()
    {
        return $this->hasMany('App\Pembayaran_Transaction', 'id', 'id_pegawai');
    }

    public function kendaraan_detail()
    {
        return $this->hasMany('App\Kendaraan_Detail', 'id', 'id_pegawai');
    }

}
