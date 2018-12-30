<div class="row" id="create">
					 		
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading" style="padding: 0px;">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<i id="cancel" class="fa fa-times"></i>
										</div>
										<h2 class="panel-title"><i class="fa fa-group" style="margin-top: 20px;margin-left: 20px;"></i>
											<div class="form-group" >
													<div class="col-md-4">
														<select class="form-control mb-md" name="id_supplier" id="supplier" style="margin-left: 50px;margin-top: -25px;">
															<option selected="selected" disabled="disabled" value="">-Pilih Supplier-</option>
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
										</h2>
									</header>
									<div class="panel-body">
											<div class="form-body">
												<div class="col-xs-12" style="height: 90px;">
									              <div class="col-sm-4">
									                <table class="table" style="border-top: none;">
									                    <tr style="border-top: none;">
									                      <td style="border-top: none;">Nama supplier</td>
									                      <td style="border-top: none;">:</td>
									                      <td style="border-top: none;"><input type="text" name="nama" class="form-control" value="" style="border: none;background-color: #fdfdfd;" readonly/></td>
									                    </tr>
									     
									                </table>

									              </div>

									              <div class="col-sm-4">
									                <table class="table" style="border-top: none;">
									                    <tr>
									                      <td style="border-top: none;">No Telepon</td>
									                      <td style="border-top: none;">: </td>    
									                      <td style="border-top: none;"><input type="text" name="no_telepon" class="form-control" value="" style="border: none;background-color: #fdfdfd;width: 150px" readonly/></td>          
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

                        
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>
										<h2 class="panel-title"><i class="fa fa-plus"></i> Tambah Barang Masuk</h2>
										<div style="position:absolute;right:100px;top:10px;">
							                <h5>
						                        <div style="font-family: NEISTIL;">
						                            <div class="dmy agileits w3layouts">
						                            	Tanggal Barang Masuk:&nbsp
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
										<form id="formBarang_masuk" method="post" enctype="multipart/form-data">
 										{{csrf_field()}} {{ method_field('POST') }}
											<input type="hidden" name="id" id="id">
											<div class="form-body">
												<center><button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button></h2></center>
												<table id="item_table" class="table table-bordered">
										            <tr id="last">
										              <th>Nama Barang</th>
										              <th>Kuantitas</th>
										              <th>Harga</th>
										              <th>
										              	<input type="hidden" name="id_supplier" value="">
										              	<input type="hidden" name="id_karyawan" value="{{ Auth::user()->id }}">
										              	<button type="button" name="add" class="btn btn-success btn-sm add" onclick="addrow()"><i class="fa fa-plus-square"></i></button></th>
										            </tr>
										        </table>
												
											</div>
										</form>
										</div>
									</section>
								</div>
							</div>
