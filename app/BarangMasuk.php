<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    public function barang()
    {
        return $this->belongsTo('App\Barang' ,'id_barang');
    }

    public function karyawan()
    {
        return $this->belongsTo('App\User' ,'id_karyawan');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier' ,'id_supplier');
    }
}
