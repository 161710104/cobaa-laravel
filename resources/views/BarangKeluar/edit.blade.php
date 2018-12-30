	@extends('layouts/app')

@section('title','Barang Keluar | Edit')
@section('header','Barang Keluar')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Barang Keluar</li>
					    <li class="breadcrumb-item">Tambah data</li>
					</ul>
                        <div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title"><i class="fa fa-pencil"></i> Edit Barang Keluar</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
											<form class="form-horizontal form-bordered" action="{{ route('barang_keluars.update', $barang_keluars->id) }}" method="post" enctype="multipart/form-data">
                                        	<input name="_method" type="hidden" value="PATCH">
                                            {{ csrf_field() }}

												<div class="form-group">
													<label class="col-md-3 control-label">Nama Barang Keluar</label>
													<div class="col-md-6">
														<select class="form-control mb-md" name="id_barang">
															@foreach ($barang as $item)
															<option value="{{$item->id}}" {{ $item->id == $barang_keluars->id_barang ? "selected":"" }} >{{$item->nama_barang}}</option>
															@endforeach
														</select>
													</div>
                                                    @if ($errors->has('id_barang'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('id_barang') }}</strong>
                                                        </span>
                                                    @endif
												</div>

												


                                                <div class="form-group">
													<label class="col-md-3 control-label">Kuantitas</label>
													<div class="col-md-6">
														<div class="input-group">		
															<input id="kuantitas" type="number" class="form-control" name="kuantitas" value="{{$barang_keluars->kuantitas}}">
														</div>
													</div>
                                                    @if ($errors->has('kuantitas'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('kuantitas') }}</strong>
                                                        </span>
                                                    @endif
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label">Harga</label>
													<div class="col-md-6">
														<div class="input-group">
															<input id="harga" type="number" class="form-control" name="harga" name="harga" value="{{$barang_keluars->harga}}">
														</div>
													</div>
                                                    @if ($errors->has('harga'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('harga') }}</strong>
                                                        </span>
                                                    @endif
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label">Nama Customer</label>
													<div class="col-md-6">
														<select class="form-control mb-md" name="id_customer">
															@foreach ($customer as $item)
															<option value="{{$item->id}}" {{ $item->id == $barang_keluars->id_customer ? "selected":"" }} >{{$item->nama}}</option>
															@endforeach
														</select>
													</div>
                                                    @if ($errors->has('id_customer'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('id_customer') }}</strong>
                                                        </span>
                                                    @endif
												</div>


												<input type="hidden" name="id_karyawan" value="{{ Auth::user()->id }}">
												<input type="hidden" name="quantity_awal" value="{{$barang_keluars->kuantitas}}">
												
                                                <div class="form-group">
													<label class="col-md-3 control-label"></label>
													<div class="col-md-6">
                                                    <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
                                                    <button type="reset" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-ban"></i> Hapus</button>
                                                    
												</div>
												
											</div>
										</form>
									</div>
								</section>

							</div>
						</div>
						

@endsection
<!-- @section('js')
  <script type="text/javascript">

    function myFunction() {
   
    var checkBox = document.getElementById("date");
    var sebelum = document.getElementById("before");
    var sekarang = document.getElementById("today");
    
  if (checkBox.checked == true){
    sebelum.style.display = "block";
    sekarang.style.display = 'none';
   

  } else {
    sebelum.style.display = "none";
    sekarang.style.display = 'block';
   
  }
}
	</script>
@endsection -->