<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangKeluar;
use App\Barang;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use PDF;
use Excel;

class LaporanPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $barang_keluar = BarangKeluar::whereBetween('created_at', [$dari, $sampai])->get();
        $barang_keluars =  BarangKeluar::whereDate('created_at', Carbon::today())->get();
        $satuan_ikat =  Barang::join('barang_keluars', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereDate('barang_keluars.created_at', Carbon::today())
                          ->where('barangs.satuan','Ikat')
                          ->get();
        $satuan_kg =  Barang::join('barang_keluars', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereDate('barang_keluars.created_at', Carbon::today())
                          ->where('barangs.satuan','Kilogram')
                          ->get();
        $jenis_sayur =  BarangKeluar::join('barangs', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereDate('barang_keluars.created_at', Carbon::today())
                          ->where('barangs.jenis','Sayur')
                          ->get();
        $jenis_buah =  BarangKeluar::join('barangs', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereDate('barang_keluars.created_at', Carbon::today())
                          ->where('barangs.jenis','Buah')
                          ->get();
        return view('Laporan_Pemasukan/index',[
                      'barang_keluar' => $barang_keluar,
                      'barang_keluars' => $barang_keluars,
                      'satuan_ikat' => $satuan_ikat,
                      'satuan_kg' => $satuan_kg,
                      'jenis_sayur' => $jenis_sayur,
                      'jenis_buah' => $jenis_buah,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function index2(Request $request)
    {
        //
        $dari = $request->dari;
        $sampai = $request->sampai;
        $barang_keluar = BarangKeluar::whereBetween('created_at', [$dari, $sampai])->get();
        $satuan_ikat =  Barang::join('barang_keluars', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereBetween('barang_keluars.created_at', [$dari, $sampai])
                          ->where('barangs.satuan','Ikat')
                          ->get();
        $satuan_kg =  Barang::join('barang_keluars', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereBetween('barang_keluars.created_at', [$dari, $sampai])
                          ->where('barangs.satuan','Kilogram')
                          ->get();
        $jenis_sayur =  BarangKeluar::join('barangs', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereBetween('barang_keluars.created_at', [$dari, $sampai])
                          ->where('barangs.jenis','Sayur')
                          ->get();
        $jenis_buah =  BarangKeluar::join('barangs', 'barangs.id', '=' , 'barang_keluars.id_barang')
                          ->whereBetween('barang_keluars.created_at', [$dari, $sampai])
                          ->where('barangs.jenis','Buah')
                          ->get();
        return response()->json([
                            'success'=>true,
                            'dari' => $dari,
                            'sampai' => $sampai,
                            'barang_keluar' => $barang_keluar,
                            'satuan_ikat' => $satuan_ikat,
                            'satuan_kg' => $satuan_kg,
                            'jenis_sayur' => $jenis_sayur,
                          ]); 
    }

    public function table(){
        $barang_keluars = BarangKeluar::with('barang')
                            ->with('customer')
                            ->with('karyawan')
                            ->orderBy('created_at','asc')
                            ->whereDate('created_at', Carbon::today())->get();
        return Datatables::of($barang_keluars)

        ->addColumn('tanggal_keluar', function ($barang_keluars) {
              return date('d F Y' , strtotime($barang_keluars->created_at));
            })
        ->addColumn('harga_jual', function ($barang_keluars) {
             return 'Rp.'. number_format($barang_keluars->harga,'2',',','.');
            })
        ->addColumn('total_harga', function ($barang_keluars) {
             return 'Rp.'. number_format($barang_keluars->total,'2',',','.');
            })
        ->addColumn('quantity', function ($barang_keluars) {
              return $barang_keluars->kuantitas.'&nbsp'.$barang_keluars->barang->satuan;
            })

        ->rawColumns(['action','tanggal_keluar','harga_jual','quantity','total_harga'])
        ->make(true);
    }

    public function table2(Request $request){
        $barang_keluars = BarangKeluar::with('barang')
                            ->with('customer')
                            ->with('karyawan')
                            ->orderBy('created_at','asc');
        return Datatables::of($barang_keluars)

        ->addColumn('tanggal_keluar', function ($barang_keluars) {
              return date('d F Y' , strtotime($barang_keluars->created_at));
            })
        ->addColumn('harga_jual', function ($barang_keluars) {
             return 'Rp.'. number_format($barang_keluars->harga,'2',',','.');
            })
        ->addColumn('total_harga', function ($barang_keluars) {
             return 'Rp.'. number_format($barang_keluars->total,'2',',','.');
            })
        ->addColumn('quantity', function ($barang_keluars) {
              return $barang_keluars->kuantitas.'&nbsp'.$barang_keluars->barang->satuan;
            })

        ->rawColumns(['action','tanggal_keluar','harga_jual','quantity','total_harga'])
        ->make(true);
    }



    public function downloadPDF(Request $request)
    {
        $barang_keluars = BarangKeluar::whereDate('created_at', Carbon::today())->get();
         
        if($request->view_type === 'download') {
            $pdf = PDF::loadView('Laporan_Pemasukan.pdf', ['barang_keluars' => $barang_keluars]);
            return $pdf->download('Laporan_Pemasukan.pdf');
        } else {
            $view = View('Laporan_Pemasukan.pdf', ['barang_keluars' => $barang_keluars]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }

    public function downloadPDF2(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $barang_keluars = BarangKeluar::whereBetween('created_at', [$dari, $sampai])->get();
        $pdf = PDF::loadView('Laporan_Pemasukan.pdf2', [
                'barang_keluars' => $barang_keluars,
                'dari' => $dari,
                'sampai' => $sampai,
              ]);
        return $pdf->download('Laporan_Pemasukan.pdf');
    }

    public function downloadExcel()
    {
        $barang_masuk = BarangKeluar::with('barang')
                            ->with('customer')
                            ->with('karyawan')
                            ->orderBy('created_at','asc')   
                            ->whereDate('created_at', Carbon::today())->get();
        return Excel::create('Laporan Pemasukan',function($excel) use ($barang_masuk){
            $excel->setTitle('Laporan Pemasukan')
            ->setCreator('Admin');
            $excel->sheet('Laporan_Pemasukan', function($sheet) use ($barang_masuk){
                $row = 1;
                $sheet->row($row,[
                    'Nama Barang',
                    'Jenis',
                    'kuantitas',
                    'Harga',
                    'Total Harga',
                    'Nama Customer'
                ]);
                foreach ($barang_masuk as $item) {
                    $sheet->row(++$row,[
                        $item->barang->nama_barang,
                        $item->barang->jenis,
                        $item->kuantitas,
                        $item->harga,
                        $item->total,
                        $item->customer->nama,

                    ]);
                }
            });
        })->export('xls');
    }
}
