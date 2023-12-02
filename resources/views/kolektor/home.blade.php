@extends('kolektor')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Home</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">
						<!-- <a href="{{ url('home') }}">Home </a>/ ... / -->
						<!-- <a href="{{ url('dKolektor') }}" title="You're here"> Data Kolektor</a> -->
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">

		<!-- @if(session('added'))
		<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
			<span class="badge badge-pill badge-success">Added</span>
				{{ session('added') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@elseif(session('updated'))
		<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
			<span class="badge badge-pill badge-warning">Updated</span>
				{{ session('updated') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@elseif(session('deleted'))
		<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
			<span class="badge badge-pill badge-danger">Deleted</span>
				{{ session('deleted') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif -->

		<div class="card">
			<div class="card-header-center">
                <center>
                    <img src="{{ asset('style/images/logoku.png') }}" style="width: 100px; height: 100px;">
                <h3 class="text-blue">Selamat Datang Kolektor {{ auth::guard('kolektor')->user()->name }} </h3><br>
                <h4>PT. Murni Finance adalah perusahan yang bergerak di bidang koperasi simpan-pinjam, berfokus pada penarikan pada debitur dan bukan sebagai lembaga penyedia pinjaman</h4>
				</center>
			</div>
        </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection