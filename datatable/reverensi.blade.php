<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Dashboard | JSOFT Themes | JSOFT-Admin</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
        <meta name="author" content="JSOFT.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
        <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/sweetalert.css') }}">
        <link href="{{ asset('DataTables/css/dataTables.bootstrap4.css') }}" rel="stylesheet"> 
        <link href="{{ asset('DataTables/css/jquery.dataTables.css') }}" rel="stylesheet">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
        <link rel="stylesheet" href="/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

        <!-- Specific Page Vendor CSS -->
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
                                    <li class="nav-active">
                                        <a href="index.html">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                            <span>Forms</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="forms-basic.html">
                                                     Basic
                                                </a>
                                            </li>
                                            <li>
                                                <a href="forms-advanced.html">
                                                     Advanced
                                                </a>
                                            </li>
                                            <li>
                                                <a href="forms-validation.html">
                                                     Validation
                                                </a>
                                            </li>
                                            <li>
                                                <a href="forms-layouts.html">
                                                     Layouts
                                                </a>
                                            </li>
                                            <li>
                                                <a href="forms-wizard.html">
                                                     Wizard
                                                </a>
                                            </li>
                                            <li>
                                                <a href="forms-code-editor.html">
                                                     Code Editor
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                
                            <hr class="separator" />
                
                            <div class="sidebar-widget widget-tasks">
                                <div class="widget-header">
                                    <h6>Projects</h6>
                                    <div class="widget-toggle">+</div>
                                </div>
                                <div class="widget-content">
                                    <ul class="list-unstyled m-none">
                                        <li><a href="#">JSOFT HTML5 Template</a></li>
                                        <li><a href="#">Tucson Template</a></li>
                                        <li><a href="#">JSOFT Admin</a></li>
                                    </ul>
                                </div>
                            </div>
                
                            <hr class="separator" />
                
                            <div class="sidebar-widget widget-stats">
                                <div class="widget-header">
                                    <h6>Company Stats</h6>
                                    <div class="widget-toggle">+</div>
                                </div>
                                <div class="widget-content">
                                    <ul>
                                        <li>
                                            <span class="stats-title">Stat 1</span>
                                            <span class="stats-complete">85%</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                                    <span class="sr-only">85% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="stats-title">Stat 2</span>
                                            <span class="stats-complete">70%</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="stats-title">Stat 3</span>
                                            <span class="stats-complete">2%</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                    <span class="sr-only">2% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                        {{ __('Logout') }}<i class="fa fa-power-off"></i> Logout</a>
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
        <script src="{{ asset('DataTables/js/dataTables.bootstrap.min.js') }}"></script>

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
        <script src="{{ asset('assets/js/bootstrap-modal.js')}}"></script>

        
        <!-- Theme Base, Components and Settings -->
        <script src="/assets/javascripts/theme.js"></script>
        
        <script src="{{ asset('DataTables/js/jquery.dataTables.min.js') }}"></script>
        <script src="/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
        <script src="/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
        
        <!-- Theme Custom -->
        <script src="/assets/javascripts/theme.custom.js"></script>
        
        <!-- Theme Initialization Files -->
        <script src="/assets/javascripts/theme.init.js"></script>
        <script src="/assets/javascripts/tables/examples.datatables.ajax.js"></script>


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

