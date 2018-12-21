@extends('layouts/app')

@section('title','Barang Masuk')
@section('header','Barang Masuk')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Barang Masuk</li>
					</ul>

						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Barang Masuk
								&nbsp<a href="{{ route('barang_masuks.create') }}" type="button" class="mb-xs mt-xs mr-xs btn btn-primary" >
								<i class="fa fa-plus"></i> Tambah Barang Masuk</a>
                &nbsp<button type="button" class="mb-xs mt-xs mr-xs btn btn-success" id="btn-filter">
                    <i class="fa fa-filter"></i> Filter</button>
								</h2>
							</header>
							<div class="panel-body">
                <div class="row" id="filter">
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
                          <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger" id="cancel">
                                    <i class="fa fa-ban"></i> Batal
                                  </button>
                        </div>
                      </div>
                    </div>
              <div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-ajax">
									<thead>
										<tr>
							               <th>Nama Barang Masuk</th>
							               <th>Jenis</th>
							               <th>kuantitas</th>
							               <th>Harga / KG</th>
							               <th>Tanggal Masuk</th>
							               <th>Supplier</th>
							               <th>Karyawan</th>
							               <th><center> Action</center></th>
										</tr>
									</thead>
									<tbody>
							          </tbody>
								</table>
                </div>
							</div>
						</section>

@endsection
@section('js')
  <script type="text/javascript">

  $(document).ready(function(){
    $('#datatable-ajax').DataTable({
      aaSorting :[],
      stateSave : true,
      processing : true,
      serverSide : true,
      ajax : '/jsonbarang_masuks',
      columns : [
        {data : 'barang.nama_barang'},
        {data : 'barang.jenis'},
        {data : 'quantity'},
        {data : 'harga_pasar'},
        {data : 'tanggal_masuk'},
        {data : 'supplier.nama'},
        {data : 'karyawan.name'},
        {data: 'action', orderable: false, searchable: false}
      ],
      drawCallback : function( settings ) {
        $("[rel=tooltip]").tooltip();
        $('.delete').click(function(e) {
        e.preventDefault(); // Prevent the href from redirecting directly
        var linkURL = $(this).attr("href");
        var name = $(this).attr("data-name");
        warnBeforeRedirect(linkURL,name);
        });
         function warnBeforeRedirect(linkURL,name) {
           swal({
               title: "Apakah Anda Yakin?",
               text: "Anda akan menghapus data dengan nama = "+name+" !",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya, Hapus!",
               cancelButtonText: "Tidak, Batalkan!",
               closeOnConfirm: false,
               closeOnCancel: false
             },
            function(isConfirm){
          if (isConfirm) {
            console.log('done');
            swal("Dihapus!", "Data dengan nama  "+name+" sudah di hapus.", "success");
            window.location.href = linkURL;
          } else {
              swal("Dibatalkan", "Data dengan nama "+name+" aman :)", "error");
          }
        });
          }
    }
    });
  });
  </script>
  <script type="text/javascript">
    $('#filter').attr('hidden',true); 
    $('#btn-filter').on('click',function(){
            $('#filter').attr('hidden',false); 
            $('#datatable-ajax_filter').attr('hidden',true);
            $('#datatable-ajax_length').attr('hidden',true);
            });

    $('#cancel').on('click',function(){
           $('#filter').attr('hidden',true); 
           $('#datatable-ajax_filter').attr('hidden',false);
           $('#datatable-ajax_length').attr('hidden',false);
             })
  </script>

@endsection