<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\BarangKeluar;
use App\Barang;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('Customer/index',['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'nama' => 'required|min:3|max:30',
          'alamat' => 'required',
          'no_telepon' => 'required|min:11',
          'awal'=>'required',
          'akhir' =>'required'
        ]);
  
        $customers = new Customer;
        $customers->nama          = $request->nama;
        $customers->alamat          = $request->alamat;
        $customers->no_telepon          = $request->no_telepon;
        $customers->awal    = $request->awal;
        $customers->akhir = $request->akhir;
          if ($request->status!="" or $request->status!=null) {
            $customers->status = $request->status;
          }else {
            $customers->status = 'Activate';
          }
        $customers->save();
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
        $customers = Customer::findorfail($id);
        return view('Customer/show',['customers' => $customers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::find($id);
        return $customers;
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
        $customers = Customer::findorfail($id);
        $customers->nama          = $request->nama;
        $customers->alamat          = $request->alamat;
        $customers->no_telepon          = $request->no_telepon;
        $customers->awal    = $request->awal;
        $customers->akhir = $request->akhir;
        $customers->save();
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

    public function lihat($id)
    {
        $customers = Customer::findorfail($id);
        // $barang = BarangKeluar::select('id_barang')->join('barangs', 'barangs.id', '=', 'barang_keluars.id_barang')
        // ->GROUPBY('barang_keluars.tanggal_keluar')->where('id_customer',$id)->get();
        return view('Customer/show',[
            'customers' => $customers,
            // 'nama_barang' => $barang,
        ]);
    }

    // public function redirect($id)
    // {
    //     $customer = Customer::findorfail($id);
    //     $barang = Barang::all();
    //     return view('BarangKeluar/create',[
    //         'barang' => $barang,
    //         'customer' => $customer,
    //     ]);
    // }

    public function delete($id)
    {
        $customers = Customer::find($id);
         if($customers->delete())
        {
            echo 'Data Deleted';
        }
    }

    public function table(){
        $customers = Customer::all();
        return Datatables::of($customers)

        ->addColumn('action', function ($customers) {
              return '<center><a href="#" data-id="'.$customers->id.'" rel="tooltip" title="Edit"  class="btn btn-warning btn-simple btn-xs editCustomer"><i class="fa fa-pencil"></i></a>&nbsp<a href="/admin/customers/'.$customers->id.'/lihat" rel="tooltip" title="Lihat" class="btn btn-info btn-simple btn-xs"><i class="fa fa-eye"></i></a>&nbsp<a href="#" id="'.$customers->id.'" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs delete" data-name="'.$customers->nama.'"><i class="fa fa-trash-o"></i></a></center>';
            })

        ->addColumn('statuss', function ($customers) {
              if ($customers->status=="Activate") {
                return '<center><a href="admin/customers/'.$customers->id.'/deactivate" class="btn btn-danger btn-xs" name="status">Deactivate</a></center>';
              }elseif ($customers->status=="Deactivate") {
                return '<center><a href="admin/customers/'.$customers->id.'/activate" class="btn btn-success btn-xs" name="status">Activate</a></center>';
              }
            })

        ->addColumn('awal_kerjasama', function ($customers) {
              return date('d F Y' , strtotime($customers->awal));
            })
        ->addColumn('akhir_kerjasama', function ($customers) {
              return date('d F Y' , strtotime($customers->akhir));
            })
        ->rawColumns(['action','awal_kerjasama','akhir_kerjasama','statuss'])
        ->make(true);
    }
}
