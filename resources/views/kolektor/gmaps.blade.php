@extends('admin')

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
				<div id="map" style="height: 500px; margin-bottom: 20px;"></div><br><br>
					<div class="col-sm-3">
						<div class="page-title">
						<h2>Informasi Kolektor</h2>	
						</div>
					</div>
				
				
				<div class="card-body table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Nomor Telefon</th>
							<th>Email</th>
							<th>Status</th>
							<th>Latitude</th>
							<th>Longitude</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>

					
					@foreach ($kolektor as $no => $k)
					<tbody>
						<tr>
							<td>{{ ++$no + ($kolektor->currentPage()-1) * $kolektor->perPage() }}</td>
							<td>{{ $k->name }}</td>
							<td>{{ $k->kolektor_nomor }}</td>
							<td>{{ $k->kolektor_email }}</td> 	
							<td>{{ $k->kolektor_status}}</td>
							<td>{{ $k->latitude}}</td>
							<td>{{ $k->longitude}}</td>
							<!-- <td class="text-center">
								<a href="{{ url('detmaps/pilih/'. $k->id) }}" class="btn btn-warning btn-sm" title="Pilih Kolektor">
									<i class="fa fa-pencil"></i>
								</a> -->
								<!-- <a href="{{ url('dKolektor/del/'. $k->id) }}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Yakin ingin menghapus data?')">
									<i class="fa fa-trash"></i>
								</a> -->
							<!-- </td> -->
						</tr>
					</tbody>
					@endforeach
				</table>
				<div style="float:left;">
					<?php
					if ($kolektor->count() < 10) { ?>
						Menampilkan {{ $kolektor->count() }} data dari {{ $kolektor->total() }} data<br>
						Halaman: {{ $kolektor->currentPage() }}
					<?php } else{ ?>
						Menampilkan {{ $kolektor->perPage() }} data dari {{ $kolektor->total() }} data<br>
						Halaman: {{ $kolektor->currentPage() }} <?php
					}
					?>
				</div>

				<div style="float:right;">
					{{ $kolektor->links() }}
				</div>
				<br><br><br>

						<div>
							<label><b>Keterangan</b></label><br>
							<div>
								<img src="style/images/kolektor.png" height="55" width="35">
								<label>: Posisi Kolektor</label>
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

                        var latlng = new google.maps.LatLng(-6.192030, 106.832985);
                        console.log(latlng);
                        var latInput = document.querySelector("[name=Latitude]");
                        var lngInput = document.querySelector("[name=Longitude]");
                        // var url = `/api/gmaps`;
                        // var query_mysql = document.querySelector("SELECT * FROM debitur");
                        // var datas = document.querySelector("koneksi.php");
                        // var datas = array(query_mysql);
                    
                        
                        var map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 10,
                        center: latlng,
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
						
                        var data = [ 
							<?php foreach ($kolektor as $key => $value){ ?>
								{"lock":[<?=$value->latitude?>, <?=$value->longitude?>],"nama_kolektor":"<?=$value->name?>"},
							<?php } ?>
							]
							// console.log(data);
							

							for (i in data){
								
                                var gambar = {url: "style/images/kolektor.png",
											scaledSize: new google.maps.Size(30, 50),
											origin: new google.maps.Point(0,0),
											anchor: new google.maps.Point(0,0)
											};
										
								var lat = data[i].lock[0];
                                var lng = data[i].lock[1];
								var kol = data[i].nama_kolektor;
								var poskol = new google.maps.LatLng(lat, lng);
                               
                                console.log(kol);
								var markers = new google.maps.Marker({
								position: poskol,
                                icon: gambar,
								map: map,
								});
								
								var infowindow = new google.maps.InfoWindow({
								content: kol
								});
								infowindow.open(map, markers);
								// google.maps.event.addListener(markers,'click',function(){
								// infowindow.open(map, markers);
								// });

								// google.maps.event.addListener(markers, function(){
								// 	alert('This is ');
								// });

							}

						// Sebaran Lokasi Debitur

						var datas = [ 
							<?php foreach ($debitur as $key => $value){ ?>
								{"lock":[<?=$value->latitude?>, <?=$value->longitude?>],"nama_debitur":"<?=$value->nama_debitur?>"},
							<?php } ?>
							]
							console.log(datas);
							

							for(t in datas){
								
                                var gambar = {url: "style/images/lokdeb.jpg",
											scaledSize: new google.maps.Size(50, 50),
											origin: new google.maps.Point(0,0),
											anchor: new google.maps.Point(0,0)
											};
										
								var lat = datas[t].lock[0];
                                var lng = datas[t].lock[1];
								var deb = datas[t].nama_debitur;
								var posdeb = new google.maps.LatLng(lat, lng);
                               
                                console.log(lat);
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