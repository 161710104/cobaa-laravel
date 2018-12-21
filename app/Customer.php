<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    public function barang_keluar()
    {
        return $this->hasMany('App\BarangKeluar' ,'id_barang');
    }
}
