<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasuk;
use App\Barang;
use PDF;
use Excel;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class LaporanPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk =  BarangMasuk::whereDate('created_at', Carbon::today())->get();
        $satuan_ikat =  Barang::join('barang_masuks', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereDate('barang_masuks.created_at', Carbon::today())
                          ->where('barangs.satuan','Ikat')
                          ->get();
        $satuan_kg =  Barang::join('barang_masuks', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereDate('barang_masuks.created_at', Carbon::today())
                          ->where('barangs.satuan','Kilogram')
                          ->get();
        $jenis_sayur =  BarangMasuk::join('barangs', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereDate('barang_masuks.created_at', Carbon::today())
                          ->where('barangs.jenis','Sayur')
                          ->get();
        $jenis_buah =  BarangMasuk::join('barangs', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereDate('barang_masuks.created_at', Carbon::today())
                          ->where('barangs.jenis','Buah')
                          ->get();
        return view('Laporan_Pengeluaran/index',[
                      'barang_masuk' => $barang_masuk,
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
        $dari = $request->dari;
        $sampai = $request->sampai;
        $barang_masuks = BarangMasuk::with('barang')
                            ->with('supplier')
                            ->with('karyawan')
                            ->orderBy('created_at','asc')   
                            ->whereBetween('created_at', [$dari, $sampai])->get();
        $satuan_ikat =  Barang::join('barang_masuks', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereBetween('barang_masuks.created_at', [$dari, $sampai])
                          ->where('barangs.satuan','Ikat')
                          ->get();
        $satuan_kg =  Barang::join('barang_masuks', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereBetween('barang_masuks.created_at', [$dari, $sampai])
                          ->where('barangs.satuan','Kilogram')
                          ->get();
        $jenis_sayur =  BarangMasuk::join('barangs', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereBetween('barang_masuks.created_at', [$dari, $sampai])
                          ->where('barangs.jenis','Sayur')
                          ->get();
        $jenis_buah =  BarangMasuk::join('barangs', 'barangs.id', '=' , 'barang_masuks.id_barang')
                          ->whereBetween('barang_masuks.created_at', [$dari, $sampai])
                          ->where('barangs.jenis','Buah')
                          ->get();
        return view('Laporan_Pengeluaran/index2',[
                      'dari' => $dari,
                      'sampai' => $sampai,
                      'barang_masuks' => $barang_masuks,
                      'satuan_ikat' => $satuan_ikat,
                      'satuan_kg' => $satuan_kg,
                      'jenis_sayur' => $jenis_sayur,
                      'jenis_buah' => $jenis_buah,
        ]);   
    }

    public function downloadPDF(Request $request)
    {
        $barang_masuks = BarangMasuk::whereDate('created_at', Carbon::today())->get();
         
        if($request->view_type === 'download') {
            $pdf = PDF::loadView('Laporan_Pengeluaran.pdf', ['barang_masuks' => $barang_masuks]);
            return $pdf->download('Laporan_Pengeluaran.pdf');
        } else {
            $view = View('Laporan_Pengeluaran.pdf', ['barang_masuks' => $barang_masuks]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }

    public function downloadPDF2(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $barang_masuks = BarangMasuk::whereBetween('created_at', [$dari, $sampai])->get();
        $pdf = PDF::loadView('Laporan_Pengeluaran\pdf2', [
                'barang_masuks' => $barang_masuks,
                'dari' => $dari,
                'sampai' => $sampai,
              ]);
        dd($pdf);
        return $pdf->download('Laporan_Pengeluaran.pdf');
    }

    public function downloadExcel()
    {
        $barang_masuk = BarangMasuk::with('barang')
                            ->with('supplier')
                            ->with('karyawan')
                            ->orderBy('created_at','asc')   
                            ->whereDate('created_at', Carbon::today())->get();
        return Excel::create('Laporan Pengeluaran',function($excel) use ($barang_masuk){
            $excel->setTitle('Laporan Pengeluaran')
            ->setCreator('Admin');
            $excel->sheet('Laporan_Pengeluaran', function($sheet) use ($barang_masuk){
                $row = 1;
                $sheet->row($row,[
                    'Nama Barang',
                    'Jenis',
                    'kuantitas',
                    'Harga',
                    'Total Harga',
                    'Nama Supplier'
                ]);
                foreach ($barang_masuk as $item) {
                    $sheet->row(++$row,[
                        $item->barang->nama_barang,
                        $item->barang->jenis,
                        $item->kuantitas,
                        number_format($item->harga,'2',',','.'),
                        number_format($item->total,'2',',','.'),
                        $item->supplier->nama,

                    ]);
                }
                $sheet->row($row,[
                  'TOTAL',
                  '',
                  '',
                  '',
                  number_format($barang_masuk->sum('total'),'2',',','.'),
                  ''
                ]);
            });
        })->export('xls');
    }


    public function table(){
        $barang_masuks = BarangMasuk::with('barang')
                            ->with('supplier')
                            ->with('karyawan')
                            ->orderBy('created_at','asc')   
                            ->whereDate('created_at', Carbon::today())->get();
        return Datatables::of($barang_masuks)

        ->addColumn('tanggal_masuk', function ($barang_masuks) {
              return date('d F Y' , strtotime($barang_masuks->created_at));
            })
        ->addColumn('harga_pasar', function ($barang_masuks) {
              return 'Rp.'. number_format($barang_masuks->harga);
            })
        ->addColumn('total_harga', function ($barang_masuks) {
              return 'Rp.'. number_format($barang_masuks->total);
            })
        ->addColumn('quantity', function ($barang_masuks) {
              return $barang_masuks->kuantitas.'&nbsp'.$barang_masuks->barang->satuan;
            })

        ->rawColumns(['action','tanggal_masuk','harga_pasar','quantity','total_harga'])
        ->make(true);
    }
}
