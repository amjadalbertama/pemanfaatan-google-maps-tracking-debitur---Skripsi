
function initMap() {
//  const datas = require('dummypta1');
    // var connection = new ActiveXObject("dummypta1.Connection") ;
    // connection.Open(connectionstring);
    // var debitur = new ActiveXObject("dummypta1.Recordset");
  
    // debitur.Open("SELECT * FROM debitur", connection);

    var latlng = new google.maps.LatLng(-6.192030, 106.832985);
    var latInput = document.querySelector("[name=Latitude]");
		var lngInput = document.querySelector("[name=Longitude]");
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
      latInput.value = marker.getPosition().lat();
      lngInput.value = marker.getPosition().lng();
    });


      // sebaran lokasi debitur    
    
  
    var markers = new Array();

    // var index = $datas.query("SELECT * FROM debitur"); 
    console.log(index);
    
      // for (kolektor = 0){ 
      //   markers.push({
      //     coords: {lat: Number(datas[index].latitude), lat: Number(datas[index].longitude) },
      //     content: `<div><h5>${datas[index].no_kontrak}</h5><p>${datas[index].nama_debitur}<p>${datas[index].alamat_ktp}</div>`
      //   })
      // }
      
     
    // for (index = 0; index < datas; index++){
    //   markers.push({
    //     coords: {lat: Number(datas[index].latitude), lat: Number(datas[index].longitude) },
    //     content: `<div><h5>${datas[index].no_kontrak}</h5><p>${datas[index].nama_debitur}<p>${datas[index].alamat_ktp}</div>`
    //   })
    // }

    for (debitur = 0; debitur< connection; debitur++){
      markers.push({
        coords: {lat: Number(connection[debitur].latitude), lat: Number(connection[debitur].longitude) },
        content: `<div><h5>${connection[debitur].no_kontrak}</h5><p>${connection[debitur].nama_debitur}<p>${connection[debitur].alamat_ktp}</div>`
      })
    }
    //loop maker debitur

    for ( var i = 0; i < markers; i++){
      addMaker(markers[i]);
    }

    //Add marker

    function addMaker(props){
      var markers = new google.maps.Marker({
        position: props.coords,
        map: map 
      });

      if (props.iconImage){
        markert.setIcon(props.iconImage);
      }

      if (props.content){
        var infoWindow = new google.maps.InfoWindow({
          content: props.content
        });

        markert.addListener('click', function(){
          infoWindow.open(map, markers);
        });
      }
    }
  // }
}
