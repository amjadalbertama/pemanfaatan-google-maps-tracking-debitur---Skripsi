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
						<div class="row justify-content-center my-auto">
							<div class="col-md-8 col-10 my-5">
								<div class="row justify-content-center px-3 mb-3"> <img id="logo" src="{{ asset('style/images/logoku.png') }}"> </div>
								<h3 class="mb-5 text-center heading">Murni Finance</h3>
								<h6 class="msg-info">Please Register your account</h6>
                                <!-- @if(session('regist'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Added</span>
                                            {{ session('added') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif -->
                                <form action="{{route('registerpostadmin')}}" method="POST">
                                    @csrf
                                    <div class="form-group"> 
                                        <label class="form-control-label text-muted">Name</label> 
                                        <input type="text" id="name" name="name" placeholder="Your name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <!-- <div class="form-group"> 
                                        <label class="form-control-label text-muted">Email</label> 
                                        <input type="text" id="email" name="email" placeholder="Phone no or email id" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email"> 
                                    </div> -->
                                    <div class="form-group"> 
                                        <label class="form-control-label text-muted">Password</label> 
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password"> 
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="form-group"> 
                                        <label class="form-control-label text-muted">Password Confirm</label> 
                                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password Confirm" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password"> 
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="row justify-content-center my-3 px-3"> 
                                        <button class="btn-block btn-color">Register </button> 
                                    </div>
                                    <div class="row justify-content-center my-2"> 
                                        <a href="{{ url('/loginadmin') }}"><medium class="text-muted"> Kembali ke Login</medium></a>
                                    </div>
                                
                                </form>
								
							</div>
						</div>
                        <br>
						<div class="bottom text-center mb-5">
							<p href="" class="sm-text mx-auto mb-3"></p>
						</div>
					</div>
					<div class="card card2">
						<div class="my-auto mx-md-5 px-md-5 right">
							<h3 class="text-white">We are more than just a company</h3> <small class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
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

