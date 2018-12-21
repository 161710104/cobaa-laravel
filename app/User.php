<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{

    use LaratrustUserTrait;
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function barang_masuk()
    {
        return $this->hasMany('App\BarangMasuk' ,'id_karyawan');
    }

    public function barang_keluar()
    {
        return $this->hasMany('App\BarangKeluar' ,'id_karyawan');
    }
}
