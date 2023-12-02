@extends('main')

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
					<li class="active">
						<a href="{{ url('home') }}">Home</a> /
						<a href="{{ url('sasDebitur') }}"> Data Debitur Siap Tagih</a>
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

		
				<div class="row">
					<div class="col-sm-8"> 
						<div id="map" style="width: 100%; height: 800px;"></div>
					</div>
					
					<div class="col-sm-3 right">
						<div class="page-title">
							<h2>Tentukan Coordinate Kolektor</h2>
						</div><br>
						<div class="form-grup">
							<label><h5> Pilih Kolektor </h5></label>
							<select type="text" class="form-control" id="nama_kolektor" name="nama_kolektor">
								<option value=""><--Pilih--></option>
								@foreach ($kolektor as $item => $k)
								<option value="{{$k->id}}">{{$k->kolektor_nama}}</option>
								@endforeach
							</select>	
								
						</div><br>
						<div class="form-grup">
						<a href="{{ url('detmaps/pilih/'. $k->id) }}" class="btn btn-success" title="Pilih" style="width: 200px; height: 40px;">Pilih</a>
						</div><br><br><br>

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

                    <!-- <div id="map">
                       
                    </div> -->
				</div>
				
				<script>
						// var peta1 = L.tileLayer('https://maps.googleapis.com/maps/api/js?key=AIzaSyACOLjZpTZ6zPoc0_xPmOjz0BWL2LPTDsQ&callback=initMap',{
						// 	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
						// 			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
						// 			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
						// 		id: 'mapbox/streets-v11'
						// });

								var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
								attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
									'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
									'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
								id: 'mapbox/streets-v11'
							});

						var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
								attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
									'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
									'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
								id: 'mapbox/satellite-v9'
							});


						var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
								attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
							});

						var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
								attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
									'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
									'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
								id: 'mapbox/dark-v10'
							});

							
							
							

							// var latInput = document.querySelector("[name=Latitude]");
							// var lngInput = document.querySelector("[name=Longitude]");
						
							var map = L.map('map', {
							center: [-6.192030, 106.832985],
							zoom: 13,
							layers: [peta1]
							});

							var baseMaps = {
							"Grayscale": peta1,
							"Sateltite": peta2,
							"Streets": peta3,
							"Dark": peta4
							};

							L.control.layers(baseMaps).addTo(map);

							var curLocation = [-6.192030, 106.832985];
							map.attributionControl.setPrefix(false);

							

							//Sebaran lokasi kolektor

							var data = [ 
							<?php foreach ($kolektor as $key => $value){ ?>
								{"lock":[<?=$value->latitude?>, <?=$value->longitude?>],"nama_kolektor":"<?=$value->kolektor_nama?>"},
							<?php } ?>
							
							]
							console.log(data);
							var markerLayer = new L.LayerGroup();
								map.addLayer(markerLayer);

							for (i in data){
									L.icon = function (options) {
									return new L.Icon(options);
								};
								var leafIcon = L.Icon.extend({
									options: {
										iconSize:   [25, 40],
									}
								});

								var kolIcon = new leafIcon({iconUrl: 'style/images/kolektor.png'});
								var namaKolektor = data[i].nama_kolektor;
								var lokasi = data[i].lock;
								var markers = new L.marker(lokasi, {icon: kolIcon});
								markers.bindPopup('Nama Kolektor: ' + namaKolektor);
								markerLayer.addLayer(markers);
							}


							// Sebaran Lokasi Debitur
							var datas = [ 
							<?php foreach ($debitur as $key => $s){ ?>
								{"locd":[<?=$s->latitude?>, <?=$s->longitude?>],"nama_debitur":"<?=$s->nama_debitur?>"},
							<?php } ?>
							
							]
							console.log(datas);
							var markerLayer = new L.LayerGroup();
								map.addLayer(markerLayer);

							for (t in datas){
									L.icon = function (options) {
									return new L.Icon(options);
								};
								var leafIcon = L.Icon.extend({
									options: {
										iconSize:   [40, 40],
									}
								});

								var debIcon = new leafIcon({iconUrl: 'style/images/lokdeb.jpg'});
								var namaDebitur = datas[t].nama_debitur;
								var lokasit = datas[t].locd;
								console.log(lokasit);
								var markert = new L.marker(lokasit, {icon: debIcon});
								markert.bindPopup('Nama Debitur: ' + namaDebitur);
								markerLayer.addLayer(markert);
							}
							</script>


						
			</div>
		</div>
	</div>
</div>

@endsection