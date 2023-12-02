<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>GIS Lokasi Kebakaran</title>

   <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('Admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('Admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('Admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Admin') }}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
<script src="{{ asset('Admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('Admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{ asset('Admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('Admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('Admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('Admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Admin') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('Admin') }}/dist/js/demo.js"></script>
<!-- page script -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACOLjZpTZ6zPoc0_xPmOjz0BWL2LPTDsQ&callback=initMap&libraries=places&language=id"
    defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
   
        <span class="brand-text font-weight-light"><h5><b>GIS Pemantau Lokasi Kebakaran</b></h5></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
          </li>
     
          
        
        </ul>

        <!-- SEARCH FORM -->
        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
       
        
        <li class="nav-item">
          <a class="nav-link"  href="{{ route('login') }}" role="button"><i
              class="fas fa-user"></i>Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
<br>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Origin</label>
                        <select name="origin" id="origin" class="form-control">
                        <option value="">--Pilih Lokasi--</option>
                        <option value="DPKJaktim">Dinas Pemadam Kebakaran Jakarta Timur</option>
                        <option value="Jatinegara">Jatinegara</option>
                        <option value="Matraman">Matraman</option>
                        <option value="DurenSawit">Duren Sawit</option>
                        <option value="Ciracas">Ciracas</option>
                        <option value="Cipayung">Cipayung</option>
                        <option value="Cakung">Cakung</option>
                        </select>
                        <p id="org"></p>
                        <div class="text-danger">
                       
                      </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Destination</label>
                        <select name="destination" id="destination" class="form-control">
                        <option value="">--Pilih Lokasi--</option>
                        <!-- <option value="DPKJaktim">Dinas Pemadam Kebakaran Jakarta Timur</option> -->
                        <option value="Jatinegara">Jatinegara</option>
                        <option value="Matraman">Matraman</option>
                        <option value="DurenSawit">Duren Sawit</option>
                        <option value="Ciracas">Ciracas</option>
                        <option value="Cipayung">Cipayung</option>
                        <option value="Cakung">Cakung</option>
                        </select>
                        <p id="dest"></p>
                        <div class="text-danger">
                        
                      </div>
                    </div>
                    </div>

                    <div class="col-md-4 offset-md-2">
                    <button type="submit" class="btn btn-primary" id="inputbtn" onclick="myFunction()">Search</button>
                  <!-- <i class=""></i>Search</a> -->
                </div>

    <section class="content">
    <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-body">
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
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <div class="box-body">
        <h3>Pemetaan</h3>
        
        <!--The div element for the map -->
        <div id="map"></div>
    </div>
    

<link rel="stylesheet" href="/css/admin_custom.css">
<style type="text/css">
    /* Set the size of the div element that contains the map */
    #map {
        height: 500px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }

</style>


