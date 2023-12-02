@extends('main')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Angsuran</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">
						<a href="{{ url('home') }}">Home </a>/ ... /
						<a href="{{ url('dangsuran') }}"> Data Angsuran</a>/ ... /
						<a href="#" title="You're here"> Add Angsuran</a>
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
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					Tambah Data Agunan
				</div>
				<div class="pull-right">
					<a href="{{ url('dangsuran') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-4 offset-md-2">
						<form action="{{ url('dagunan') }}" method="post">
						@csrf
                        <div class="form-grup">
							<label> Pilih Id Debitur </label>
							
							<select type="text" class="form-control" id="debitur_id" name="debitur_id">
								<option value=""><--Pilih--></option>
								@foreach ($agunan as $item)
								<option value="{{$item->id}}">{{$item->id}}</option>	
								@endforeach
							</select>
							
						</div>
							<!-- <div class="form-group">
								<label>No Kontrak</label>
								<input type="text" name="no_kontrak" class="form-control @error('no_kontrak') is-invalid @enderror" value="{{ old('no_kontrak') }}" required autofocus>
								@error('no_kontrak')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div> -->
							<div class="form-group">
								<label>No. Agreement</label>
								<input type="text" name="no_agreement" class="form-control @error('no_agreement') is-invalid @enderror" value="{{ old('no_agreement') }}" placeholder="contoh Penulisan -> 1000399489" required>
								@error('no_agreement')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Tanggal kontrak</label>
								<input type="date" name="tgl_kontrak" class="form-control @error('tgl_kontrak') is-invalid @enderror" value="{{ old('tgl_kontrak') }}" required>
								@error('tgl_kontrak')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label>Tanggal Berakhir</label>
								<input type="date" name="tgl_berakhir" class="form-control @error('tgl_kberakhir') is-invalid @enderror" value="{{ old('tgl_berakhir') }}"  required>
								@error('tgl_berakhir')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label>Bunga</label>
								<input type="text" name="bunga" class="form-control @error('bunga') is-invalid @enderror" value="{{ old('bunga') }}" placeholder="persentase ditulis bentuk desimal contoh -> 0.5" required> % </input>
								@error('bunga')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Tenor</label>
								<input type="text" name="tenor" class="form-control @error('tenor') is-invalid @enderror" value="{{ old('tenor') }}" placeholder="contoh Penulisan-> 12 Bulan" required> Bulan</input>
								@error('tenor')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Angsuran/Bulan</label>
								<input type="text" name="angsuran_bulan" class="form-control @error('angsuran_bulan') is-invalid @enderror" value="{{ old('angsuran_bulan') }}" placeholder="contoh Penulisan->2000000"required>
								@error('angsuran_bulan')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label>Total Pinjaman</label>
								<input type="text" name="ttl_pinjaman" class="form-control @error('ttl_pinjaman') is-invalid @enderror" value="{{ old('ttl_pinjaman') }}" placeholder="contoh Penulisan->20000000000" required>
								@error('ttl_pinjaman')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label>Sisa Pinjaman</label>
								<input type="text" name="sisa_pinjaman" class="form-control @error('sisa_pinjaman') is-invalid @enderror" value="{{ old('sisa_pinjaman') }}" placeholder="contoh Penulisan->1000399489" required>
								@error('sisa_pinjaman')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-grup">
							<label> Kolektabilitas </label>
							<select type="text" class="form-control @error('kolektabilitas') is-invalid @enderror" id="kolektabilitas" name="kolektabilitas" required>
								<option value=""><--Pilih--></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
							</select>
                            </div><br>
							<button type="submit" class="btn btn-success">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection