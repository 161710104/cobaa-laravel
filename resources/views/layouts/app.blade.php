    <!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>@yield('title')</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
        <meta name="author" content="JSOFT.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="{{ asset('dist/sweetalert.css') }}">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
        <link rel="stylesheet" href="/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="/assets/vendor/select2/select2.css" />
        <link rel="stylesheet" href="/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
        <link rel="stylesheet" href="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
        <link rel="stylesheet" href="/assets/vendor/morris/morris.css" />


        <!-- Theme CSS -->
        <link rel="stylesheet" href="/assets/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="/assets/vendor/modernizr/modernizr.js"></script>

    </head>
    <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @include('sweet::alert')
        <section class="body">

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">
                
                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">
                                    @role('admin')
                                    <li class="nav">
                                        <a href="/">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('customers') ? 'active' : ''}}">
                                        <a href="/admin/customers">
                                            <i class="fa fa-users"></i>
                                            <span>Pembeli</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('suppliers') ? 'active' : ''}}">
                                        <a href="/admin/suppliers">
                                            <i class="fa fa-group"></i>
                                            <span>Penjual</span>
                                        </a>
                                    </li>
                                            
                                    <li class="nav-item {{ Request::is('/admin/barangs') ? 'active' : ''}}">
                                        <a href="/admin/barangs">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang</span>
                                        </a>
                                    </li>

                                     <li class="nav-item {{ Request::is('/admin/barang_masuks') ? 'active' : ''}}">
                                        <a href="/admin/barang_masuks">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang Masuk</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('/admin/barang_keluars') ? 'active' : ''}}">
                                        <a href="/admin/barang_keluars">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang Keluar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('/admin/akumulasi') ? 'active' : ''}}">
                                        <a href="/admin/akumulasi">
                                            <i class="fa fa-book"></i>
                                            <span>Laporan Pemasukan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('/admin/laporan_pengeluaran') ? 'active' : ''}}">
                                        <a href="/admin/laporan_pengeluaran">
                                            <i class="fa fa-book"></i>
                                            <span>Laporan Pengeluaran</span>
                                        </a>
                                    </li>
                                    @endrole
                                    @role('karyawan')
                                    <li class="nav">
                                        <a href="/"> 
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                     <li class="nav-item {{ Request::is('/karyawan/barang_masuks') ? 'active' : ''}}">
                                        <a href="/karyawan/barang_masuks">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang Masuk</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('/karyawan/barang_keluars') ? 'active' : ''}}">
                                        <a href="/karyawan/barang_keluars">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang Keluar</span>
                                        </a>
                                    </li>
                                    @endrole
                                    @role('superadmin')
                                    <li class="nav">
                                        <a href="/">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('customers') ? 'active' : ''}}">
                                        <a href="/superadmin/customers">
                                            <i class="fa fa-users"></i>
                                            <span>Pembeli</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('suppliers') ? 'active' : ''}}">
                                        <a href="/superadmin/suppliers">
                                            <i class="fa fa-group"></i>
                                            <span>Penjual</span>
                                        </a>
                                    </li>
                                            
                                    <li class="nav-item {{ Request::is('/superadmin/barangs') ? 'active' : ''}}">
                                        <a href="/superadmin/barangs">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang</span>
                                        </a>
                                    </li>

                                     <li class="nav-item {{ Request::is('/superadmin/barang_masuks') ? 'active' : ''}}">
                                        <a href="/superadmin/barang_masuks">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang Masuk</span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('/superadmin/barang_keluars') ? 'active' : ''}}">
                                        <a href="/superadmin/barang_keluars">
                                            <i class="fa fa-dropbox"></i>
                                            <span>Barang Keluar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('/superadmin/akumulasi') ? 'active' : ''}}">
                                        <a href="/superadmin/akumulasi">
                                            <i class="fa fa-book"></i>
                                            <span>Laporan Pemasukan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('/superadmin/laporan_pengeluaran') ? 'active' : ''}}">
                                        <a href="/superadmin/laporan_pengeluaran">
                                            <i class="fa fa-book"></i>
                                            <span>Laporan Pengeluaran</span>
                                        </a>
                                    </li>
                                    @endrole
                                    
                                </ul>
                            </nav>
                            
                           
                        </div>
                
                    </div>
                
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                    <h2>
                        <div style="font-family: NEISTIL;">
                            <div class="dmy agileits w3layouts">
                                <script type="text/javascript">
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
                                    document.write(""+dayarray[day]+", "+daym+" "+montharray[month]+"  "+year+"")
                                </script>
                             </div>
                        </div>
                    </h2>
                    
                        <div class="right-wrapper pull-right">
                            <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="/assets/images/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                               {{ Auth::user()->name }}
                                <span class="role">administrator</span>
                            </div>
            
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"     style="display: none;">
                                            @csrf
                                        </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                        </div>
                    </header>

                    <!-- start: page -->
                    @yield('content')
                    <!-- end: page -->
                </section>
            </div>
        </section>

        
        <!-- Vendor -->

        <script src="/assets/vendor/jquery/jquery.js"></script>
        <script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

        
        
        <!-- Specific Page Vendor -->
        <script src="/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
        <script src="/assets/vendor/jquery-appear/jquery.appear.js"></script>
        <script src="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
        <script src="/assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.js"></script>
        <script src="/assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.pie.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.categories.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.resize.js"></script>
        <script src="/assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="/assets/vendor/raphael/raphael.js"></script>
        <script src="/assets/vendor/morris/morris.js"></script>
        <script src="/assets/vendor/gauge/gauge.js"></script>
        <script src="/assets/vendor/snap-svg/snap.svg.js"></script>
        <script src="/assets/vendor/liquid-meter/liquid.meter.js"></script>
        <script src="/assets/vendor/jqvmap/jquery.vmap.js"></script>
        <script src="/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
        <script src="/assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

        <!-- sweet allert -->
        <script src="{{ asset('dist/sweetalert.min.js') }}"></script>

        <!-- modal -->
            

        
        <!-- Theme Base, Components and Settings -->
        <script src="/assets/javascripts/theme.js"></script>
        
        <script src="/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
        <script src="/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

        <script src="/assets/javascripts/format_harga/my.js"></script>
        
        <!-- Theme Custom -->
        <script src="/assets/javascripts/theme.custom.js"></script>
        
        <!-- Theme Initialization Files -->
        <script src="/assets/javascripts/theme.init.js"></script>
        


        <!-- Examples -->
        <script type="text/javascript">
			$('.delete').click(function(e) {
			e.preventDefault(); // Prevent the href from redirecting directly
			var linkURL = $(this).attr("href");
			var name = $(this).attr("data-name");
			warnBeforeRedirect(linkURL,name);
			});
			 function warnBeforeRedirect(linkURL,name) {
			   swal({
			       title: "Apakah Anda Yakin?",
			       text: "Anda akan menghapus data dengan nama = "+name+" !",
			       type: "warning",
			       showCancelButton: true,
			       confirmButtonColor: "#DD6B55",
			       confirmButtonText: "Ya, Hapus!",
			       cancelButtonText: "Tidak, Batalkan!",
			       closeOnConfirm: false,
			       closeOnCancel: false
			     },
			    function(isConfirm){
			  if (isConfirm) {
			    console.log('done');
			    swal("Dihapus!", "Data dengan nama  "+name+" sudah di hapus.", "success");
			    window.location.href = linkURL;
			  } else {
			      swal("Dibatalkan", "Data dengan nama "+name+" aman :)", "error");
			  }
			});
			  }
	    </script>
        @yield('js')


    </body>
</html>

