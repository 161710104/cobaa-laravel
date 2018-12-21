<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function barang_masuk()
    {
        return $this->hasMany('App\BarangMasuk' ,'id_supplier');
    }
}
