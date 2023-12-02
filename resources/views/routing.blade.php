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
                        <div class="form-group">
                          <label>Titik Awal lokasi Penagihan</label>
                          <select name="origin" id="origin" class="form-control" style="width: 100%;">
                            <option value="">--Pilih Lokasi Debitur Awal--</option>
                            <option value="Marwan">Marwan</option>
                            <option value="Ridwan">Ridwan</option>
                            <option value="Rin">Rin</option>
                            <option value="Ratu">Ratu</option>
                            <option value="Baswedan">Baswedan</option>
                            <option value="Fahroji">Fahroji</option>
                            <option value="Farisa">Farisa</option>
                          </select>
                          <p id="org">test ORG</p>
                          <div class="text-danger">
                          </div>
                      </div>
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tujuan Lokasi Penagihan</label>
                        <select name="destination" id="destination" class="form-control" style="width: 100%;">
                        <option value="">--Pilih Lokasi Debitur Tujuan --</option>
                          <option value="Marwan">Marwan</option>
                          <option value="Ridwan">Ridwan</option>
                          <option value="Rin">Rin</option>
                          <option value="Ratu">Ratu</option>
                          <option value="Baswedan">Baswedan</option>
                          <option value="Fahroji">Fahroji</option>
                          <option value="Farisa">Farisa</option>
                        </select>
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
    
    g.addVertex('Marwan', {Ridwan: 9793, Rin: 8746, Fahroji: 12422});
    g.addVertex('Ridwan', {Marwan: 9793, Rin: 8601, Ratu: 8703});
    g.addVertex('Rin', {Ridwan: 8601, Ratu: 3418, Baswedan: 2515, Fahroji: 14294});
    g.addVertex('Ratu', {Rin: 3418, Baswedan: 2280, Farisa: 4294});
    g.addVertex('Baswedan', {Ratu: 2280, Fahroji: 12571, Farisa: 3822});
    g.addVertex('Fahroji', {Baswedan: 12571, Farisa: 10026});
    g.addVertex('Farisa', {Ratu: 4294, Baswedan: 3822, Fahroji: 10026});
    
    
    // Log test, with the addition of reversing the path and prepending the first node so it's more readable
    // console.log(o,g);
    // console.log(g.shortestPath(o, d).concat([o]).reverse());
    var hasil = g.shortestPath(o, d).concat([o]).reverse();
    document.getElementById("namarute").innerHTML = o + " - " + d;
    document.getElementById("lblPath").innerHTML = hasil;
    allDestination = hasil
    
    if (o == "Marwan")
    {
        document.getElementById("org").innerHTML = "-6.180044349584351,106.88380795547823";
    }
    else if (o == "Ridwan")
    {
        document.getElementById("org").innerHTML = "-6.236909325127633,106.8690367459978";
    }
    else if (o == "Rin")
    {
        document.getElementById("org").innerHTML = "-6.2167369502527725,106.90809904557614";
    }
    else if (o == "Ratu")
    {
        document.getElementById("org").innerHTML = "-6.233040900017516,106.9182919261728";
    }
    else if (o == "Baswedan")
    {
        document.getElementById("org").innerHTML = "-6.22026270475237,106.92244659148345";
    }
    else if (o == "Fahroji")
    {
        document.getElementById("org").innerHTML = "-6.172390029601698,106.95247756863077";
    }
    else if (o == "Farisa")
    {
        document.getElementById("org").innerHTML = "-6.229305115067972,106.94458082445507";
    }
    

    if (d == "Marwan")
    {
        document.getElementById("dest").innerHTML = "-6.180044349584351,106.88380795547823";
    }
    else if (d == "Ridwan")
    {
        document.getElementById("dest").innerHTML = "-6.236909325127633,106.8690367459978";
    }
    else if (d == "Rin")
    {
        document.getElementById("dest").innerHTML = "-6.2167369502527725,106.90809904557614";
    }
    else if (d == "Ratu")
    {
        document.getElementById("dest").innerHTML = "-6.233040900017516,106.9182919261728";
    }
    else if (d == "Baswedan")
    {
        document.getElementById("dest").innerHTML = "-6.22026270475237,106.92244659148345";
    }
    else if (d == "Fahroji")
    {
        document.getElementById("dest").innerHTML = "-6.172390029601698,106.95247756863077";
    }
    else if (d == "Farisa")
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
              if (items[i] == "Marwan")
                {
                    items[i] = "-6.180044349584351,106.88380795547823";
                    console.log(items[i]);
                }
                else if (items[i] == "Ridwan")
                {
                    items[i] = "-6.236909325127633,106.8690367459978";
                    console.log(items[i]);
                }
                else if (items[i] == "Rin")
                {
                    items[i] = "-6.2167369502527725,106.90809904557614";
                    console.log(items[i]);
                }
                else if (items[i] == "Ratu")
                {
                    items[i] = "-6.233040900017516,106.9182919261728";
                    console.log(items[i]);
                }
                else if (items[i] == "Baswedan")
                {
                    items[i] = "-6.22026270475237,106.92244659148345";
                    console.log(items[i]);
                }
                else if (items[i] == "Fahroji")
                {
                    items[i] = "-6.172390029601698,106.95247756863077";
                    console.log(items[i]);
                }
                else if (items[i] == "Farisa")
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

@endsection

