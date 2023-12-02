@extends('admin')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Map</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">
						<a href="{{ url('home') }}">Home </a>
						<a href="{{ url('mapkolektor') }}"> Pemetaan Map</a>
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

		@if(session('added'))
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
		@endif

		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					Data Debitur
					<a href="{{ url('dKolektor/add') }}" class="btn btn-success btn-sm" title="Add">
						<i class="fa fa-plus"></i>
					</a>
				</div>
				<div class="pull-right">
				
				<form action="{{ url('dKolektor') }}" method="GET" class="form-inline">
					<input class="form-control-sm" type="text" name="search" placeholder="search kolektor..." value="{{ old('search') }}">
					<button type="submit" class="btn btn-primary btn-sm" title="Search" style="margin-left:5px;">
						<i class="fa fa-search"></i>
					</button>
				</form>
					
				</div>
			</div>

			<div class="card-body table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>No. Kontrak</th>
							<th>Nama Debitur</th>
                            <th>Almt KTP</th>
                            <th>Almt Domisili</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
							<th>Action</th>
						</tr>
					</thead>

					
					@foreach ($debiturs as $no => $k)
					<tbody>
						<tr>
							<td>{{ ++$no + ($debiturs->currentPage()-1) * $debitur->perPage() }}</td>
							<td>{{ $k->no_kontrak }}</td>
							<td>{{ $k->nama_debitur }}</td>
                            <td>{{ $k->alamat_ktp }}</td>
                            <td>{{ $k->alamat_domisili }}</td>
                            <td>{{ $k->latitude }}</td>
                            <td>{{ $k->longitude}}</td>
							<td class="text-center">
								<a href="{{ url('ddebitur/edit/'. $k->id) }}" class="btn btn-warning btn-sm" title="Edit">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="{{ url('ddebitur/del/'. $k->id) }}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Yakin ingin menghapus data?')">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
				<div style="float:left;">
					<?php
					if ($debitur->count() < 10) { ?>
						Menampilkan {{ $debiturs->count() }} data dari {{ $debiturs->total() }} data<br>
						Halaman: {{ $debiturs->currentPage() }}
					<?php } else{ ?>
						Menampilkan {{ $debiturs->perPage() }} data dari {{ $debiturs->total() }} data<br>
						Halaman: {{ $debiturs->currentPage() }} <?php
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