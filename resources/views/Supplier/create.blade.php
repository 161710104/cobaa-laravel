<div id="create">
<ul class="app-breadcrumb breadcrumb side">
              <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
              <li class="breadcrumb-item">Supplier</li>
              <li class="breadcrumb-item">Tambah data</li>
          </ul>
<div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<i class="fa fa-times" id="cancel"></i>
										</div>
						
										<h2 class="panel-title"><i class="fa fa-plus"></i> Tambah Supplier</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
                                         <form id="formSupplier" method="post" enctype="multipart/form-data">
 										{{csrf_field()}} {{ method_field('POST') }}
          								<div class="form-group">
												<input type="hidden" name="id" id="id">
												<label class="col-md-3 control-label" for="textareaDefault">Nama Supplier</label>
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


<!-- <div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                   		<div class="form-group">
							<label class="col-md-3 control-label" for="textareaDefault">Nama Supplier</label>
								<div class="col-md-6">
									<input class="form-control" data-plugin-maxlength maxlength="20" name="nama" />
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
								<input type="number" class="form-control" data-plugin-maxlength maxlength="13" name="no_telepon" />
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
								<textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" name="alamat"></textarea>
							</div>
	                        @if ($errors->has('alamat'))
	                            <span class="help-block">
	                                    <strong style="color:red;">{{ $errors->first('alamat') }}</strong>
	                            </span>
	                        @endif
					</div>

                </div>

                <div class="modal-footer">
                     <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
                    <button type="reset" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-ban"></i> Hapus</button>
                </div>

            </form>
        </div>
    </div>
</div> -->