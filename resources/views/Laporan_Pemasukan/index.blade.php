@extends('layouts/app')

@section('title','Laporan Pemasukan')
@section('header','Laporan Pemasukan')

@section('content')
<link rel="stylesheet" href="/assets/stylesheets/datatable_laporan.css" />
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Laporan Pemasukan</li>
					</ul>


						<div class="row">
							<div class="col-xs-12">
								 <form id="formLaporanpemasukan" method="post" enctype="multipart/form-data">
 										{{csrf_field()}} {{ method_field('POST') }}
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>
										
										<h2 class="panel-title">
											<i class="fa fa-book"></i> Laporan Pemasukan
											&nbsp&nbsp
										</h2>
											
											
										
										
									</header>
									<div class="panel-body">
											<div class="form-body">
												<div class="col-xs-12">
													<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<input type="hidden" name="id" id="id">
													<label class="control-label">Dari Tanggal</label>
													<input type="date" name="dari" id="dari" class="form-control">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label class="control-label">Sampai Tanggal</label>
													<input type="date" name="sampai" id="sampai" class="form-control">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<br>
													<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">
									                  <i class="fa fa-filter" id="aksi"></i> Filter
									                </button>
													<button type="button" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-info" data-toggle="modal" data-target="#myModal" id="print1">
									                  <i class="fa fa-print"></i> Print
									                </button>
										                <!-- <button type="button" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-info" data-toggle="modal" data-target="#myModal" id="print2">
										                <i class="fa fa-print"></i> Print
													    </button> -->
												</div>
											</div>
										</div>
										<div id="index1">
									                <table class="table mb-none" id="datatable-ajax">
													<thead>
														<tr>
											               <th>Nama Barang Keluar</th>
											               <th>Jenis</th>
											               <th>Kuantitas</th>
											               <th>Harga</th>
											               <th>Total Harga</th>
											               <th>Tanggal Keluar</th>
											               <th>Nama Customer</th>
														</tr>
													</thead>
													<tbody>
											          </tbody>
												</table>
												<br>
												<h5>Total Uang Keluar : 
												<b>Rp. {{number_format($barang_keluars->sum('total'),'2',',','.')}}</b>
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
											@include('Laporan_Pemasukan.index2')
									              </div>
									            </div>
												
											</div>
										</form>
									</div>
								</section>

							</div>
						</div>
						@include('Laporan_Pemasukan.print')
						

@endsection
@section('js')
  <script type="text/javascript">
  	 $('#index2').attr('hidden',true);
     $('#index1').attr('hidden',false);  

  $(document).ready(function(){
  	createData();
    $('#datatable-ajax2').DataTable({
      aaSorting :[],
      stateSave : true,
      processing : true,
      serverSide : true,
      ajax : '/jsonlaporan_pemasukan2',
      columns : [
        {data : 'barang.nama_barang'},
        {data : 'barang.jenis'},
        {data : 'quantity'},
        {data : 'harga_jual'},
        {data : 'total_harga'},
        {data : 'tanggal_keluar'},
        {data : 'customer.nama'},
      ],
    });
    function createData() {
          $('#formLaporanpemasukan').submit(function(e){
              $.ajaxSetup({
                header: {
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
              });
              e.preventDefault();
              $.ajax({
                  url:'laporan_pemasukan',
                  type:'post',
                  data: new FormData(this),
                  cache: true,
                  contentType: false,
                  processData: false,
                  async:false,
                  dataType: 'json',
                  success: function (data){
                    console.log(data);
                    swal({
                        title:'Success Filter!',
                        text: data.message,
                        type:'success',
                        timer:'2000'
                      });
                    $('#index2').attr('hidden',false);
     				$('#index1').attr('hidden',true);
                    $('#datatable-ajax').attr('hidden',true);
                    $('#datatable-ajax2').DataTable().ajax.reload();  
                  },
                  complete: function() {
                      $("#formLaporanpemasukan")[0].reset();
                  }
              });
          });
      }
  });
  </script>
  <script type="text/javascript">
  	 $(document).ready(function(){
    $('#datatable-ajax').DataTable({
      aaSorting :[],
      stateSave : true,
      processing : true,
      serverSide : true,
      ajax : '/jsonlaporan_pemasukan',
      columns : [
        {data : 'barang.nama_barang'},
        {data : 'barang.jenis'},
        {data : 'quantity'},
        {data : 'harga_jual'},
        {data : 'total_harga'},
        {data : 'tanggal_keluar'},
        {data : 'customer.nama'},
      ],
    });
});
  </script>

@endsection