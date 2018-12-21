<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{

    public function barang_masuk()
    {
        return $this->hasMany('App\BarangMasuk' ,'id_barang');
    }

    public function barang_keluar()
    {
        return $this->hasMany('App\BarangKeluar' ,'id_barang');
    }
}
