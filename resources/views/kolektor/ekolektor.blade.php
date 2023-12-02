@extends('admin')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Kolektor</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<!-- <li class="active">
						<a href="{{ url('homei') }}">Home </a>/ ... /
						<a href="{{ url('dKolektor') }}"> Data Kolektor </a>/ ... /
						<a href="#" title="You're here"> Edit Kolektor</a>
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
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					Edit Data Kolektor - {{ $kolektor->name }}
				</div>
				<div class="pull-right">
					<a href="{{ url('dKolektor') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>

			<div class="card-body">
				<div class="row">
				<!-- <div id="map" style=" width: 100% ; height: 660px; margin-bottom: 20px; margin-right: 20px;"></div> -->
					<div class="col-md-4 offset-md-1">
						<form action="{{ url('dKolektor/'.$kolektor->id) }}" method="post">
                        @method('patch')
						@csrf
						<div class="form-group">
								<label>Nama Kolektor</label>
								<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $kolektor->name) }}" required autofocus>
								@error('name')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Nomor Telefon Kolektor</label>
								<input type="text" name="kolektor_nomor" class="form-control @error('nomor') is-invalid @enderror" value="{{ old('kolektor_nomor', $kolektor->kolektor_nomor) }}" required>
								@error('nomor')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $kolektor->password) }}" required>
								@error('password')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Email Kolektor</label>
								<input type="email" name="kolektor_email" class="form-control @error('email') is-invalid @enderror" value="{{ old('kolektor_email', $kolektor->kolektor_email) }}" required>
								@error('email')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
                            <label> Status </label>
							<select type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="kolektor_status" required>
								<option value="{{ old('kolektor_status', $kolektor->kolektor_status) }} "><--Pilih--></option>
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
								<option value="Dalam Perjalan">Dalam Perjalan</option>
								<option value="Telah Sampai Tujuan">Telah Sampai Tujuan</option>
							</select>
                            </div>
							<div class="form-group">
								<label>latitude</label>
								<input type="text" id="latitude" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude', $kolektor->latitude) }}" required>
								@error('latitude')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>longitude</label>
								<input type="text" id="longitude" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude', $kolektor->longitude) }}" required>
								@error('longitude')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<button type="submit" class="btn btn-success">Save</button>
							
						</form>
					</div>
					<div class="col-md-6 ">
					<div class="center" style="margin-left: 30%; color: red;">
							*Geser Marker Untuk Menentukan titik Kordinat*
						</div><br>
					<div id="map" style=" width: 100% ; height: 600px; margin-bottom: 20px; margin-left: 20px; "></div>
					</div>
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
				// var kolektor = new ActiveXObject("dummypta1.Recordset");

				// debitur.Open("SELECT * FROM debitur", connection);

			
			
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