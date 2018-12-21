@extends('layouts/app')

@section('title','Customer | Lihat Barang')
@section('header','Customer')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">Customer</li>
					    <li class="breadcrumb-item">Lihat Barang</li>
					</ul>
                        <div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title"><i class="fa fa-group"></i> {{$customers->nama}}</h2>
									</header>
									<div class="panel-body">
											<div class="form-body">
												<div class="col-xs-12">
									              <div class="col-sm-4">
									                <table class="table">
									                    <tr>
									                      <td>Nama Customer:</td>
									                      <td>:</td>
									                      <td>{{$customers->nama}}</td>
									                    </tr>

									                    <tr>
									                      <td>No Telepon</td>
									                      <td>:</td>
									                      <td>{{$customers->no_telepon}}</td>
									                    </tr>

									     
									                </table>

									              </div>

									              <div class="col-sm-4">
									                <table class="table">
									                    <tr>
									                      <td>Awal Kerjasama</td>
									                      <td>: <?php echo date('d F Y' , strtotime($customers->awal))?></td>              
									                  	</tr>

									                    <tr>
									                      <td>Akhir Kerjasama</td>
									                      <td>: <?php echo date('d F Y' , strtotime($customers->akhir))?></td>          
									                  	</tr>
									        
									                </table>

									            </div>
									            <div class="col-sm-4">
									                <table class="table" id="test">
									                  
									                    <tr>
									                      <td>Alamat</td>
									                      <td>:</td>
									                      <td>{{$customers->alamat}}</td>
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
										<h2 class="panel-title"><i class="fa fa-dropbox"></i> Daftar Barang Keluar</h2>
									</header>
									<div class="panel-body">
											<div class="form-body">
												<div class="col-xs-12">
									                <table class="table mb-none">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Barang Keluar</th>
											            <th>Jenis</th>
											            <th>Kuantitas</th>
											            <th>Harga</th>
											            <th>Tanggal Keluar</th>
											            <th>Nama Karyawan</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td></td>
														<td>Otto</td>
														<td>@mdo</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Jacob</td>
														<td>Thornton</td>
														<td>@fat</td>
													</tr>
													<tr>
														<td>3</td>
														<td>Larry</td>
														<td>the Bird</td>
														<td>@twitter</td>
													</tr>
												</tbody>
											</table>
									              </div>
									            </div>
												
											</div>
										</form>
									</div>
								</section>

							</div>
						</div>
						

@endsection
@section('js')

@endsection