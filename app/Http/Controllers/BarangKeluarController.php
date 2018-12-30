<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Customer;
use App\BarangKeluar;
use Yajra\DataTables\DataTables;
use Auth;
use Session;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_keluars = BarangKeluar::all();
        return view('BarangKeluar/index',['barang_keluars' => $barang_keluars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $customer = Customer::all();
        return view('BarangKeluar/create',[
            'barang' => $barang,
            'customer' => $customer,
        ]);
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
        $barang_keluars = new BarangKeluar;
        $barang_keluars->id_barang          = $request->id_barang[$id];
        $barang_keluars->kuantitas          = $request->kuantitas[$id];
        $barang_keluars->harga         = $request->harga[$id];
        $barang_keluars->id_customer    = $request->id_customer;
        $barang_keluars->id_karyawan    =  $request->id_karyawan;
        $barang_keluars->total = $request->harga[$id] * $request->kuantitas[$id];

        $barang = Barang::findOrFail($request->id_barang[$id]);
        $jumlah =  $barang->kuantitas;
        if ($request->kuantitas[$id] > $barang->kuantitas) {
            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Stock <b>".$barang->nama_barang."</b> tersedia hanya" . "&nbsp = &nbsp<b>" .$jumlah."</b>"
            ]);
            return redirect()->route('barang_keluars.create');
        }else{
        $barang->kuantitas = $barang->kuantitas - $request->kuantitas[$id];
        $barang->save();
        $barang_keluars->save();
        }
        }
        return redirect()->route('barang_keluars.index');
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
        $barang_keluars = BarangKeluar::findorfail($id);
        $barang = Barang::all();
        $customer = Customer::all();
        return view('BarangKeluar/edit',[
            'barang_keluars' => $barang_keluars,
            'barang' => $barang,
            'customer' => $customer,    
        ]);
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
        
        $barang_keluars = BarangKeluar::find($id);
        $barang_keluars->id_barang          = $request->id_barang;
        $barang_keluars->kuantitas          = $request->kuantitas;
        $barang_keluars->harga         = $request->harga;
        $barang_keluars->id_customer    = $request->id_customer;
        $barang_keluars->id_karyawan    =  Auth::user()->id;
        $barang = Barang::findOrFail($request->id_barang);
        $kuantitas_awal = $request->quantity_awal;
        $kuantitas = $request->quantity_awal - $request->kuantitas;
        $barang->kuantitas =  $barang->kuantitas + $kuantitas;
        $barang->harga_beli = $request->harga;
        $barang->save();
        $barang_keluars->save();
        return redirect()->route('barang_keluars.index');
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
        $barang_keluars = BarangKeluar::find($id);
        $barang_keluars->delete();
        return redirect()->route('barang_keluars.index');
    }

    public function table(){
        $barang_keluars = BarangKeluar::with('barang')->with('customer')->with('karyawan')->orderBy('created_at','asc');
        return Datatables::of($barang_keluars)

        ->addColumn('action', function ($barang_keluars) {
              return '<center><a href="/admin/barang_keluars/'.$barang_keluars->id.'/edit" rel="tooltip" title="Edit" class="btn btn-warning btn-simple btn-xs"><i class="fa fa-pencil"></i></a>&nbsp<a href="/admin/barang_keluars/'.$barang_keluars->id.'/delete" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs delete" data-name="'.$barang_keluars->barang->nama_barang.'"><i class="fa fa-trash-o"></i></a></center>';
            })
        ->addColumn('tanggal_keluar', function ($barang_keluars) {
              return date('d F Y' , strtotime($barang_keluars->created_at));
            })
        ->addColumn('harga_jual', function ($barang_keluars) {
             return 'Rp.'. number_format($barang_keluars->harga,'2',',','.');
            })
        ->addColumn('quantity', function ($barang_keluars) {
              return $barang_keluars->kuantitas.'&nbsp'.$barang_keluars->barang->satuan;
            })

        ->rawColumns(['action','tanggal_keluar','harga_jual','quantity'])
        ->make(true);
    }


    public function getDetailCustomer(Request $request){
        $customer = Customer::find($request->id);
        $id_customer = $customer->id;
        $nama = $customer->nama;
        $no_telepon = $customer->no_telepon;
        $alamat = $customer->alamat;
        $awal = date('d F Y' , strtotime($customer->awal));
        $akhir =  date('d F Y' , strtotime($customer->akhir));

          return json_encode([
            "id_customer" => $id_customer,
            "no_telepon" => $no_telepon,
            "nama" => $nama,
            "alamat" => $alamat,
            "awal" => $awal,
            "akhir" => $akhir,

          ]);
    }

    public function getDetailBarang(Request $request){
        $barang = Barang::find($request->id);
        $kuantitas = $barang->kuantitas;
        $harga_jual = $barang->harga_jual;


          return json_encode([
            "harga_jual" => $harga_jual,
            "kuantitas" => $kuantitas,
          ]);
    }

}
