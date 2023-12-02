@extends('kolektor')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Map Sebaran Lokasi Debitur</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<!-- <li class="active">
						<a href="{{ url('home') }}">Home</a> /
						<a href="{{ url('sasDebitur') }}"> Data Debitur Siap Tagih</a>
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

		
			<div class="row">
				<div id="map" style="height: 660px; margin-bottom: 20px;"></div><br><br>
						<div class="form-grup" hidden>
							<label> <h5>-> Latitude</h5> </label>
							<input type="text" class="form-control" id="latitude" name="Latitude" value="{{ Auth::guard('kolektor')->user()->latitude }}" readonly>
						</div>	

						<div class="form-grup"hidden>	
							<label><h5>-> Longitude</h5>  </label>
							<input type="text" class="form-control"  id="longitude" name="Longitude" value="{{ Auth::guard('kolektor')->user()->longitude }}" readonly>
						</div>

						<div>
							<label><b>Keterangan</b></label><br>
							<div>
								<img src="style/images/kolektor.png" height="55" width="35">
								<label>: Posisi Anda Saat Ini</label>
							</div><br>
							
							<div>
								<img src="style/images/lokdeb.jpg" height="50" width="45">
								<label>: Posisi Debitur</label>
							</div>
						</div>
						
						<!-- <button class="btn btn-success" type="submit">Pilih</button> -->
						<!-- <div class="form-grup">
							<label> Latitude </label>
							<input type="text" class="form-control" id="latitude" name="Latitude">
						</div>	

						<div class="form-grup">	
							<label> Longitude </label>
							<input type="text" class="form-control"  id="longitude" name="Longitude">
						</div> -->
					
			</div>
					

						

				<script>
                
                
                    function initMap() {
                    	//const datas = require('dummypta1');
                        // var connection = new ActiveXObject("dummypta1.Connection") ;
                        // connection.Open(connectionstring);
                        // var debitur = new ActiveXObject("dummypta1.Recordset");
                    
                        // debitur.Open("SELECT * FROM debitur", connection);

                        // var latlng = new google.maps.LatLng(-6.192030, 106.832985);
                        
                        // var latInput = document.querySelector("[name=Latitude]");
                        // var lngInput = document.querySelector("[name=Longitude]");
						var latkol = document.getElementById("latitude").value;
						var lngkol = document.getElementById("longitude").value;

                        // var url = `/api/gmaps`;
                        // var query_mysql = document.querySelector("SELECT * FROM debitur");
                        // var datas = document.querySelector("koneksi.php");
                        // var datas = array(query_mysql);
                    
                        var latlng = new google.maps.LatLng(latkol, lngkol);
						console.log(latkol);

                        var map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 10,
                        center: latlng,
                        });

						var gambarkol = {url: "style/images/kolektor.png",
											scaledSize: new google.maps.Size(30, 50),
											origin: new google.maps.Point(0,0),
											anchor: new google.maps.Point(0,0)
											};

						var marker = new google.maps.Marker({
						icon: gambarkol,
                        position: latlng,
                        map: map,
                        draggable : false,
                        });

                        // var marker = new google.maps.Marker({
                        // position: latlng,
                        // map: map,
                        // draggable : true,
                        // });

                        // google.maps.event.addListener(marker, 'dragend', function(){
                        // latInput.value = marker.getPosition().lat();
                        // lngInput.value = marker.getPosition().lng();
                        // });


                        // sebaran lokasi Kolektor   
						
                        

						// Sebaran Lokasi Debitur

						var datas = [ 
							<?php foreach ($debitur as $key => $value){ ?>
								{"lock":[<?=$value->latitude?>, <?=$value->longitude?>],"nama_debitur":"<?=$value->nama_debitur?>"},
							<?php } ?>
							]
							console.log(datas);
							

							for (t in datas){
								
                                var gambar = {url: "style/images/lokdeb.jpg",
											scaledSize: new google.maps.Size(50, 50),
											origin: new google.maps.Point(0,0),
											anchor: new google.maps.Point(0,0)
											};
										
								var lat = datas[t].lock[0];
                                var lng = datas[t].lock[1];
								var deb = datas[t].nama_debitur;
								var posdeb = new google.maps.LatLng(lat, lng);
                               
                                console.log(deb);
								var markert = new google.maps.Marker({
								position: posdeb,
                                icon: gambar,
								map: map,
								});

								var infowindow = new google.maps.InfoWindow({
								content: deb
								});
								infowindow.open(map, markert);

								// google.maps.event.addListener(markert,'click',function(){
								// infowindow.open(map, markert);
								// });

							}

							
                    }

                </script>
			


						
			</div>
		</div>
	</div>
</div>

@endsection