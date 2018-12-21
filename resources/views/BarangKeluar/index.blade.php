@extends('layouts/app')

@section('title','Barang Keluar')
@section('header','Barang Keluar')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Barang Keluar</li>
					</ul>

						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Barang Keluar
								&nbsp<a href="{{ route('barang_keluars.create') }}" type="button" class="mb-xs mt-xs mr-xs btn btn-primary" >
								<i class="fa fa-plus"></i> Tambah Barang Keluar</a>
								</h2>
							</header>
							<div class="panel-body">
              <div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-ajax">
									<thead>
										<tr>
							               <th>Nama Barang Keluar</th>
							               <th>Jenis</th>
							               <th>Kuantitas</th>
							               <th>Harga</th>
							               <th>Tanggal Keluar</th>
							               <th>Nama Customer</th>
							               <th>Nama Karyawan</th>
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
      ajax : '/jsonbarang_keluars',
      columns : [
        {data : 'barang.nama_barang'},
        {data : 'barang.jenis'},
        {data : 'quantity'},
        {data : 'harga_jual'},
        {data : 'tanggal_keluar'},
        {data : 'customer.nama'},
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

@endsection