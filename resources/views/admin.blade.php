<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') - Afile.Archive</title>
	<meta name="description" content="Sufee Admin - HTML5 Admin Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="{{ asset('apple-icon.png') }}">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
	<link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
	<link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
	<!-- <link rel="stylesheet" href="{{ asset('style/assets/css/stylelogin.css') }}"> -->
	<!-- <link rel="stylesheet" href="{{ asset('js/maps.js') }}"> -->
	<link rel="stylesheet" href="{{ asset('css/mapsstyle.css') }}">
	<link href="{{ asset('style/assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

	<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
	
	<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
	crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>
	 -->
</head>

<body>
	
	<aside id="left-panel" class="left-panel">
		<nav class="navbar navbar-expand-sm navbar-default">
			<div class="navbar-header">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="./"><img src="{{ asset('style/images/logoku.png') }}" alt=""> Murni Finance</a>
				<a class="navbar-brand hidden" href="./">MF</a>
			</div>

			<div id="main-menu" class="main-menu collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="{{ url('homeadmin') }}"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
					</li>
					<h3 class="menu-title">Data Personalia</h3>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Data Debitur</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-users"></i><a href="{{ url('ddebitur') }}">Debitur</a></li>
							<li><i class="fa fa-plus"></i><a href="{{ url('ddebitur/add') }}">Tambah Debitur</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Data Kolektor</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-users"></i><a href="{{ url('dKolektor') }}">Kolektor</a></li>
							<!-- <li><i class="fa fa-book"></i><a href="{{ url('route') }}">Rute</a></li> -->
							<!-- <li><i class="fa fa-map-marker"></i><a href="{{ url('gmaps') }}">Map Informasi</a></li> -->
							<li><i class="fa fa-plus"></i><a href="{{ url('dKolektor/add') }}">Tambah Kolektor</a></li>
						</ul>
					</li>
					<h3 class="menu-title">Data Agunan</h3>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Data Agunan</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-briefcase"></i><a href="{{ url('dagunan') }}">Tabel Data Agunan</a></li>
							<!-- <li><i class="fa fa-plus"></i><a href="{{ url('dagunan/add') }}">Tambah agunan</a></li> -->
						</ul>
					</li>

					<!-- <h3 class="menu-title">Data Pinjaman Angsuran</h3>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Data Angsuran</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-briefcase"></i><a href="{{ url('dangsuran') }}">Angsuran</a></li>
							<li><i class="fa fa-plus"></i><a href="{{ url('dangsuran/add') }}">Tambah Angsuran</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Data Forecast Angsuran</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-laptop"></i><a href="#">Data Kriteria</a></li>
							<li><i class="fa fa-sort-numeric-asc"></i><a href="#">Data Riwayat Angsur</a></li>
							<li><i class="fa fa-spinner"></i><a href="#">Forecast Angsuran</a></li>
						</ul>
					</li>

					<h3 class="menu-title">Data Jaminan</h3>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shield"></i>Data Objek Jaminan</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-building"></i><a href="#">Jaminan Bangunan</a></li>
							<li><i class="fa fa-truck"></i><a href="#">Jaminan Kendaraan</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Data Jaminan Debitur</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-shield"></i><a href="#">Jaminan Debitur</a></li>
							<li><i class="fa fa-plus"></i><a href="#">Tambah Jaminan</a></li>
						</ul>
					</li> -->

					<h3 class="menu-title">MAPS</h3>
					<li class="menu-item-has-children dropdown">
						<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-question-circle"></i>Panduan Pengguna</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="menu-icon fa fa-user"></i><a href="page-login.html">Data Personalia</a></li>
							<li><i class="menu-icon fa fa-briefcase"></i><a href="page-register.html">Data Pinjaman</a></li>
							<li><i class="menu-icon fa fa-shield"></i><a href="pages-forget.html">Data Jaminan</a></li>
						</ul> -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-map"></i>Maps</a>
						<ul class="sub-menu children dropdown-menu">
							<!-- <li><i class="fa fa-users"></i><a href="{{ url('dKolektor') }}">Kolektor</a></li> -->
							<!-- <li><i class="fa fa-book"></i><a href="{{ url('route') }}">Rute</a></li> -->
							<li><i class="fa fa-map-marker"></i><a href="{{ url('gmaps') }}">Map Informasi</a></li>
							<!-- <li><i class="fa fa-plus"></i><a href="{{ url('dKolektor/add') }}">Tambah Kolektor</a></li> -->
						</ul>
					</li>
					
				</ul>
			</div>
		</nav>
	</aside>

	<div id="right-panel" class="right-panel">
		<header id="header" class="header">
			<div class="header-menu">
				<div class="col-sm-7">
					<a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
				</div>
				<div class="col-sm-5">
					<div class="user-area dropdown float-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					
						Hallo Admin {{ auth::guard('user')->user()->name }}
						</a>
						<div class="user-menu dropdown-menu">
							<a class="nav-link" href="{{ url('editadmin') }}"><i class="fa fa -cog"></i>Edit </a>
							<a class="nav-link" href="{{ url('logoutadmin') }}"><i class="fa fa-power -off"></i>Logout</a>
						</div>
					</div>
					<!-- <div class="language-select dropdown" id="language-select">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
							<i class="flag-icon flag-icon-id"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="language" >
							<div class="dropdown-item">
								<span class="flag-icon flag-icon-us"></span>
							</div>
							<div class="dropdown-item">
								<i class="flag-icon flag-icon-jp"></i>
							</div>
							<div class="dropdown-item">
								<i class="flag-icon flag-icon-es"></i>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</header>
							@if(session('main'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
                                        <span class="badge badge-pill badge-success">SUCCESS</span>
                                            {{ session('main') }}
                                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
                                            <!-- <span aria-hidden="true">&times;</span>
                                        </button> -->
                                    </div>
                                @endif

						
		<!-- <div class="card">
			<div class="card-header-center">
                <center>
                    <img src="{{ asset('style/images/logoku.png') }}" style="width: 100px; height: 100px;">
                <h3 class="text-blue">Wellcome Admin {{ auth::guard('user')->user()->name }} </h3><br>
                PT. Murni Finance adalah perusahan yang bergerak di bidang koperasi simpan-pinjam, berfokus pada penarikan pada debitur dan bukan sebagai lembaga penyedia pinjaman
				</center>
			</div>
        </div> -->
								
		@yield('breadcumbs')

		@yield('content')

	</div>
		
	<script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<script src="{{ asset('style/assets/js/plugins.js') }}"></script>
	<script src="{{ asset('style/assets/js/main.js') }}"></script>
	<!-- <script src="{{ asset('js/maps.js') }}"></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACOLjZpTZ6zPoc0_xPmOjz0BWL2LPTDsQ&callback=initMap&libraries=&v=weekly"async></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<script src="{{ asset('style/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
	<script src="{{ asset('style/assets/js/dashboard.js') }}"></script>
	<script src="{{ asset('style/assets/js/widgets.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	

	<!-- <script src="{{ asset('style/assets/js/lib/vector-map/jquery.vmap.js') }}"></script>
	<script src="{{ asset('style/assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('style/assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
	<script src="{{ asset('style/assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script> -->

</body>
</html>