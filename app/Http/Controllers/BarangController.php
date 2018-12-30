<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\LogActivity;
use Auth;
use PDF;
use Excel;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $barangs = Barang::all();
          return view('Barang/index',['barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Barang/create');
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
          'nama_barang' => 'required|min:3|max:30',
          'jenis' => 'required',
          'satuan' => 'required',
          'harga_jual'=>'required|min:3',
        ]);
  
        $barangs = new Barang;
        $barangs->nama_barang    = $request->nama_barang;
        $barangs->jenis          = $request->jenis;
        $barangs->satuan          = $request->satuan;
        $barangs->harga_jual    = $request->harga_jual;
        $barangs->save();
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
        $barangs = Barang::findorfail($id);
        return $barangs;
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
        $barangs = Barang::findorfail($id);
        $barangs->nama_barang    = $request->nama_barang;
        $barangs->jenis          = $request->jenis;
        $barangs->satuan          = $request->satuan;
        $barangs->harga_jual    = $request->harga_jual;
        $barangs->save();
        $insertLog                = new LogActivity();
        $insertLog->user_id       = Auth::user()->id;
        $insertLog->description   = 'Tambah Barang :'.$request->nama_barang;
        $insertLog->save();
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
        $barangs = Barang::find($id);
        $barangs->delete();
        return redirect()->route('barangs.index');
    }
    
    public function delete($id)
    {
        $barangs = Barang::find($id);
        if($barangs->delete())
        {
            echo 'Data Deleted';
        }
    }

    public function table(){
        $barangs = Barang::all();
        return Datatables::of($barangs)

        ->addColumn('action', function ($barangs) {
              return '<center><a href="#" data-id="'.$barangs->id.'" rel="tooltip" title="Edit" class="btn btn-warning btn-simple btn-xs editBarang"><i class="fa fa-pencil"></i></a>&nbsp<a href="#" id="'.$barangs->id.'" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs delete" data-name="'.$barangs->nama_barang.'"><i class="fa fa-trash-o"></i></a></center>';
            })
        ->addColumn('harga_pasar', function ($barangs) {
              return 'Rp.'. number_format($barangs->harga_beli,'2',',','.');
            })
        ->addColumn('harga_jual', function ($barangs) {
              return 'Rp.'. number_format($barangs->harga_jual,'2',',','.');
            })

         // ->addColumn('harga', function ($barangs) {
         //      return 'Rp. {{number_format($projects->price,'.'2'.',',','.')}}';
         //    // })
        ->rawColumns(['action','harga_jual','harga_beli'])
        ->make(true);
    }

    public function downloadPDF(Request $request)
    {
         $barangs = Barang::all();
         
        if($request->view_type === 'download') {
            $pdf = PDF::loadView('Barang.pdf', ['barangs' => $barangs]);
            return $pdf->download('List Barang.pdf');
        } else {
            $view = View('Barang.pdf', ['barangs' => $barangs]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }

    public function downloadExcel()
    {
        $barang = Barang::all();
        return Excel::create('Daftar Harga Barang',function($excel) use ($barang){
            $excel->setTitle('Daftar Harga Barang')
            ->setCreator('Admin');
            $excel->sheet('Daftar Harga Barang', function($sheet) use ($barang){
                $row = 1;
                $sheet->row($row,[
                    'Nama Barang',
                    'Jenis Barang',
                    'Satuan',
                    'Harga'
                ]);
                foreach ($barang as $barangs) {
                    $sheet->row(++$row,[
                        $barangs->nama_barang,
                        $barangs->jenis,
                        $barangs->satuan,
                        $barangs->harga_jual,

                    ]);
                }
            });
        })->export('xls');
    }
}
