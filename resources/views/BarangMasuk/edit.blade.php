
                        <div class="row" id="Edit">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<i id="cancel_edit" class="fa fa-times"></i>
										</div>
						
										<h2 class="panel-title"><i class="fa fa-pencil"></i> Edit Barang Masuk</h2>
									</header>
									<div class="panel-body">
										<div class="form-body">
											<form id="formBarang_masuk_edit" method="post" enctype="multipart/form-data">
 											{{csrf_field()}} {{ method_field('POST') }}
											<input type="hidden" name="id" id="id">
												<div class="form-group">
													<label class="col-md-3 control-label">Nama Barang Masuk</label>
													<div class="col-md-6">
														<select class="form-control mb-md" name="id_barang" id="id_barang">
															@foreach ($barang as $item)
															<option value="{{$item->id}}">{{$item->nama_barang}}</option>
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
															<input id="kuantitas" type="number" class="form-control" name="kuantitas">
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
															<input id="harga" type="number" class="form-control" name="harga" name="harga">
														</div>
													</div>
                                                    @if ($errors->has('harga'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('harga') }}</strong>
                                                        </span>
                                                    @endif
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label">Nama Supplier</label>
													<div class="col-md-6">
														<select class="form-control mb-md" name="id_supplier" id="id_supplier">
															@foreach ($supplier as $item)
															<option value="{{$item->id}}">{{$item->nama}}</option>
															@endforeach
														</select>
													</div>
                                                    @if ($errors->has('id_supplier'))
                                                        <span class="help-block">
                                                            <strong style="color:red;">{{ $errors->first('id_supplier') }}</strong>
                                                        </span>
                                                    @endif
												</div>


												<input type="hidden" name="id_karyawan" value="{{ Auth::user()->id }}">
												<input type="hidden" name="quantity_awal" id="quantity_awal">

												
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