@extends('admin')

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
						<a href="{{ url('homei') }}">Home </a>/ ... /
						<a href="{{ url('ddebitur') }}"> Data Debitur </a>/ ... /
						<a href="#" title="You're here"> Edit Debitur</a>
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
					Edit Data Admin -{{ Auth::guard('user')->user()->name }}
				</div>
				<div class="pull-right">
					<a href="{{ url('homeadmin') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
                               
			<div class="card-body">
				<div class="row">
					<div class="col-md-4 offset-md-1">
                   
						<form action="{{ url('eadmin/'.Auth::guard('user')->user()->id) }}" method="post">
                        @method('patch')
						@csrf
                            <div class="page-title">
                                    <h2 class="text-center">Edit Admin</h2>
                                </div><br><br>
                            <div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', Auth::guard('user')->user()->name) }}">
                                @error('nama')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label>Password</label>
								<input type="text" name="Password" class="form-control @error('Password') is-invalid @enderror" value="{{old('password', Auth::guard('user')->user()->password) }}">
                                @error('Password')
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

			
				
				var latInputnew = document.querySelector("[name=latitude]");
				var lngInputnew = document.querySelector("[name=longitude]");
				// var latInput = document.getElementById("latitude").value;
				// var lngInput = document.getElementById("longitude").value;
				// console.log(latInput);
				
				var latlng = new google.maps.LatLng(-6.192030, 106.832985);
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