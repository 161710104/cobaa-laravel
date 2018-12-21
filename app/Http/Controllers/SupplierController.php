<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Yajra\DataTables\DataTables;
use Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('Supplier/index',['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Supplier/create');
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
          ]);
    
          $suppliers = new Supplier;
          $suppliers->nama          = $request->nama;
          $suppliers->alamat          = $request->alamat;
          $suppliers->no_telepon          = $request->no_telepon;
          $suppliers->save();
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
        $suppliers = Supplier::find($id);
        return $suppliers;
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
        $suppliers = Supplier::find($id);        
        $suppliers->nama          = $request->nama;
        $suppliers->alamat          = $request->alamat;
        $suppliers->no_telepon          = $request->no_telepon;
        $suppliers->save();
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

    public function delete(Request $request)
    {
        $suppliers = Supplier::find($request->input('id'));
        if($suppliers->delete())
        {
            echo 'Data Deleted';
        }
    }

    public function table(){
        $suppliers = Supplier::all();
        return Datatables::of($suppliers)

        ->addColumn('action', function ($suppliers) {
              return '<center><a href="#" data-id="'.$suppliers->id.'" rel="tooltip" title="Edit" 
                        class="btn btn-warning btn-simple btn-xs editSupplier"><i class="fa fa-pencil"></i></a>
                    &nbsp<a href="#" id="'.$suppliers->id.'" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs delete"><i class="fa fa-trash-o"></i></a></center>';
            })
        ->rawColumns(['action'])
        ->make(true);
    }
    
}
