@extends('admin')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Map Lokasi kolektor</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<div class="pull-right">
					<a href="{{ url('gmaps') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
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

		
			<!-- <div class="card-header">
				<div class="pull-left">
					Data Kolektor
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
			</div> -->

		
			<div class="row">
				<div id="map" style=" width: 60% ; height: 660px; margin-bottom: 20px; margin-right: 20px;">
                       
				</div>
					<form action="{{ url('dKolektor/'.$kolektor->id) }}" method="post">
                        @method('patch')
						@csrf
                        
                            <div class="page-title">
                                <h2 class="text-center">PERHITUNGAN JARAK DEBITUR TERDEKAT</h2>
                            </div><br><br>
                            <div class="form-group" >
                                <label> <h4>Nama Kolektor:  {{ ($kolektor->name) }} </h4></label>
                            </div>
							<h4>Posisi coord kolektor saat ini:</h4><br>
						<div class="form-grup">
							<label> <h5>-> Latitude</h5> </label>
							<input type="text" class="form-control" id="latitude" name="Latitude" value="{{ ($kolektor->latitude) }}">
						</div>	

						<div class="form-grup">	
							<label><h5>-> Longitude</h5>  </label>
							<input type="text" class="form-control"  id="longitude" name="Longitude" value="{{ ($kolektor->longitude) }}">
						</div>
						<?php

						$latitudekol = $kolektor->latitude;
						$longitudekol = $kolektor->longitude;
						
						?>
                    <form><br>
					<h4>Tabel jarak berdasarkan lokasi debitur:</h4>
				<div class="card-body table-responsive">
					<table class="table table-bordered" id="t">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th>Hasil</th>
							</tr>
						</thead>

						
						@foreach ($debitur as $no => $k)
						
						
									<?php 


									// echo $k;
									
										// $latkol = $latitudekol;
										// $lngkol = $longitudekol;
										// $latdeb = $k->latitude;
										// $lngdeb = $k->longitude;

										// $earth_radius = 6372;

										// $dlat = deg2rad($latdeb -$latkol);
										// $dlng = deg2rad($lngdeb -$lngkol);
										// $a    = sin($dlat/2) * sin($dlat/2) + cos(deg2rad($latkol)) * cos(deg2rad($latdeb)) * sin($dlng/2) * sin($dlng/2) ;
										// $c    = 2 * asin(sqrt($a));
										// $distance = $earth_radius * $c;
										// echo round($distance,2);

										// array_multisort($distance,SORT_ASC,$debitur);

										// $data[] = array($k->nama_debitur,
										// $k->latitude,
										// $k->longitude,
										// $distance);
									?>
						<tbody>
							<tr>
								<td>{{ ++$no + ($debitur->currentPage()-1) * $debitur->perPage() }}</td>
								<td>{{ $k->nama_debitur }}</td>
								<td>{{ $k->latitude}}</td>
								<td>{{ $k->longitude}}</td>
								<td>
									<?php 
									
										$latkol = $latitudekol;
										$lngkol = $longitudekol;
										$latdeb = $k->latitude;
										$lngdeb = $k->longitude;

										$earth_radius = 6372;

										$dlat = deg2rad($latdeb -$latkol);
										$dlng = deg2rad($lngdeb -$lngkol);
										$a    = sin($dlat/2) * sin($dlat/2) + cos(deg2rad($latkol)) * cos(deg2rad($latdeb)) * sin($dlng/2) * sin($dlng/2) ;
										$c    = 2 * asin(sqrt($a));
										$distance = $earth_radius * $c;
									
										echo round($distance,2);
									?>

									 Km

								</td>
								<!-- <td class="text-center">
									<a href="{{ url('dKolektor/edit/'. $k->id) }}" class="btn btn-warning btn-sm" title="Edit">
										<i class="fa fa-pencil"></i>
									</a>
									<a href="{{ url('dKolektor/del/'. $k->id) }}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Yakin ingin menghapus data?')">
										<i class="fa fa-trash"></i>
									</a>
								</td> -->
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
	

				<script>

					
                
					// var tes = new Array("");

					function initMap() {

                    	// const datas = require('dummypta1');
                        // var connection = new ActiveXObject("dummypta1.Connection") ;
                        // connection.Open(connectionstring);
                        // var debitur = new ActiveXObject("dummypta1.Recordset");
                    
                        // debitur.Open("SELECT * FROM debitur", connection);

                       
                        // console.log(latlng);
                       
                        // var lngInput = document.querySelector("[name=Longitude]");
						var latInput = document.getElementById("latitude").value;
                        var lngInput = document.getElementById("longitude").value;
						// console.log(latInput);

						var latlng = new google.maps.LatLng(latInput, lngInput);

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
                        draggable : false,
                        });

						

                        // google.maps.event.addListener(marker, 'dragend', function(){
                        // latInput.value = marker.getPosition().lat();
                        // lngInput.value = marker.getPosition().lng();
                        // });


                        // sebaran lokasi Kolektor   
						
                        

						// Sebaran Lokasi Debitur

						var datas = [ 
							<?php foreach ($debitur as $key => $value){ ?>
								{"lock":[<?=$value->latitude?>, <?=$value->longitude?>]},
							<?php } ?>
							]
							console.log(datas);
							

							for (i in datas){
								
                                var gambar = {url: "style/images/lokdeb.jpg",
											scaledSize: new google.maps.Size(50, 50),
											origin: new google.maps.Point(0,0),
											anchor: new google.maps.Point(0,0)
											};
										
								var lat = datas[i].lock[0];
                                var lng = datas[i].lock[1];
								var posdeb = new google.maps.LatLng(lat, lng);
                               
                                console.log(lat);
								var markert = new google.maps.Marker({
								position: posdeb,
                                icon: gambar,
								map: map,
								});

							}

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
			

						
			<!-- </div>
		</div> -->
	<!-- </div>
</div> -->

@endsection