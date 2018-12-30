<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasuk;
use App\Barang;
use App\Supplier;
use Yajra\DataTables\DataTables;
use Auth;


class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuks = BarangMasuk::all();
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('BarangMasuk/index',[
            'barang_masuks' => $barang_masuks,
            'barang' => $barang,
            'supplier' => $supplier,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BarangMasuk/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($id = 0; $id < count($request->id_barang); $id++){
        $barang_masuks = new BarangMasuk;
        $barang_masuks->id_barang          = $request->id_barang[$id];
        $barang_masuks->kuantitas          = $request->kuantitas[$id];
        $barang_masuks->harga         = $request->harga[$id];
        $barang_masuks->id_supplier    = $request->id_supplier;
        $barang_masuks->id_karyawan    =  $request->id_karyawan;
        $barang_masuks->total = $request->harga[$id] * $request->kuantitas[$id];

        $barang = Barang::findOrFail($request->id_barang[$id]);
        $barang->kuantitas = $barang->kuantitas + $request->kuantitas[$id];
        $barang->harga_beli = $request->harga[$id];
        $barang->save();
        $barang_masuks->save();
        }
        return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_masuks = BarangMasuk::find($id);
        return $barang_masuks;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $barang_masuks = BarangMasuk::find($id);
        $barang_masuks->id_barang          = $request->id_barang;
        $barang_masuks->harga         = $request->harga;  
        $barang_masuks->kuantitas          = $request->kuantitas;
        $barang_masuks->id_supplier    = $request->id_supplier;
        $barang_masuks->id_karyawan    =  $request->id_karyawan;
        $barang = Barang::findOrFail($request->id_barang);
        $kuantitas_awal = $request->quantity_awal;
        $kuantitas = $request->quantity_awal - $request->kuantitas;
        $barang->kuantitas =  $barang->kuantitas - $kuantitas;
        $barang->harga_beli = $request->harga;
        $barang->save();
        $barang_masuks->save();
        return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $barang_masuks = BarangMasuk::find($id);
        $barang = Barang::findOrFail($barang_masuks->id_barang);
        $barang->kuantitas =  $barang->kuantitas - $barang_masuks->kuantitas;
        $barang->save();
         if($barang_masuks->delete())
        {
            echo 'Data Deleted';
        }
    }

    public function table(){
        $barang_masuks = BarangMasuk::with('barang')->with('supplier')->with('karyawan')->orderBy('created_at','asc');
        return Datatables::of($barang_masuks)

        ->addColumn('action', function ($barang_masuks) {
              return '<center><a href="#" data-id="'.$barang_masuks->id.'" rel="tooltip" title="Edit" class="btn btn-warning btn-simple btn-xs editBarang"><i class="fa fa-pencil"></i></a>&nbsp<a href="#" id="'.$barang_masuks->id.'" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs delete" data-name="'.$barang_masuks->id.'"><i class="fa fa-trash-o"></i></a></center';
            })
        ->addColumn('tanggal_masuk', function ($barang_masuks) {
              return date('d F Y' , strtotime($barang_masuks->created_at));
            })
        ->addColumn('harga_pasar', function ($barang_masuks) {
              return 'Rp.'. number_format($barang_masuks->harga);
            })
        ->addColumn('quantity', function ($barang_masuks) {
              return $barang_masuks->kuantitas.'&nbsp'.$barang_masuks->barang->satuan;
            })

        ->rawColumns(['action','tanggal_masuk','harga_pasar','quantity'])
        ->make(true);
    }

    public function getDetailSupplier(Request $request){
        $supplier = Supplier::find($request->id);
        $id_supplier = $supplier->id;
        $nama = $supplier->nama;
        $no_telepon = $supplier->no_telepon;
        $alamat = $supplier->alamat;

          return json_encode([
            "id_supplier" => $id_supplier,
            "no_telepon" => $no_telepon,
            "nama" => $nama,
            "alamat" => $alamat,

          ]);
    }
}
