@extends('layouts/app')

@section('title','Barang | Edit')
@section('header','Barang')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Barang</li>
					    <li class="breadcrumb-item">Edit data</li>
					</ul>
                        <div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title"><i class="fa fa-pencil"></i> Edit Barang</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
                                        <form class="form-horizontal form-bordered" action="{{ route('barangs.update', $barangs->id) }}" method="post" enctype="multipart/form-data">
                                        	<input name="_method" type="hidden" value="PATCH">
                                            {{ csrf_field() }}
												<div class="form-group">
													<label class="col-md-3 control-label">Nama Barang</label>
													<div class="col-md-6">
														
	
															<input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{$barangs->nama_barang}}">
														
													</div>
                                                    @if ($errors->has('nama_barang'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('nama_barang') }}</strong>
                                                        </span>
                                                    @endif
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Jenis</label>
													<div class="col-md-6 control-label">
                                                    
														<select class="form-control"  name="jenis">
                                                                <option value="Sayuran"{{ $barangs->jenis == "Sayuran" ? "selected":"" }} >Sayur-Sayuran</option> 
                                                                <option value="Buah"  {{ $barangs->jenis == "Buah" ? "selected":"" }} >Buah-Buahan</option>
														</select>
													
													</div>
                                                    @if ($errors->has('jenis'))
                                                    <span class="help-block">
                                                        <strong style="color:red;">{{ $errors->first('jenis') }}</strong>
                                                    </span>
                                                    @endif
												</div>

                                               <div class="form-group">
													<label class="col-md-3 control-label">Satuan</label>
													<div class="col-md-6 control-label">
                                                  
														<select class="form-control" name="satuan">
                                                                <option value="Kilogram"  {{ $barangs->satuan == "Kilogram" ? "selected":"" }} >Kilogram</option>
                                                                <option value="IKat"  {{ $barangs->satuan == "Ikat" ? "selected":"" }}>IKat</option>
														</select>
													
													</div>
                                                    @if ($errors->has('satuan'))
                                                    <span class="help-block">
                                                        <strong style="color:red;">{{ $errors->first('satuan') }}</strong>
                                                    </span>
                                                    @endif
												</div>

                                                <div class="form-group">
													<label class="col-md-3 control-label">Harga Jual / KG</label>
													<div class="col-md-6">
														
															<input id="nama_barang" type="number" class="form-control" name="harga_jual" value="{{$barangs->harga_jual}}">
														
													</div>
                                                    @if ($errors->has('harga_jual'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('harga_jual') }}</strong>
                                                        </span>
                                                    @endif
												</div>
												
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