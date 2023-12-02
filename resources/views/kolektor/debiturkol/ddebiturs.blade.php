@extends('kolektor')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Debitur</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<!-- <li class="active">
						<a href="{{ url('home') }}">Home </a>/ ... /
						<a href="{{ url('ddebitur') }}" title="You're here"> Data Debitur</a>
					</li> -->
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
			<div class="card-header">
				<div class="pull-left">
					Data Debitur
					<!-- <a href="{{ url('ddebitur/add') }}" class="btn btn-success btn-sm" title="Add">
						<i class="fa fa-plus"></i>
					</a> -->
				</div>
				<div class="pull-right">
				
				<form action="{{ url('sdebiturkol') }}" method="GET" class="form-inline">
					<input class="form-control-sm" type="text" name="search" placeholder="search debitur..." value="{{ old('search') }}">
					<button type="submit" class="btn btn-primary btn-sm" title="Search" style="margin-left:5px;">
						<i class="fa fa-search"></i>
					</button>
				</form>
					
				</div>
			</div>

			<div class="card-body table-responsive">
			<form action="{{ url('dKolektor/'. Auth::guard('kolektor')->user()->id) }}" method="post" >
                        @method('patch')
						@csrf
                        
                            <div class="page-title">
                                <h2 class="text-center" hidden>PERHITUNGAN JARAK DEBITUR TERDEKAT</h2>
                            </div><br>
                            <div class="form-group" hidden>
                                <label> <h4>Nama Kolektor:  {{ Auth::guard('kolektor')->user()->name }} </h4></label>
                            </div>
						<div class="form-grup" hidden>
							<label> <h5>-> Latitude</h5> </label>
							<input type="text" class="form-control" id="latitude" name="Latitude" value="{{ Auth::guard('kolektor')->user()->latitude }}" readonly>
						</div>	

						<div class="form-grup"hidden>	
							<label><h5>-> Longitude</h5>  </label>
							<input type="text" class="form-control"  id="longitude" name="Longitude" value="{{ Auth::guard('kolektor')->user()->longitude }}" readonly>
						</div>
						<?php

						$latitudekol = $kolektor->latitude;
						$longitudekol = $kolektor->longitude;
						
						?>
                    <form>
						<br>
				<table class="table table-bordered">
					<thead>
						<tr>
						<th>No.</th>
							<th>No. Kontrak</th>
							<th>Nama Debitur</th>
							<th>Kelamin</th>
                            <th>No.telp</th>
                            <th>No. KTP</th>
                            <th>No. Npwp</th>
                            <th>Almt Tinggal</th>
                           	<th>Status Hunian</th>
                            <th>Lama Tinggal</th>
							 <th>Latitude</th>
							<th>Longitude</th>
							<th>Action</th>
						</tr>
					</thead>

					
					@foreach ($debitur as $no => $k)
					<?php
								$latdeb = $k->latitude;
								$lngdeb = $k->longitude;
								?>
					<tbody>
						<tr>
							<td>{{ ++$no + ($debitur->currentPage()-1) * $debitur->perPage() }}</td>
							<td>{{ $k->no_kontrak }}-RJK</td>
							<td>{{ $k->nama_debitur }}</td>
							<td>{{ $k->kelamin }}</td>
                            <td>{{ $k->no_seluler }}</td>
                            <td>{{ $k->no_ktp }}</td>
                            <td>{{ $k->no_npwp }}</td>
                            <td>{{ $k->alamat_tinggal }},{{ $k->kelurahan_at }},{{ $k->kecamatan_at }},{{ $k->provinsi_at }},{{ $k->kota_at }},{{ $k->kodepos_at }}</td>
                            <td>{{ $k->status_hunian }}</td>
                            <td>{{ $k->lama_tinggal_thn}} Tahun {{ $k->lama_tinggal_bln}} Bulan</td>
							<td>{{ $k->latitude}}</td>
							<td>{{ $k->longitude}}</td>
							<td class="text-center">
							<a href="{{ url('ddebiturdet/'. $k->id) }}" class="btn btn-warning btn-sm" title="Detail">
									<i class="fa fa-pencil"></i>
								</a> 
								<a href='https://www.google.co.id/maps/dir/<?= $latitudekol.','.$longitudekol?>/<?= $latdeb.','.$lngdeb?>' target='_blank' class="btn btn-primary btn-sm">
									<i class="fa fa-map-marker"></i> Navigation
								</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
				<div style="float:left;">
					<?php
					if ($debitur->count() < 10) { ?>
						Menampilkan {{ $debitur->count() }} data dari {{ $debitur->total() }} data<br>
						Halaman: {{ $debitur->currentPage() }}
					<?php } else{ ?>
						Menampilkan {{ $debitur->perPage() }} data dari {{ $debitur->total() }} data<br>
						Halaman: {{ $debitur->currentPage() }} <?php
					}
					?>
				</div>

				<div style="float:right;">
					{{ $debitur->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection