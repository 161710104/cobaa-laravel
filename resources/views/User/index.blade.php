@extends('layouts/app')

@section('title','User')
@section('header','User')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">User</li>
					</ul>
          
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title"><i class="fa fa-user"></i> User
                  &nbsp<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="TambahSupplier">
                    <i class="fa fa-plus"></i> Tambah User</button>
                    @include('User.modal')
								</h2>
							</header>
							<div class="panel-body">
                			<div class="table-responsive">
								<table class="table mb-none" id="datatable-ajax">
									<thead>
										<tr>
							               	<th>Nama</th>
                             				<th>Email</th>
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
      ajax : '/jsonuser',
      columns : [
        {data : 'name', name: 'name'},
        {data : 'email' , name: 'email'},
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
  $('#TambahSupplier').click(function(){
            $('#myModalUser').modal('show');
            $('#aksi').val('TambahUser');
            state = "insert";
            });

           $('#myModalUser').on('hidden.bs.modal',function(e){
            $(this).find('#formUser')[0].reset();
            $('span.has-error').text('');
            $('.form-group.has-error').removeClass('has-error');
            });
       });
</script>
@endsection