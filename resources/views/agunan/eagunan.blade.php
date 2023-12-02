@extends('admin')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Agunan</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					
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
					Edit Data Agunan Debitur - {{ $agunan->nama_debitur }} 
				</div>
				<div class="pull-right">
					<a href="{{ url('dagunan') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>

			<div class="card-body">
				<div class="row">
					<form action="{{ url('dagunan/'.$agunan->id) }}" method="post">
							@method('patch')
							@csrf
					
							<!-- data agunan -->
					<!-- <div class="row" style="border: 1px solid black; padding-bottom: 30px;"> -->
						<div class="col-md-6 offset-md-1 " style="margin-top: 20px;">
									<div class="page-title" style="">
										<h2 class="text-center" >Data Angunan</h2>
									</div><br>
							<div class="form-group">
								<label>No. Agreement</label>
								<input type="text" name="no_agreement" class="form-control @error('no_agreement') is-invalid @enderror" value="{{ old('no_agreement', $agunan->no_agreement) }}"  required readonly>
								@error('no_agreement')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Tanggal kontrak</label>
								<input type="date" name="tgl_kontrak" class="form-control @error('tgl_kontrak') is-invalid @enderror" value="{{ old('tgl_kontrak', $agunan->tgl_kontrak) }}" required>
								@error('tgl_kontrak')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group col-md-6">
								<label>Tanggal Berakhir</label>
								<input type="date" name="tgl_berakhir" class="form-control @error('tgl_berakhir') is-invalid @enderror" value="{{ old('tgl_berakhir', $agunan->tgl_berakhir) }}"  required>
								@error('tgl_berakhir')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							
                            <div class="form-group col-md-6">
								<label>Bunga</label>
									<div class="form-group row offset-md-1">
										<input type="text" name="bunga" class="form-control @error('bunga') is-invalid @enderror col-md-2" value="{{ old('bunga', $agunan->bunga) }}" required> <p style=" margin-left: 10px; margin-top: 10px;">%</p>
										@error('bunga')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
							</div>
							<div class="form-group col-md-6">
								<label>Tenor</label>
									<div class="form-group row offset-md-1">
										<input type="text" name="tenor" class="form-control @error('tenor') is-invalid @enderror col-md-2" value="{{ old('tenor', $agunan->tenor) }}" required> <p style=" margin-left: 10px; margin-top: 10px;">Bulan</p>
										@error('tenor')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
							</div>
						</div>

							<div class="col-md-5"> 
								<div class="form-group" style="margin-top: 80px;">
									<label>Angsuran/Bulan</label>
									<input type="text" name="angsuran_bulan" class="form-control @error('angsuran_bulan') is-invalid @enderror" value="{{ old('angsuran_bulan', $agunan->angsuran_bulan) }}" required>
									@error('angsuran_bulan')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label>Total Pinjaman</label>
									<input type="text" name="total_pinjaman" class="form-control @error('total_pinjaman') is-invalid @enderror" value="{{ old('total_pinjaman', $agunan->total_pinjaman) }}"  required>
									@error('total_pinjaman')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label>Sisa Pinjaman</label>
									<input type="text" name="sisa_pinjaman" class="form-control @error('sisa_pinjaman') is-invalid @enderror" value="{{ old('sisa_pinjaman', $agunan->sisa_pinjaman) }}"  required>
									@error('sisa_pinjaman')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-grup" >
								<label> Kolektabilitas </label>
								<select type="text" class="form-control @error('kolektabilitas') is-invalid @enderror" id="kolektabilitas" name="kolektabilitas" required>
									<option value="{{ ($agunan->kolektabilitas) }}">{{ ($agunan->kolektabilitas) }}</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								</div><br>
								<br>
							</div>
                            <center><button type="submit" class="btn btn-success" style="width: 120px; border-radius: 5px;">Update</button></center>	
                        <!-- </div> -->
							
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
						
							
			// var tes = new Array("");

			function initMap() {

				// const datas = require('dummypta1');
				// var connection = new ActiveXObject("dummypta1.Connection") ;
				// connection.Open(connectionstring);
				// var debitur = new ActiveXObject("dummypta1.Recordset");

				// debitur.Open("SELECT * FROM debitur", connection);

			
				var addres = document.querySelector("[name=alamat_ktp]");
				var latInputnew = document.querySelector("[name=latitude]");
				var lngInputnew = document.querySelector("[name=longitude]");
				var latInput = document.getElementById("latitude").value;
				var lngInput = document.getElementById("longitude").value;
				// console.log(latInput);
				
				var latlng = new google.maps.LatLng(latInput, lngInput);
				console.log(latlng);
				// var url = `/api/gmaps`;
				// var query_mysql = document.querySelector("SELECT * FROM debitur");
				// var datas = document.querySelector("koneksi.php");
				// var datas = array(query_mysql);

				var map = new google.maps.Map(document.getElementById("map"), {
				zoom: 13,
				center: latlng,
				});

				var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				draggable : true,
				});

				google.maps.event.addListener(marker, 'dragend', function(){

				latInputnew.value = marker.getPosition().lat();
				lngInputnew.value = marker.getPosition().lng();
				addres.value = marker.getGeometry().location();
				});


				// sebaran lokasi Kolektor   
				
				

				// Sebaran Lokasi Debitur


					// perhitungan haversine

					// for (i in datas){
					// var items = document.getElementsByTagName('jarak');
					// var lokasit = datas[i].locd;

					// var latkol = latInput;
					// var lngkol = lngInput;
					// var latdeb = datas[i].lock[0];
					// var lngdeb = datas[i].lock[1];
					// console.log(latInput);
					

					// var earth_radius = 6372;
					// var r = 3.14 / 180;
					// var td = document.querySelector("[name=jarak]");
					// var x1 = (latdeb - latkol);
					// var x2 = (lngdeb - lngkol);
					
					// var dlat = x1 * r;
					// var dlng = x2 * r;
					// var a    = Math.sin(dlat/2) * Math.sin(dlat/2) + Math.cos(latkol * r) * Math.cos(latdeb * r) * Math.sin(dlng/2) * Math.sin(dlng/2) ;
					// var c    = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
					// var distance = earth_radius * c;
					
					// console.log(distance);

					// tes = distance;

					// for (var i = 0; i <= tes.length; i++) {
						// tes[i].innerHTML = tes[i].style.height;
						// document.getElementById('jarak').innerHTML += tes[i];
					// 	console.log(tes[i]);
					// }
					// console.log(distance);

					// console.log(td.value);
					// }
				
			}

	</script>
@endsection