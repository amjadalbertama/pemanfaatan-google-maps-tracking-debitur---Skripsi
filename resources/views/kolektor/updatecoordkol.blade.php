@extends('kolektor')

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
					Edit Data Kolektor - {{ Auth::guard('kolektor')->user()->name }}
				</div>
				<div class="pull-right">
					<a href="{{ url('dKolektor') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>

			<div class="card-body">
								
				<div class="row">
				<div id="map" style=" width: 50% ; height: 660px; margin-bottom: 20px; margin-right: 20px;"></div>
					<div class="col-md-4">
								@if(session('updated'))
									<div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
										<span class="badge badge-pill badge-success">SUCCESS</span>
											{{ session('updated') }}
											<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button> -->
									</div>
                                @endif
					
					<div class="form-group">
						<button id="getcoord" class="btn btn-success">Get your Coordinate</button>
					</div>
						<form action="{{ url('coordkol/'. Auth::guard('kolektor')->user()->id) }}" method="post">
                        @method('patch')
						@csrf
                            <div class="form-group" hidden>
								<label>Nama Kolektor</label>
								<input type="text" name="name" class="form-control @error('nama') is-invalid @enderror" value="{{ old('name', Auth::guard('kolektor')->user()->name) }}" autofocus>
                                @error('nama')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group"hidden>
								<label>Nomor Telefon Kolektor</label>
								<input type="text" name="kolektor_nomor" class="form-control @error('nomor') is-invalid @enderror" value="{{ old('kolektor_nomor', Auth::guard('kolektor')->user()->kolektor_nomor) }}">
                                @error('nomor')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}"placeholder="Ketik Ulang Password Anda">
                                @error('password')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group"hidden>
								<label>Email Kolektor</label>
								<input type="email" name="kolektor_email" class="form-control @error('email') is-invalid @enderror" value="{{ old('kolektor_email', Auth::guard('kolektor')->user()->kolektor_email) }}">
                                @error('email')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-grup">
							<label> Status Saat Ini </label>
							<select type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="kolektor_status" required>
								<option value="">{{ Auth::guard('kolektor')->user()->kolektor_status }}</option>
								<!-- <option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option> -->
								<option value="Dalam Perjalan">Dalam Perjalan</option>
								<option value="Telah Sampai Tujuan">Telah Sampai Tujuan</option>
							</select>
                            </div>
							
							<div class="form-group">
								<label>Latitude</label>
								<input type="text" name="latitude" id="latitude"  class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude', Auth::guard('kolektor')->user()->latitude) }}" readonly>
                                @error('status')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Longitude</label>
								<input type="text" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude', Auth::guard('kolektor')->user()->longitude) }}" readonly>
                                @error('status')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<button type="submit" class="btn btn-success">Save</button>
							
						</form>
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
				// var debitur = new ActiveXObject("dummypta1.Recordset");

				// debitur.Open("SELECT * FROM debitur", connection);

			
				// console.log(latlng);
				var latInputnew = document.querySelector("[name=latitude]");
				var lngInputnew = document.querySelector("[name=longitude]");
				var latInput = document.getElementById("latitude").value;
				var lngInput = document.getElementById("longitude").value;
				// console.log(latInput);

				// var latlng = new google.maps.LatLng(latInput, lngInput);

				// var url = `/api/gmaps`;
				// var query_mysql = document.querySelector("SELECT * FROM debitur");
				// var datas = document.querySelector("koneksi.php");
				// var datas = array(query_mysql);

				
				// var map = new google.maps.Map(document.getElementById("map"), {
				// zoom: 13,
				// center: latlng,
				// });



				// var marker = new google.maps.Marker({
				// position: latlng,
				// map: map,
				// // draggable : true,
				// });

				// google.maps.event.addListener(marker, 'dragend', function(){

				// 	latInputnew.value = marker.getPosition().lat();
				// 	lngInputnew.value = marker.getPosition().lng();
				// });


				// google.maps.event.addListener(marker, 'dragend', function(){

				// latInputnew.value = marker.getPosition().lat();
				// lngInputnew.value = marker.getPosition().lng();
				// });


				$('#getcoord').click(function(){

					if (navigator.geolocation) 
                    	navigator.geolocation.getCurrentPosition(function(position){
							console.log(position);

							var lat = position.coords.latitude;
							var lng = position.coords.longitude;

							latInputnew.value = lat;
							lngInputnew.value = lng;

							var latlng = new google.maps.LatLng(lat, lng);

							var map = new google.maps.Map(document.getElementById("map"), {
							zoom: 13,
							center: latlng,
							});
							var marker = new google.maps.Marker({
							position: latlng,
							map: map,
							// draggable : true,
							});

							// latInputnew.value = marker.getPosition().lat();
							// lngInputnew.value = marker.getPosition().lng();
						});
					else
						console.log("geolocation tidak support");

				}) 
                    
					
                //     } else {
                //     x.innerHTML = "Browser mu tidak support.";
                //     }
                // }
				
			}

	</script>
@endsection