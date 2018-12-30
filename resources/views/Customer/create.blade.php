
					<div class="row" id="create">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<i id="cancel" class="fa fa-times"></i>
										</div>
										<h2 class="panel-title"><i class="fa fa-pencil"></i> Customer</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
                                         <form id="formCustomer" method="post" enctype="multipart/form-data">
 										{{csrf_field()}} {{ method_field('POST') }}
										<input type="hidden" name="id" id="id">
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="hidden" name="id" id="id">
													<label class="control-label">Nama Customer</label>
													<input type="text" name="nama" id="nama" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">No Telepon</label>
													<input type="number" name="no_telepon" id="no_telepon" class="form-control" data-plugin-maxlength maxlength="13">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">Alamat</label>
													<textarea class="form-control" rows="3" data-plugin-maxlength maxlength="140" name="alamat" id="alamat" style="height: 60px;"></textarea>
												</div>
											</div>
										</div>	
										<br>

										<div class="row" style="margin-top: -80px;">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">Kerjasama Awal</label>
													<input type="date" name="awal" id="awal" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">Kerjasama Akhir</label>
													<input type="date" name="akhir" id="akhir" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<br>
													<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary" id="aksi"><i class="fa fa-check-circle"></i> Simpan</button>
                                                    <button type="reset" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-ban"></i> Hapus</button>
												</div>
											</div>
										</div>
              								<input type="text" name="status" id="status" value="" class="hidden">
										</form>
									</div>
								</div>
							</section>
						</div>
					</div>