<!-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACOLjZpTZ6zPoc0_xPmOjz0BWL2LPTDsQ&callback=initMap&libraries=places&language=id"
    defer></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    // script untuk fungsi algoritma Dijkstra
    var allDestination = new Array("");

    function PriorityQueue () {
      this._nodes = [];
    
      this.enqueue = function (priority, key) {
        this._nodes.push({key: key, priority: priority });
        this.sort();
      };
      this.dequeue = function () {
        return this._nodes.shift().key;
      };
      this.sort = function () {
        this._nodes.sort(function (a, b) {
          return a.priority - b.priority;
        });
      };
      this.isEmpty = function () {
        return !this._nodes.length;
      };
    }
    
    function Graph(){
      var INFINITY = 1/0;
      this.vertices = {};
    
      this.addVertex = function(name, edges){
        this.vertices[name] = edges;
      };
    
      this.shortestPath = function (start, finish) {
        var nodes = new PriorityQueue(),
            distances = {},
            previous = {},
            path = [],
            smallest, vertex, neighbor, alt;
    
        for(vertex in this.vertices) {
          if(vertex === start) {
            distances[vertex] = 0;
            nodes.enqueue(0, vertex);
          }
          else {
            distances[vertex] = INFINITY;
            nodes.enqueue(INFINITY, vertex);
          }
    
          previous[vertex] = null;
        }
    
        while(!nodes.isEmpty()) {
          smallest = nodes.dequeue();
    
          if(smallest === finish) {
            path = [];
    
            while(previous[smallest]) {
              path.push(smallest);
              smallest = previous[smallest];
            }
    
            break;
          }
    
          if(!smallest || distances[smallest] === INFINITY){
            continue;
          }
    
          for(neighbor in this.vertices[smallest]) {
            alt = distances[smallest] + this.vertices[smallest][neighbor];
    
            if(alt < distances[neighbor]) {
              distances[neighbor] = alt;
              previous[neighbor] = smallest;
    
              nodes.enqueue(alt, neighbor);
            }
          }
        }
    
        return path;
      };
    }
    
    function myFunction() {

    var o = document.getElementById("origin").value;
    var d = document.getElementById("destination").value;
    var g = new Graph();
    
    g.addVertex('DPKJaktim', {Jatinegara: 6301, Matraman: 1599, Cipayung: 18628});
    g.addVertex('Jatinegara', {DPKJaktim: 6301, Matraman: 4542, DurenSawit: 4035});
    g.addVertex('Matraman', {Jatinegara: 4542, DurenSawit: 7553, Ciracas: 19717, Cipayung: 17010});
    g.addVertex('DurenSawit', {Matraman: 7553, Ciracas: 19510, Cakung: 8513});
    g.addVertex('Ciracas', {DurenSawit: 19510, Cipayung: 3902, Cakung: 22668});
    g.addVertex('Cipayung', {Ciracas: 3902, Cakung: 20028});
    g.addVertex('Cakung', {DurenSawit: 8513, Ciracas: 22668, Cipayung: 20028});
    
    var hasil = g.shortestPath(o, d).concat([o]).reverse();
    
    document.getElementById("namarute").innerHTML = o + " - " + d;
    document.getElementById("lblPath").innerHTML = hasil;
    allDestination = hasil
    
    if (o == "DPKJaktim")
    {
        document.getElementById("org").innerHTML = "-6.198403439430058, 106.8593626601374";
    }
    else if (o == "Jatinegara")
    {
        document.getElementById("org").innerHTML = "-6.216318883251387, 106.87178639668727";
    }
    else if (o == "Matraman")
    {
        document.getElementById("org").innerHTML = "-6.195065007194209, 106.86306106785055";
    }
    else if (o == "DurenSawit")
    {
        document.getElementById("org").innerHTML = "-6.217188812306422, 106.89869686785072";
    }
    else if (o == "Ciracas")
    {
        document.getElementById("org").innerHTML = "-6.331471573977328, 106.88582379668847";
    }
    else if (o == "Cipayung")
    {
        document.getElementById("org").innerHTML = "-6.316759657787241, 106.9009206678517";
    }
    else if (o == "Cakung")
    {
        document.getElementById("org").innerHTML = "-6.20484420575637, 106.94926526785052";
    }

    if (d == "DPKJaktim")
    {
        document.getElementById("dest").innerHTML = "-6.198403439430058, 106.8593626601374";
    }
    else if (d == "Jatinegara")
    {
        document.getElementById("dest").innerHTML = "-6.216318883251387, 106.87178639668727";
    }
    else if (d == "Matraman")
    {
        document.getElementById("dest").innerHTML = "-6.195065007194209, 106.86306106785055";
    }
    else if (d == "DurenSawit")
    {
        document.getElementById("dest").innerHTML = "-6.217188812306422, 106.89869686785072";
    }
    else if (d == "Ciracas")
    {
        document.getElementById("dest").innerHTML = "-6.22026270475237,106.92244659148345";
    }
    else if (d == "Cipayung")
    {
        document.getElementById("dest").innerHTML = "-6.316759657787241, 106.9009206678517";
    }
    else if (d == "Cakung")
    {
        document.getElementById("dest").innerHTML = "-6.20484420575637, 106.94926526785052";
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
        center: {lat: -6.198403439430058, lng: 106.8593626601374}
      
      });

      directionsDisplay.setMap(map);

      var onChangeHandler = function() {
      
        calculateAndDisplayRoute(directionsService, directionsDisplay);
      };
      document.getElementById('inputbtn').addEventListener('click', onChangeHandler);
 
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var getlatlogORG = document.getElementById("org").innerHTML;
        var latLngORG =  getlatlogORG.split(",");
        var latitudeORG = parseFloat(latLngORG[0]);
        var longitudeORG = parseFloat(latLngORG[1]);

        var getlatlogDEST = document.getElementById("dest").innerHTML;
        var latLngDEST =  getlatlogDEST.split(",");
        var latitudDEST = parseFloat(latLngDEST[0]);
        var longitudeDEST = parseFloat(latLngDEST[1]);
        var items = allDestination;
        var fromorigin = allDestination[0];
        var lastdestination = allDestination[allDestination.length - 1];
        console.log(fromorigin);
        console.log(lastdestination);
        var waypoints = [];
        for (var i = 0; i < items.length; i++) {
            console.log(items.length);
            console.log(items[i]);
            if (items[i] != "" || items[i] !== fromorigin || items[i] !== lastdestination) {
                if (items[i] == "DPKJaktim")
                {
                    items[i] = "-6.198403439430058, 106.8593626601374";
                    console.log(items[i]);
                }
                else if (items[i] == "Jatinegara")
                {
                    items[i] = "-6.216318883251387, 106.87178639668727";
                    console.log(items[i]);
                }
                else if (items[i] == "Matraman")
                {
                    items[i] = "-6.195065007194209, 106.86306106785055";
                    console.log(items[i]);
                }
                else if (items[i] == "DurenSawit")
                {
                    items[i] = "-6.217188812306422, 106.89869686785072";
                    console.log(items[i]);
                }
                else if (items[i] == "Ciracas")
                {
                    items[i] = "-6.22026270475237,106.92244659148345";
                    console.log(items[i]);
                }
                else if (items[i] == "Cipayung")
                {
                    items[i] = "-6.316759657787241, 106.9009206678517";
                    console.log(items[i]);
                }
                else if (items[i] == "Cakung")
                {
                    items[i] = "-6.20484420575637, 106.94926526785052";
                    console.log(items[i]);
                }
                waypoints.push({
                    location: items[i],
                    stopover: true
                });
            }
        }
        
      directionsService.route({
        origin: {lat: latitudeORG, lng: longitudeORG},
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous"></script>
@if (Session::has('success'))
    <script>
        swal("Berhasil!", "{!! Session::get('success') !!}", "success", {
            button: "OK",
        })

    </script>

@endif
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="">GISFIRE</a>.</strong> All rights reserved.
  </footer>
</div>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



