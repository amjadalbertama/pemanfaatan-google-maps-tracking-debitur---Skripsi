<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login User - Afile.Archive</title>
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
    <link rel="stylesheet" href="{{ asset('style/assets/css/stylelogin.css') }}">
	<!-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'> -->



	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
        <div class="container px-4 py-5 mx-auto">
			<div class="card card0">
				<div class="d-flex flex-lg-row flex-column-reverse">
					<div class="card card1">
					<div id="button" class="btn-left">
						<!-- <a class="btn btn-white" href="#" active>Login Super Admin</a> -->
						<a class="btn btn-white" href="{{ url('/loginkolektor') }}">Login Kolektor</a>

						<!-- <a class="button_airpump" href="#">Air Pump On</a>
						<a class="button_airpump" href="#">Air Pump Off</a> -->
					</div>
						<div class="row justify-content-center my-auto">
							<div class="col-md-8 col-10 my-5">
								<div class="row justify-content-center px-3 mb-3"> <img id="logo" src="{{ asset('style/images/logoku.png') }}"> </div>
								<h3 class="mb-5 text-center heading">Murni Finance</h3>
								<h5 class="msg-info">Login Admin</h5>
								@if(session('regist'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
                                        <span class="badge badge-pill badge-success">SUCCESS</span>
                                            {{ session('regist') }}
                                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
                                            <!-- <span aria-hidden="true">&times;</span>
                                        </button> -->
                                    </div>
								@elseif(session('loginq'))
									<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show text-center">
										<span class="badge badge-pill badge-warning">GAGAL</span>
											{{ session('loginq') }}
											<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button> -->
									</div>
								@elseif(session('logout'))
									<div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
										<span class="badge badge-pill badge-success">SUCCESS</span>
											{{ session('logout') }}
											<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button> -->
									</div>
                                @endif
                                <form action="{{route('loginpostadmin')}}" method="POST">
                                    @csrf
									<div class="form-group"> 
                                        <label class="form-control-label text-muted">Name</label> 
                                        <input type="text" id="name" name="name" placeholder="Your name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="form-group"> 
                                        <label class="form-control-label text-muted">Password</label> 
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password"> 
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="row justify-content-center my-3 px-3"> 
                                        <button class="btn-block btn-color">Login </button> 
                                    </div><br><br><br><br><br><br><br>
                                    <div class="row justify-content-center my-2"> 
                                        <a href="loginq"><small class="text-muted"></small></a>
                                    </div>
                                </form>
								<br>
							</div>
						</div>
						<!-- <div class="bottom text-center mb-5">
							<p href="" class="sm-text mx-auto mb-3">Don't have an account?<a href="{{ url('/registeradmin') }}"><button class="btn btn-white ml-2">Create new</button></a></p>
							<br><br><br>
						</div> -->
					</div>
					<div class="card card2">
						<div class="my-auto mx-md-5 px-md-5 right">
							<h3 class="text-white">About my company</h3> <small class="text-white">PT. Murni Finance adalah perusahan yang bergerak di bidang koperasi simpan-pinjam, berfokus pada penarikan pada debitur dan bukan sebagai lembaga penyedia pinjaman</small>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
		
    
    <script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>



</html>

