@extends('layouts/app')

@section('title','Supplier')
@section('header','supplier')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Supplier</li>
					</ul>
@include('Supplier.create')

<div id="awal">
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
						
								<h2 class="panel-title">Supplier
                  &nbsp<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="TambahSupplier">
                    <i class="fa fa-plus"></i> Tambah Supplier</button>
                    
								</h2>
							</header>
							<div class="panel-body">
                <div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-ajax">
									<thead>
										<tr>
							               <th>Nama</th>
                             <th>Alamat</th>
							               <th>No Telepon</th>
							               <th><center> Action</center></th>
										</tr>
									</thead>
									<tbody>
							          	
							          </tbody>
								</table>
                </div>
							</div>
						</section>
          </div>

@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
    createData();
    $('#datatable-ajax').DataTable({
      aaSorting :[],
      stateSave : true,
      processing : true,
      serverSide : true,
      ajax : '/jsonsupplier',
      columns : [
        {data : 'nama', name: 'nama'},
        {data : 'alamat' , name: 'alamat'},
        {data : 'no_telepon', name: 'no_telepon'},
        {data: 'action', orderable: false, searchable: false}
      ],  
    });

     $('#create').attr('hidden',true); 
    $('#TambahSupplier').on('click',function(){
            $('#awal').attr('hidden',false); 
            $('#create').attr('hidden',false);
            state = "insert"; 
            });

    $('#cancel').on('click',function(){
           $('#awal').attr('hidden',false); 
            $('#create').attr('hidden',true); 
             });

  function createData() {
          $('#formSupplier').submit(function(e){
              $.ajaxSetup({
                header: {
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
              });
              e.preventDefault();
              if (state == 'insert') {
              $.ajax({
                  url:'/storesuppliers',
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
                        title:'Berhasil Menambahkan Data!',
                        text: data.message,
                        type:'success',
                        timer:'2000'
                      });
                    $('#create').attr('hidden',true);
                    $('#awal').attr('hidden',false);  
                    $('#datatable-ajax').DataTable().ajax.reload();
                  },
                  complete: function() {
                      $("#formSupplier")[0].reset();
                  }
              });
          }
          else{
            $.ajax({
                  url:'suppliers/edit' + '/' + $('#id').val(),
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
                        title:'Berhasil Edit !',
                        text: data.message,
                        type:'success',
                        timer:'2000'
                      });
                    $('#create').attr('hidden',true);
                    $('#awal').attr('hidden',false);  
                    $('#datatable-ajax').DataTable().ajax.reload();
                  },
                  complete: function() {
                      $("#formSupplier")[0].reset();
                  }
              });
          }
          });
      }
      $(document).on('click', '.editSupplier', function(){
            var nomor = $(this).data('id');
            $('#formSupplier').submit('');
            $.ajax({
              url:'suppliers/getedit' + '/' + nomor,
              method:'get',
              data:{id:nomor},
              dataType:'json',
              success:function(data){
                console.log(data);
                state = "update";
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#no_telepon').val(data.no_telepon);
                $('#alamat').val(data.alamat);
                $('#create').attr('hidden',false);
                $('#awal').attr('hidden',false);  
                $('#aksi').val('Simpan');
                }
              });
          });

                  $('#create').attr('hidden',true);
                  $('#awal').attr('hidden',false);  
                  $('#datatable-ajax').DataTable().ajax.reload();

    $(document).on('click', '.delete', function(){
              var bebas = $(this).attr('id');
                if (confirm("Yakin Dihapus ?")) {
                  $.ajax({
                    url: 'suppliers/delete' + '/' + bebas,
                    method: "get",
                    data:{id:bebas},
                    success: function(data){
                      swal({
                        title:'Success Delete!',
                        text:'Data Berhasil Dihapus',
                        type:'success',
                        timer:'1500'
                      });
                      $('#datatable-ajax').DataTable().ajax.reload();
                    }
                  })
                }
                else
                {
                  swal({
                    title:'Batal',
                    text:'Data Tidak Jadi Dihapus',
                    type:'error',
                    });
                  return false;
                }
              });
      
});
      

  </script>

@endsection