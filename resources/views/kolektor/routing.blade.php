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

<!-- Leaflet -->
<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script> -->
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
      <a href="/" class="navbar-brand">
        <img src="{{ asset('Admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><b>GIS Pemantau Lokasi Kebakaran</b></span>
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
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">About</a>
          </li> -->
          
        
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

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Origin</label>
                        <select name="origin" id="origin" class="form-control">
                        <option value="">--Pilih Lokasi--</option>
                        <option value="RSOmni">RS Omni</option>
                        <option value="MCDCawang">MCD Cawang</option>
                        <option value="KantorLurahKlender">Kantor Lurah Klender</option>
                        <option value="KantorCamatDurenSawit">Kantor Camat Duren Sawit</option>
                        <option value="BankMandiriBuaran">Bank Mandiri Buaran</option>
                        <option value="AEONMallCakung">AEON Mall Cakung</option>
                        <option value="KantorLurahPondokKopi">Kantor Lurah Pondok Kopi</option>
                        </select>
                        <p id="org">test ORG</p>
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
                        <option value="RSOmni">RS Omni</option>
                        <option value="MCDCawang">MCD Cawang</option>
                        <option value="KantorLurahKlender">Kantor Lurah Klender</option>
                        <option value="KantorCamatDurenSawit">Kantor Camat Duren Sawit</option>
                        <option value="BankMandiriBuaran">Bank Mandiri Buaran</option>
                        <option value="AEONMallCakung">AEON Mall Cakung</option>
                        <option value="KantorLurahPondokKopi">Kantor Lurah Pondok Kopi</option>
                        </select>
                        <p id="dest">test DEST</p>
                        <div class="text-danger">
                        
                      </div>
                    </div>
                    </div>

                    <div class="card-tools">
                    <button type="submit" id="inputbtn" onclick="myFunction()">Search</button>
                  <i class=""></i>Search</a>
                </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h1 id="lblPath">Test</h1>
                    </div>
                    <!-- /.card-body -->
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


<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACOLjZpTZ6zPoc0_xPmOjz0BWL2LPTDsQ&callback=initMap&libraries=places&language=id"
    defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    // script untuk fungsi algoritmanya Dijkstra
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
    
    /**
     * Pathfinding starts here
     */
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
    
    g.addVertex('RSOmni', {MCDCawang: 9793, KantorLurahKlender: 8746, AEONMallCakung: 12422});
    g.addVertex('MCDCawang', {RSOmni: 9793, KantorLurahKlender: 8601, KantorCamatDurenSawit: 8703});
    g.addVertex('KantorLurahKlender', {MCDCawang: 8601, KantorCamatDurenSawit: 3418, BankMandiriBuaran: 2515, AEONMallCakung: 14294});
    g.addVertex('KantorCamatDurenSawit', {KantorLurahKlender: 3418, BankMandiriBuaran: 2280, KantorLurahPondokKopi: 4294});
    g.addVertex('BankMandiriBuaran', {KantorCamatDurenSawit: 2280, AEONMallCakung: 12571, KantorLurahPondokKopi: 3822});
    g.addVertex('AEONMallCakung', {BankMandiriBuaran: 12571, KantorLurahPondokKopi: 10026});
    g.addVertex('KantorLurahPondokKopi', {KantorCamatDurenSawit: 4294, BankMandiriBuaran: 3822, AEONMallCakung: 10026});
    
    // Log test, with the addition of reversing the path and prepending the first node so it's more readable
    // console.log(o,g);
    // console.log(g.shortestPath(o, d).concat([o]).reverse());
    var hasil = g.shortestPath(o, d).concat([o]).reverse();
    
    document.getElementById("lblPath").innerHTML = "jalur terdekat:" + hasil;
    allDestination = hasil
    
    if (o == "RSOmni")
    {
        document.getElementById("org").innerHTML = "-6.180044349584351,106.88380795547823";
    }
    else if (o == "MCDCawang")
    {
        document.getElementById("org").innerHTML = "-6.236909325127633,106.8690367459978";
    }
    else if (o == "KantorLurahKlender")
    {
        document.getElementById("org").innerHTML = "-6.2167369502527725,106.90809904557614";
    }
    else if (o == "KantorCamatDurenSawit")
    {
        document.getElementById("org").innerHTML = "-6.233040900017516,106.9182919261728";
    }
    else if (o == "BankMandiriBuaran")
    {
        document.getElementById("org").innerHTML = "-6.22026270475237,106.92244659148345";
    }
    else if (o == "AEONMallCakung")
    {
        document.getElementById("org").innerHTML = "-6.172390029601698,106.95247756863077";
    }
    else if (o == "KantorLurahPondokKopi")
    {
        document.getElementById("org").innerHTML = "-6.229305115067972,106.94458082445507";
    }

    if (d == "RSOmni")
    {
        document.getElementById("dest").innerHTML = "-6.180044349584351,106.88380795547823";
    }
    else if (d == "MCDCawang")
    {
        document.getElementById("dest").innerHTML = "-6.236909325127633,106.8690367459978";
    }
    else if (d == "KantorLurahKlender")
    {
        document.getElementById("dest").innerHTML = "-6.2167369502527725,106.90809904557614";
    }
    else if (d == "KantorCamatDurenSawit")
    {
        document.getElementById("dest").innerHTML = "-6.233040900017516,106.9182919261728";
    }
    else if (d == "BankMandiriBuaran")
    {
        document.getElementById("dest").innerHTML = "-6.22026270475237,106.92244659148345";
    }
    else if (d == "AEONMallCakung")
    {
        document.getElementById("dest").innerHTML = "-6.172390029601698,106.95247756863077";
    }
    else if (d == "KantorLurahPondokKopi")
    {
        document.getElementById("dest").innerHTML = "-6.229305115067972,106.94458082445507";
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
        var getlatlogORG = document.getElementById("org").innerHTML;
        var latLngORG =  getlatlogORG.split(",");
        var latitudeORG = parseFloat(latLngORG[0]);
        var longitudeORG = parseFloat(latLngORG[1]);

        var getlatlogDEST = document.getElementById("dest").innerHTML;
        var latLngDEST =  getlatlogDEST.split(",");
        var latitudDEST = parseFloat(latLngDEST[0]);
        var longitudeDEST = parseFloat(latLngDEST[1]);

        // var orgg = document.getElementById('org').innerHTML;
        // var Strorg = orgg.toString();
        // var destt = document.getElementById('dest').innerHTML;
        // var StrDest = destt.toString();
        // console.log(allDestination);
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
                if (items[i] == "RSOmni")
                {
                    items[i] = "-6.180044349584351,106.88380795547823";
                    console.log(items[i]);
                }
                else if (items[i] == "MCDCawang")
                {
                    items[i] = "-6.236909325127633,106.8690367459978";
                    console.log(items[i]);
                }
                else if (items[i] == "KantorLurahKlender")
                {
                    items[i] = "-6.2167369502527725,106.90809904557614";
                    console.log(items[i]);
                }
                else if (items[i] == "KantorCamatDurenSawit")
                {
                    items[i] = "-6.233040900017516,106.9182919261728";
                    console.log(items[i]);
                }
                else if (items[i] == "BankMandiriBuaran")
                {
                    items[i] = "-6.22026270475237,106.92244659148345";
                    console.log(items[i]);
                }
                else if (items[i] == "AEONMallCakung")
                {
                    items[i] = "-6.172390029601698,106.95247756863077";
                    console.log(items[i]);
                }
                else if (items[i] == "KantorLurahPondokKopi")
                {
                    items[i] = "-6.229305115067972,106.94458082445507";
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
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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



