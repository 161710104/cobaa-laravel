@extends('layouts/app')

@section('title','Barang')
@section('header','Barang')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Barang</li>
					</ul>

          @include('Barang.create')
          <div id="index">
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Barang
								&nbsp<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="TambahBarang" ><i class="fa fa-plus"></i> Tambah Barang</button>
                &nbsp
                <button type="button" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-info" data-toggle="modal" data-target="#myModal">
                  <i class="fa fa-print"></i> Print
                </button>
								</h2>
							</header>
							<div class="panel-body">
              <div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-ajax">
									<thead>
										<tr>
							               <th>Nama Barang</th>
							               <th>Jenis</th>
							               <th>Satuan</th>
							               <th>Kuantitas</th>
							               <th>Harga Beli / KG</th>
							               <th>Harga Jual / KG</th>
							               <th><center> Action</center></th>
										</tr>
                  </thead>
                </table>
              </div>
            </div>
          </section>
        </div>
            @include('Barang.print')


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
      ajax : '/jsonbarang',
      columns : [
        {data : 'nama_barang', name: 'nama_barang'},
        {data : 'jenis', name: 'jenis'},
        {data : 'satuan' , name: 'satuan'},
        {data : 'kuantitas' , name: 'kuantitas'},
        {data : 'harga_pasar'},
        {data : 'harga_jual'},
        {data: 'action', orderable: false, searchable: false}
      ],
  });
    $('#create').attr('hidden',true); 
    $('#TambahBarang').on('click',function(){
            $('#create').attr('hidden',false);
            state = "insert"; 
            });

    $('#cancel').on('click',function(){
           $('#index').attr('hidden',false); 
            $('#create').attr('hidden',true); 
             });

    function createData() {
          $('#formBarang').submit(function(e){
              $.ajaxSetup({
                header: {
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
              });
              e.preventDefault();
              if (state == 'insert') {
              $.ajax({
                  url:'storebarangs',
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
                        title:'Success Tambah!',
                        text: data.message,
                        type:'success',
                        timer:'2000'
                      });
                    $('#create').attr('hidden',true);
                    $('#index').attr('hidden',false);  
                    $('#datatable-ajax').DataTable().ajax.reload();
                  },
                  complete: function() {
                      $("#formBarang")[0].reset();
                  }
              });
          }
          else{
            $.ajax({
                  url:'barangs/edit' + '/' + $('#id').val(),
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
                        title:'Success Edit !',
                        text: data.message,
                        type:'success',
                        timer:'2000'
                      });
                    $('#create').attr('hidden',true);
                    $('#index').attr('hidden',false);  
                    $('#datatable-ajax').DataTable().ajax.reload();
                  },
                  complete: function() {
                      $("#formBarang")[0].reset();
                  }
              });
          }
          });
      }

    });
  </script>
@endsection