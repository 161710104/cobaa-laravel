											<div id="index2">
												<table class="table mb-none" id="table2">
													<thead>
														<tr>
											               <th>Nama Barang Keluar</th>
											               <th>Jenis</th>
											               <th>Kuantitas</th>
											               <th>Harga</th>
											               <th>Total Harga</th>
											               <th>Tanggal Keluar</th>
											               <th>Nama Customer</th>
														</tr>
													</thead>
													<tbody>
														<tr>
												            @foreach (data as $item)
															<td>{{$item->barang->nama_barang}}</td>
															<td>{{$item->barang->jenis}}</td>
															<td>{{$item->kuantitas}}</td>
															<td>

																<?php echo 'Rp.'. number_format($item->harga) ?>		
															</td>
															<td><?php echo  'Rp.'. number_format($item->total)?></td>
															<td>
																<?php echo date('d F Y' , strtotime($item->created_at)) ?>
															</td>
															<td>{{$item->customer->nama}}</td>
														</tr>
														@endforeach
											          </tbody>
											          </tbody>
												</table>
												<br>
												<h5>Total Uang Keluar : 
												<b>Rp. {{number_format($barang_keluars->sum('total'),'2',',','.')}}</b>
												</h5> 

												<table table class="table mb-none">
													<thead>
													<tr>
														<th>Total Barang Keluar : </th>
														<th>Keterangan : </th>
													</tr>
													</thead>
													<tbody>
														<td>
															<li>{{$satuan_ikat->sum('kuantitas')}} <b>Ikat</b></li>
															<li>{{$satuan_kg->sum('kuantitas')}} <b>Kilogram</b></li>
														</td>
														<td>
															<li>{{$jenis_sayur->count()}} <b>Sayuran</b></li>
															<li>{{$jenis_buah->count()}} <b>Buah - Buahan</b></li></
														</td>
													</tbody>
												</table>
											</div>