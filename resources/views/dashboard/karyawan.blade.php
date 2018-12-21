@extends('layouts.app')

@section('title','Home')
@section('header','Barang')

@section('content')
                        <div class="row" style="margin-top: -70px;">
                                
                            <div class="col-md-12 col-lg-6 col-xl-6">
                            <section class="panel">
                                        <div class="panel-body">
                                            <div class="small-chart pull-right" id="sparklineBarDash"></div>
                                            <img src="/assets/images/price.png" width="80px" height="80px" style="float: right;">
                                            <div class="h3 text-bold mb-none">Rp. {{number_format($lap_pemasukan->sum('total'),'2',',','.')}}</div>
                                            <h5>Total <b>Uang Masuk</b> Hari Ini</h5>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-6">
                            <section class="panel">
                                        <div class="panel-body">
                                            <div class="small-chart pull-right" id="sparklineBarDash"></div>
                                            <img src="/assets/images/price.png" width="80px" height="80px" style="float: right;">
                                            <div class="h3 text-bold mb-none">Rp. {{number_format($lap_pengeluaran->sum('total'),'2',',','.')}}</div>
                                            <h5>Total <b>Uang Keluar</b> Hari Ini</h5>
                                        </div>
                                    </section>
                                </div>          
                        </div>
                            <div class="row" style="margin-top: -70px;">
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-primary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-primary">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>
                                                 @php
                                                  $customers     = App\Customer::all();
                                                 @endphp
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Customer</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{$customers->count()}}</strong>
                                                            <span class="text-primary">(14 unread)</span>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a class="text-muted text-uppercase">(view all)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-secondary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-secondary">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>
                                                 @php
                                                  $suppliers = App\Supplier::all();
                                                 @endphp
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Supplier</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{$suppliers->count()}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a class="text-muted text-uppercase">(withdraw)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-tertiary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-tertiary">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title"><b>Barang Keluar</b> Hari ini</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{$barang_keluar->count()}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a class="text-muted text-uppercase">(statement)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-quartenary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-quartenary">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title"><b>Barang Masuk </b> Hari Ini</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{$barang_masuk->count()}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a class="text-muted text-uppercase">(report)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                            </div>
                            <section class="panel panel-info">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a> 
                                    </div>

                                    <h2 class="panel-title">Customer</h2>
                                </header>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table mb-none" id="datatable-ajax">
                                            <thead>
                                                <tr>
                                                   <th>Nama</th>
                                                   <th>No Telepon</th>
                                                   <th>Kejasama Dari Tanggal</th>
                                                   <th>Kerjasama Hingga Tanggal</th>
                                                   <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($customer as $item)
                                                    <td>{{$item->nama}}</td>
                                                    <td>{{$item->no_telepon}}</td>
                                                    <td>
                                                        <?php echo date('d F Y' , strtotime($item->awal)) ?>
                                                    </td>
                                                    <td>
                                                    <?php echo date('d F Y' , strtotime($item->akhir)) ?>
                                                    </td>
                                                    @if ($item->status=="Activate")
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs" disabled>
                                                            <i class="fa fa-check-circle"></i> Active
                                                        </button>
                                                    </td>
                                                    @elseif ($item->status=="")
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-xs" disabled>
                                                        <i class="fa fa-ban"></i> Deactivate
                                                        </button>
                                                    </td>
                                                    @elseif ($item->status=="Deactivate")
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-xs" disabled>
                                                        <i class="fa fa-ban"></i> Deactivate
                                                        </button>
                                                    </td>
                                                    @endif
                                                    </tr>
                                                    @endforeach
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                            <section class="panel panel-primary">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a> 
                                    </div>

                                    <h2 class="panel-title">Supplier</h2>
                                </header>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table mb-none" id="datatable">
                                            <thead>
                                                <tr>
                                                   <th>Nama</th>
                                                   <th>No Telepon</th>
                                                   <th>Alamat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($supplier as $item)
                                                    <td>{{$item->nama}}</td>
                                                    <td>{{$item->no_telepon}}</td>
                                                    <td>{{$item->alamat}}</td>
                                                </tr>
                                                    @endforeach
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                                    

@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#datatable-ajax').DataTable();
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#datatable').DataTable();
  });
  </script>
@endsection