<div id="create">
<div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<i class="fa fa-times" id="cancel"></i>
										</div>
										<h2 class="panel-title"><i class="fa fa-plus"></i> Tambah Customer</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
                                         <form id="formCustomer" method="post" enctype="multipart/form-data">
 										{{csrf_field()}} {{ method_field('POST') }}
          								<div class="form-group">
												<input type="hidden" name="id" id="id">
												<label class="col-md-3 control-label" for="textareaDefault">Nama Customer</label>
													<div class="col-md-6">
														<input class="form-control" data-plugin-maxlength maxlength="20" name="nama" id="nama" />
															
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
														<input type="number" class="form-control" data-plugin-maxlength maxlength="13" name="no_telepon" id="no_telepon" />
															
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
														<textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" name="alamat" id="alamat"></textarea>
															
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
														<input type="date" class="form-control" name="awal" id="awal" />
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
														<input type="date" class="form-control" name="akhir" id="akhir" />
													</div>
	                                                @if ($errors->has('akhir'))
	                                                    <span class="help-block">
	                                                         <strong style="color:red;">{{ $errors->first('akhir') }}</strong>
	                                                    </span>
	                                                @endif
											</div>

              								<input type="text" name="status" id="status" value="" class="hidden">


                                                <div class="form-group">
													<label class="col-md-3 control-label"></label>
													<div class="col-md-6">
                                                    <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary" id="aksi"><i class="fa fa-check-circle"></i> Simpan</button>
                                                    <button type="reset" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-ban"></i> Hapus</button>
                                                    
												</div>
												
											</div>
										</form>
									</div>
								</section>
							</div>
						</div>
				
				</div>

