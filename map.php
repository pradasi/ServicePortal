<?php 

include('Login.php');
include('connection.php');
global $r;
if(!(empty($_SESSION['email']))){
 $email=$_SESSION['email'] ;
 $query = "SELECT * FROM login WHERE EmailID='$email'";

$results = mysqli_query($connection, $query);
if (mysqli_num_rows($results) == 1) {
$r = mysqli_fetch_row($results); }

}
  	  
?>



<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="font/stylesheet.css" rel="stylesheet">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&callback=initMap"></script>
    <title>Map</title>
    
    <style>
          body,html,  #map-canvas {
                
                      margin-top: 10px ;
                      height: 90%;
                      margin-left: 50px ;
                    margin-top: 50px ;
                      padding: 0px ;
                          width:90% ;
                    }
        
        
        
          #heading {
                                            font-family: 'Pacifico', cursive;
                                            font-size: 35px ;
              margin-left: 450px ;
                                        }    
       
        
        #btn
        {
            padding: 10px 17px ;
            background-color: #1abc9c; ;
            border-radius: 3px ;
            margin-left: 430px ;
            text-decoration: none;
        }`
        #btn:hover{
            background-color: #10f0c4; ;
        }
    </style>
</head>

<body >
    
    
    
     
    
    <h1 id="heading">Find the doctor </h1>
    <div id="map-canvas"></div>
    <button id="btn" onclick="getLocation()">Get the geolocation </button>
    <p id="demo"></p>
    <p id="Print"></p>
    
    
 <script>
var Latitude=19.107567,Longitude=72.8335 ;
     
var markersArray=[] ;   
var map;
var infowindow;
var a="HELLO"  ;
        

var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
     
     
     
     

function showPosition(position) {
    
    x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  Latitude=position.coords.latitude  ;
   Longitude = position.coords.longitude; 
    initialize() ;
 
}
        


function initialize() {
  var pyrmont = new google.maps.LatLng( Latitude, Longitude); // sample location to start with: Mumbai, India
 var marker = new google.maps.Marker({position: Latitude});
 marker.setMap(map);
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: pyrmont,
    zoom: 15
  });

  var request = {
    location: pyrmont,
    radius: 2,
    types: ['hospital', 'health'] // this is where you set the map to get the hospitals and health related places
  };
  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  //  alert("executing2") ;
  service.nearbySearch(request, callback);
 //alert("executing3") ;
}

function callback(request, status) {

    console.log(request) ;
    console.log(status) ;
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
     
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });
 markersArray.push(marker) ;
   

// document.getElementById("Print").innerHTML=markersArray.toString(); 

    
    
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
    
   
}

google.maps.event.addDomListener(window, 'load', initialize);
   
   // document.getElementById("Print").innerHTML=a;  
  
      //document.getElementById("Print").innerHTML="hello" +markersArray.toString(); 
    </script>
</body>
</html>
