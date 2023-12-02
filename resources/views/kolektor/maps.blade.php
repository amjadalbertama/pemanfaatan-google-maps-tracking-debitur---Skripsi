@extends('mains')

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
<div class="card-body">
  <div class="row">
                <div id="map" style=" width: 50% ; height: 660px; margin-bottom: 20px; margin-left: 20px;">
                  </div>
          
                  <div class="col-md-4" >
                      <!-- text input -->
					  <!-- <form action="{{ url('dKolektor/'. Auth::guard('kolektor')->user()->id) }}" method="post">
                        @method('patch')
						@csrf
                        
                            <div class="form-group" >
                                <label> <h4>Nama Kolektor:  {{ Auth::guard('kolektor')->user()->name }} </h4></label>
                            </div>
							<h4>Posisi coord kolektor saat ini:</h4><br>
						<div class="form-grup">
							<label> <h5>-> Latitude</h5> </label>
							<input type="text" class="form-control" id="latitude1" name="Latitude1" value="{{ Auth::guard('kolektor')->user()->latitude }}">
						</div>	

						<div class="form-grup">	
							<label><h5>-> Longitude</h5>  </label>
							<input type="text" class="form-control"  id="longitude1" name="Longitude1" value="{{ Auth::guard('kolektor')->user()->longitude }}">
						</div>
						
                    <form> -->
                      </div>
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tujuan Lokasi Penagihan</label>
                        <select name="destination" id="destination" class="form-control" style="width: 100%;">
                        <option value="">--Pilih Lokasi Debitur Tujuan --</option>
							@foreach ($debitur as $item => $k)
								<option value="{{$k->id}}">{{$k->nama_debitur}}</option>
							@endforeach
                        </select>
						<script>
							<?php

								?>

						</script>
						
                        <p id="dest">test DEST</p>
                        <div class="text-danger">
                        </div>
                      </div>
                      
                    <div class="card-tools">
                      <button type="submit" id="inputbtn" onclick="myFunction()">Search</button>
                        <i class=""></i>Search</a>
                    </div>
                  <br>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Tujuan Rute</th>
                        <td scope="col" id="namarute"></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="col">Total Jarak</th>
                        <td scope="col" id="dvDistance"></td>
                      </tr>
                      <tr>
                        <th scope="row">Total Waktu</th>
                        <td scope="col" id="dvDuration"></td>
                      </tr>
                      <tr>
                        <th scope="row">Rute</th>
                        <td scope="col" id="lblPath"></td>
                      </tr>
                    </tbody>
                  </table>
                    <!-- /.card-header -->
                     {{-- <div class="card-body"> 
                      <p id="namarute"></p> 
                        <h1 id="lblPath"></h1>
                        <div id="dvDistance"></div>
                    </div> --}}
                </div>

                <!-- <div class="col-md-4" > -->
                 
                  
                    <!-- /.card-body -->
                    <!-- </div>  -->
    </div>          
 
</div>   
                          
                   

                    

                 
                     <!-- </div> -->
                <!-- /.card -->
    <!-- <section class="content"> -->
   
   
				  
      
        <!-- /.row -->
    <!-- </section> -->
    
    <!-- <h3>Pemetaan</h3> -->
         
        <!--The div element for the map -->
        <!-- <div id="map"></div> -->
   
    




<!-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACOLjZpTZ6zPoc0_xPmOjz0BWL2LPTDsQ&callback=initMap&libraries=places&language=id"
    defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<script>
    

    function myFunction() {

    var d = document.getElementById("destination").value;
	console.log(d);
    var datas = [ 
				<?php foreach ($debitur as $key => $value){ ?>
					{"lock":[<?=$value->latitude?>, <?=$value->longitude?>],"nama_debitur":"<?=$value->nama_debitur?>"},
				<?php } ?>
			]
			console.log(datas.lock[0]);

			for(i in datas){

				if (d == $key->id)
					{
						document.getElementById("dest").innerHTML = $key->latitude, $key->lognitude;
					}
										
					var lat = datas[i].lock[0];
                    var lng = datas[i].lock[1];
					var deb = data.nama_debitur;
					var posdeb = new google.maps.LatLng(lat, lng);
                               
                    console.log(lat);
					var markert = new google.maps.Marker({
					position: posdeb,
                    icon: gambar,
					map: map,
					});

								

							}
    
    
    
    }
    
</script>


<script>
    function initMap() {
		
      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer;

      var renderOptions = { draggable: true };

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: -6.2167369502527725, lng: 106.90809904557614}
      
      });

      directionsDisplay.setMap(map);

      var onChangeHandler = function() {
      
        calculateAndDisplayRoute(directionsService, directionsDisplay);
      };
      document.getElementById('inputbtn').addEventListener('click', onChangeHandler);
 
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
		var latkol = document.getElementById("latitude1").value;
		var lngkol = document.getElementById("longitude1").value;

        var getlatlogDEST = document.getElementById("dest").innerHTML;
        var latLngDEST =  getlatlogDEST.split(",");
        var latitudDEST = parseFloat(latLngDEST[0]);
        var longitudeDEST = parseFloat(latLngDEST[1]);

        // var orgg = document.getElementById('org').innerHTML;
        // var Strorg = orgg.toString();
        // var destt = document.getElementById('dest').innerHTML;
        // var StrDest = destt.toString();
        // console.log(allDestination);
        
      directionsService.route({
        origin: {lat: latkol, lng: lngkol},
        destination: {lat: latitudDEST, lng: longitudeDEST},
        // origin: document.getElementById('org').innerHTML,
        // destination: document.getElementById('dest').innerHTML,
        waypoints: waypoints,
        optimizeWaypoints: true,
        // destination: document.getElementById('destination2').value,
        travelMode: 'DRIVING'
      }, function(response, status) {
        if (status === 'OK') {
          directionsDisplay.setDirections(response);
          computeTotalDistance(response)
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
    }

    
  </script>
   <script>
  function computeTotalDistance(result) {
    var totalDist = 0;
    var totalTime = 0;
    var myroute = result.routes[0];
    // totalDist = distances.text;
    // totalTime = duration.text
    console.log(myroute);
    for (i = 0; i < myroute.legs.length; i++) {
        totalDist += myroute.legs[i].distance.value;
        totalTime += myroute.legs[i].duration.value;
        
    console.log( myroute.legs[i].duration.text);
    }
    totalDist = totalDist / 1000;
    // totalTime = totalTime / 60.toFixed(2);
    // totaljarak = myroute.legs[1].distance.text;
    // totalwaktu = myroute.legs[1].duration.text;
    // document.getElementById("dvDistance").innerHTML = "total distance is: " + totalDist + " km<br>total time is: " + (totalTime / 60).toFixed(2) + " minutes";
    
    d = Number(totalTime);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";

    document.getElementById("dvDistance").innerHTML = totalDist + " Km";
    document.getElementById("dvDuration").innerHTML = hDisplay + mDisplay;
    }
  </script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous"></script> -->
@if (Session::has('success'))
    <script>
        swal("Berhasil!", "{!! Session::get('success') !!}", "success", {
            button: "OK",
        })

    </script>

@endif


<script>
//   $(function () {
//     $("#example1").DataTable({
//       "responsive": true,
//       "autoWidth": false,
//     });
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });
</script>

@endsection

