@extends('layouts/app')

@section('title','Barang Masuk')
@section('header','Barang Masuk')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Barang Masuk</li>
					</ul>
             @include('BarangMasuk.create')
             @include('BarangMasuk.edit')
            <div id="index">
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Barang Masuk
								&nbsp<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="TambahBarangMasuk" ><i class="fa fa-plus"></i> Tambah Barang Masuk</button>
                <!-- &nbsp<button type="button" class="mb-xs mt-xs mr-xs btn btn-success" id="btn-filter">
                    <i class="fa fa-filter"></i> Filter</button> -->
								</h2>
							</header>
							<div class="panel-body">
                <!-- <div class="row" id="filter"> -->
                      <!-- <div class="col-sm-3">
                        <div class="form-group">
                          <label class="control-label">Dari Tanggal</label>
                          <input type="date" name="dari" class="form-control">
                        </div>
                      </div> -->
                      <!-- <div class="col-sm-3">
                        <div class="form-group">
                          <label class="control-label">Sampai Tanggal</label>
                          <input type="date" name="sampai" class="form-control">
                        </div>
                      </div> -->
                      <!-- <div class="col-sm-3">
                        <div class="form-group">
                          <br>
                          <button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">
                                    <i class="fa fa-filter"></i> Filter
                                  </button>
                          <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger" id="cancel">
                                    <i class="fa fa-ban"></i> Batal
                                  </button>
                        </div> -->
                      <!-- </div>
                    </div> -->
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
    });
    $('#create').attr('hidden',true);
    $('#Edit').attr('hidden',true);   
    $('#TambahBarangMasuk').on('click',function(){
            $('#create').attr('hidden',false);
            $('#index').attr('hidden',true);
            $('#Edit').attr('hidden',true);  
            state = "insert"; 
            });

    $('#cancel').on('click',function(){
            $('#index').attr('hidden',false); 
            $('#create').attr('hidden',true);
            $('#Edit').attr('hidden',true);  
             });

    $('#cancel_edit').on('click',function(){
            $('#index').attr('hidden',false); 
            $('#create').attr('hidden',true);
            $('#Edit').attr('hidden',true);  
             });
    function createData() {
          $('#formBarang_masuk').submit(function(e){
              $.ajaxSetup({
                header: {
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
              });
              e.preventDefault();
              if (state == 'insert') {
              $.ajax({
                  url:'storebarang_masuks',
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
                      $("#formBarang_masuk")[0].reset();
                  }
              });
          }
          else{
            $.ajax({
                  url:'barang_masuks/edit' + '/' + $('#id').val(),
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
                    $('#Edit').attr('hidden',true);
                    $('#index').attr('hidden',false);  
                    $('#datatable-ajax').DataTable().ajax.reload();
                  },
                  complete: function() {
                      $("#formBarang_masuk")[0].reset();
                  }
              });
          }
          });
      }
      $(document).on('click', '.editBarang', function(){
            var nomor = $(this).data('id');
            $('#formBarang_masuk').submit('');
            $.ajax({
              url:'barang_masuks/getedit' + '/' + nomor,
              method:'get',
              data:{id:nomor},
              dataType:'json',
              success:function(data){
                console.log(data);
                state = "update";
                $('#id').val(data.id);
                $('#id_barang').val(data.id_barang);
                $('#jenis').val(data.jenis);
                $('#kuantitas').val(data.kuantitas);
                $('#harga').val(data.harga);
                $('#id_supplier').val(data.id_supplier);
                $('#create').attr('hidden',true);
                $('#Edit').attr('hidden',false);
                $('#aksi').val('Simpan');
                }
              });
          });

                  $('#create').attr('hidden',true);
                  $('#Edit').attr('hidden',true);
                  $('#index').attr('hidden',false);  
                  $('#datatable-ajax').DataTable().ajax.reload();

              $(document).on('click', '.delete', function(){
              var bebas = $(this).attr('id');
                if (confirm("Yakin Dihapus ?")) {
                  $.ajax({
                    url: 'barang_masuks/delete' + '/' + bebas,
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
  <script type="text/javascript">
  function addrow(){
      var no = $('#item_table tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      html +='<td><select name="id_barang[]" class="form-control" id="barang">@foreach($barang as $data)<option value="{{$data->id}}">{{$data->nama_barang}}</option>@endforeach</select></td>';
      html +='<td><input type="number" name="kuantitas[]" class="form-control kuantitas"/></td>';
      html +='<td><input type="number" name="harga[]" class="form-control" value=""/></td>';
      html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="fa fa-minus-square"></i></button></td></tr>';
      $('#last').after(html);  
    }
    function remove(no){
      $('#row_'+no).remove();
    }


     $("#supplier").change(function()
      {
        var id=$(this).val();
        $.ajax
        
        ({

        type: "GET",
        url: "/barang_masuks/getIdSupplier",
        data: {id: id},
        cache: false,
        dataType:"json",
        success: function(data)
      {
        $("input[name='id_supplier']").val(data.id_supplier);
        $("input[name='nama']").val(data.nama);
        $("input[name='no_telepon']").val(data.no_telepon);
        $("input[name='alamat']").val(data.alamat);

        

    } 

  });

});




  
  </script>
  <!-- <script type="text/javascript">
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
 -->
@endsection