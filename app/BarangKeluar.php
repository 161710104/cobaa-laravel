<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer' ,'id_customer');
    }

    public function karyawan()
    {
        return $this->belongsTo('App\User' ,'id_karyawan');
    }

    public function barang()
    {
        return $this->belongsTo('App\Barang' ,'id_barang');
    }
}
