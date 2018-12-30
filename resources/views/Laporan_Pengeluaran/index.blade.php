@extends('layouts/app')

@section('title','Laporan Pengeluaran')
@section('header','Laporan Pengeluaran')

@section('content')
<link rel="stylesheet" href="/assets/stylesheets/datatable_laporan.css" />

					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Laporan Pengeluaran</li>
					</ul>


						<div class="row">
							<div class="col-xs-12">
								<form action="{{url('/admin/laporan_uang_keluar')}}" method="post">
									{{csrf_field()}}
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>
										<h2 class="panel-title">
											<i class="fa fa-book"></i> Laporan Pengeluaran
										</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
												<div class="col-xs-12">
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<label class="control-label">Dari Tanggal</label>
													<input type="date" name="dari" class="form-control">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label class="control-label">Sampai Tanggal</label>
													<input type="date" name="sampai" class="form-control">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<br>
													<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">
									                  <i class="fa fa-filter"></i> Filter
									                </button>
													<button type="button" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-info" data-toggle="modal" data-target="#myModal">
									                  <i class="fa fa-print"></i> Print
									                </button>
												</div>
											</div>
										</div>
									                <table class="table mb-none" id="datatable-ajax">
													<thead>
														<tr>
											               <th>Nama Barang Keluar</th>
											               <th>Jenis</th>
											               <th>Kuantitas</th>
											               <th>Harga</th>
											               <th>Total Harga</th>
											               <th>Tanggal Keluar</th>
											               <th>Nama Supplier</th>
														</tr>
													</thead>
													<tbody>
											          </tbody>
												</table>
												<br>
												<h5>Total Uang Keluar : 
												<b>Rp. {{number_format($barang_masuk->sum('total'),'2',',','.')}}</b>
												</h5> 

												<table table class="table mb-none">
													<thead>
													<tr>
														<th>Total Barang Keluar : </th>
														<th>Keterangan : </th>
													</tr>
													</thead>
													<tbody>
														<td>
															<li>{{$satuan_ikat->sum('kuantitas')}} <b>Ikat</b></li>
															<li>{{$satuan_kg->sum('kuantitas')}} <b>Kilogram</b></li>
														</td>
														<td>
															<li>{{$jenis_sayur->count()}} <b>Sayuran</b></li>
															<li>{{$jenis_buah->count()}} <b>Buah - Buahan</b></li></
														</td>
													</tbody>
												</table>
									              </div>
									            </div>
												
											</div>
										</form>
									</div>
								</section>

							</div>
						</div>
						@include('Laporan_Pengeluaran.print')
						

@endsection
@section('js')
  <script type="text/javascript">

  $(document).ready(function(){
    $('#datatable-ajax').DataTable({
      aaSorting :[],
      stateSave : true,
      processing : true,
      serverSide : true,
      ajax : '/jsonlaporan_pengeluaran',
      columns : [
        {data : 'barang.nama_barang'},
        {data : 'barang.jenis'},
        {data : 'quantity'},
        {data : 'harga_pasar'},
        {data : 'total_harga'},
        {data : 'tanggal_masuk'},
        {data : 'supplier.nama'},
      ],
    });
  });
  </script>

@endsection