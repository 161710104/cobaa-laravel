@extends('layouts/app')

@section('title','Customer | Edit')
@section('header','Customer')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Customer</li>
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
						
										<h2 class="panel-title"><i class="fa fa-pencil"></i> Edit Customer</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
                                        <form class="form-horizontal form-bordered" action="{{ route('customers.update', $customers->id) }}" method="post" enctype="multipart/form-data">
                                        	<input name="_method" type="hidden" value="PATCH">
                                            {{ csrf_field() }}


											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">Nama Customer</label>
													<div class="col-md-6">
														<input class="form-control" data-plugin-maxlength maxlength="20" name="nama" value="{{$customers->nama}}" />
															<p>
																<code>max-length</code> set to 20.
															</p>
													</div>
	                                                @if ($errors->has('nama'))
	                                                    <span class="help-block">
	                                                         <strong style="color:red;">{{ $errors->first('nama') }}</strong>
	                                                    </span>
	                                                @endif
											</div>


											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">No Telepon</label>
													<div class="col-md-6">
														<input type="number" class="form-control" data-plugin-maxlength maxlength="13" name="no_telepon" value="{{$customers->no_telepon}}" />
															<p>
																<code>max-length</code> set to 13.
															</p>
													</div>
	                                                @if ($errors->has('no_telepon'))
	                                                    <span class="help-block">
	                                                         <strong style="color:red;">{{ $errors->first('no_telepon') }}</strong>
	                                                    </span>
	                                                @endif
											</div>


											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">Alamat</label>
													<div class="col-md-6">
														<textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" name="alamat">{{$customers->alamat}}</textarea>
															<p>
																<code>max-length</code> set to 140.
															</p>
													</div>
	                                                @if ($errors->has('alamat'))
	                                                    <span class="help-block">
	                                                         <strong style="color:red;">{{ $errors->first('alamat') }}</strong>
	                                                    </span>
	                                                @endif
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">Kerjasama Awal</label>
													<div class="col-md-6">
														<input type="date" class="form-control" name="awal" value="{{$customers->awal}}" />
													</div>
	                                                @if ($errors->has('awal'))
	                                                    <span class="help-block">
	                                                         <strong style="color:red;">{{ $errors->first('awal') }}</strong>
	                                                    </span>
	                                                @endif
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">Kerjasama Akhir</label>
													<div class="col-md-6">
														<input type="date" class="form-control" name="akhir" value="{{$customers->akhir}}" />
													</div>
	                                                @if ($errors->has('akhir'))
	                                                    <span class="help-block">
	                                                         <strong style="color:red;">{{ $errors->first('akhir') }}</strong>
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