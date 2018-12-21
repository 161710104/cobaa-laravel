<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;
use Carbon\Carbon;
use App\BarangKeluar;
use App\BarangMasuk;
use App\Customer;
use App\Supplier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lap_pemasukan=  BarangKeluar::whereDate('created_at', Carbon::today())->get();
        $lap_pengeluaran=  BarangMasuk::whereDate('created_at', Carbon::today())->get();
        $barang_keluar = BarangKeluar::whereDate('created_at', Carbon::today())->get();
        $barang_masuk = BarangMasuk::whereDate('created_at', Carbon::today())->get();
        $customer = Customer::all();
        $supplier = Supplier::all();
        if (Laratrust::hasRole('admin')){
            return view('dashboard.admin',[
                'lap_pengeluaran' => $lap_pengeluaran,
                'lap_pemasukan' => $lap_pemasukan,
                'barang_masuk' => $barang_masuk,
                'barang_keluar' => $barang_keluar,
            ]);
        }
        else if (Laratrust::hasRole('karyawan')){
            return view('dashboard.karyawan',[
                'lap_pengeluaran' => $lap_pengeluaran,
                'lap_pemasukan' => $lap_pemasukan,
                'barang_masuk' => $barang_masuk,
                'barang_keluar' => $barang_keluar,
                'customer' => $customer,
                'supplier' => $supplier,
            ]);          
        }
        else if (Laratrust::hasRole('superadmin')){
            return view('dashboard.karyawan');          
        }         
    }
}
