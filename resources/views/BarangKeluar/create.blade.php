@extends('layouts/app')

@section('title','Barang Keluar | Create')
@section('header','Barang Keluar')
@section('content')
<br>
@include('layouts._flash')
<br>
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Barang Keluar</li>
					    <li class="breadcrumb-item">Tambah data</li>
					</ul>
					 <div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading" style="padding: 0px;">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title"><i class="fa fa-group" style="margin-top: 20px;margin-left: 20px;"></i>
											<div class="form-group" >
													<div class="col-md-4">
														<select class="form-control mb-md" name="id_customer" id="customer" style="margin-left: 50px;margin-top: -25px;">
															<option selected="selected" disabled="disabled" value="">-Pilih Customer-</option>
															@foreach ($customer as $item)
															<option value="{{$item->id}}">{{$item->nama}}</option>
															@endforeach
														</select>
													</div>
                                                    @if ($errors->has('id_customer'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('id_customer') }}</strong>
                                                        </span>
                                                    @endif
											</div>
										</h2>
									</header>
									<div class="panel-body">
											<div class="form-body">
												<div class="col-xs-12">
									              <div class="col-sm-4">
									                <table class="table" style="border-top: none;">
									                    <tr style="border-top: none;">
									                      <td style="border-top: none;">Nama Customer</td>
									                      <td style="border-top: none;">:</td>
									                      <td style="border-top: none;"><input type="text" name="nama" class="form-control" value="" style="border: none;background-color: #fdfdfd;" readonly/></td>
									                    </tr>

									                    <tr style="border-top: none;">
									                      <td>No Telepon</td>
									                      <td>:</td>
									                      <td><input type="text" name="no_telepon" class="form-control" value="" style="border: none;background-color: #fdfdfd;" readonly/></td>
									                    </tr>

									     
									                </table>

									              </div>

									              <div class="col-sm-4">
									                <table class="table" style="border-top: none;">
									                    <tr>
									                      <td style="border-top: none;">Awal Kerjasama</td>
									                      <td style="border-top: none;">: </td>    
									                      <td style="border-top: none;"><input type="text" name="awal" class="form-control" value="" style="border: none;background-color: #fdfdfd;width: 150px" readonly/></td>          
									                  	</tr>

									                    <tr>
									                      <td>Akhir Kerjasama</td>
									                      <td>:</td>
									                      <td><input type="text" name="akhir" class="form-control" value="" style="border: none;background-color: #fdfdfd;" readonly/></td>          
									                  	</tr>
									        
									                </table>

									            </div>
									            <div class="col-sm-4">
									                <table class="table" id="test" style="border-top: none;">
									                  
									                    <tr>
									                      <td style="border-top: none;">Alamat:</td>
									                      <td style="border-top: none;"></td>
									                      <td style="border-top: none;"><div class="col-md-18"><input type="text" name="alamat" class="form-control" value="" style="width: 220px;margin-left: -10px;border: none;background-color: #fdfdfd;height: 90px;" readonly /></div></td>
									                    </tr>
									                    
									                    
									                      
									                    </tr>
									                  
									               
									                      </td>
									                    </tr>
									                </table>
									              </div>
									            </div>
												
											</div>
										</form>
									</div>
								</section>

							</div>
						</div>
                        <div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title"><i class="fa fa-plus"></i> Tambah Barang Keluar</h2>
										<div style="position:absolute;right:100px;top:10px;">
							                <h5>
						                        <div style="font-family: NEISTIL;">
						                            <div class="dmy agileits w3layouts">
						                            	Tanggal Barang Keluar:&nbsp
						                                <b><script type="text/javascript">
						                                    var mydate=new Date()
						                                    var year=mydate.getYear()
						                                    if(year<1000)
						                                    year+=1900
						                                    var day=mydate.getDay()
						                                    var month=mydate.getMonth()
						                                    var daym=mydate.getDate()
						                                    if(daym<10)
						                                    daym="0"+daym
						                                    var dayarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu")
						                                    var montharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember")
						                                    document.write(" "+daym+" "+montharray[month]+"  "+year+"")
						                                </script></b>
						                             </div>
						                        </div>
						                    </h5>
							            </div>
									</header>
									<div class="panel-body">
											<div class="form-body">
											<form class="form-horizontal form-bordered" action="{{ route('barang_keluars.store') }}" method="post" id="insert_form">
	                                            			{{ csrf_field() }}
	                                           <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary" style="width: 100px;"><i class="fa fa-check-circle"></i> Simpan</button>
												<table id="item_table" class="table table-bordered" >
										            <tr id="last">
										              <th>Nama Barang</th>
										              <th>Kuantitas</th>
										              <th>Harga</th>
										              <th>
										              	<input type="hidden" name="id_customer" value="">
										              	<input type="hidden" name="id_karyawan" value="{{ Auth::user()->id }}">
										              	<button type="button" name="add" class="btn btn-success btn-sm add" onclick="addrow()"><i class="fa fa-plus-square"></i></button></th>
										            </tr>
										        </table>
												</form>
											</div>
									</div>
								</section>

							</div>
						</div>
						

@endsection
@section('js')
  <script type="text/javascript">
	function addrow(){
      var no = $('#item_table tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      html +='<td><select name="id_barang[]" class="form-control" id="barang"><option selected="selected" disabled="disabled" value="">-Pilih Barang-</option>@foreach($barang as $data)<option value="{{$data->id}}">{{$data->nama_barang}}</option>@endforeach</select></td>';
      html +='<td><input type="number" name="kuantitas[]" class="form-control kuantitas"/></td>';
      html +='<td><input type="text" name="harga[]" class="form-control" value=""/></td>';
      html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="fa fa-minus-square"></i></button></td></tr>';
      $('#last').after(html);  

      $("#barang").change(function()
      {
        var id=$(this).val();
        $.ajax
        
        ({

        type: "GET",
        url: "/barang_keluars/getIdBarang",
        data: {id: id},
        cache: false,
        dataType:"json",
        success: function(data)
      {

        $("input[name='harga[]']").val(data.harga_jual);
        $("input[name='stok']").val(data.kuantitas);

    } 

  });

});
    }
    function remove(no){
      $('#row_'+no).remove();
    }

     $("#customer").change(function()
      {
        var id=$(this).val();
        $.ajax
        
        ({

        type: "GET",
        url: "/barang_keluars/getIdCustomer",
        data: {id: id},
        cache: false,
        dataType:"json",
        success: function(data)
      {
      	$("input[name='id_customer']").val(data.id_customer);
        $("input[name='nama']").val(data.nama);
        $("input[name='no_telepon']").val(data.no_telepon);
        $("input[name='alamat']").val(data.alamat);
        $("input[name='awal']").val(data.awal);
        $("input[name='akhir']").val(data.akhir);

        

    } 

  });

});



	
	</script>
@endsection