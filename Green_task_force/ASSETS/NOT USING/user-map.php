<!DOCTYPE html>
<html lang="en">
<head>
<title>Green Task Force</title>
    <link rel="icon" type="image/png" href="ASSETS\titleicon.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
}
    
    .icon{
    width: 500px;
    height: 200px;
    border-radius: 50%;
    top: 1%;
    left: 37%;
    position: absolute;
    left: calc(50% 50px);
}
    
/* Style the header */
.header {
    padding: 120px;
    text-align: center;
    background:   #67b12f;
    color: white;
    /*#67b12f*/
}

/* Increase the font size of the h1 element */
.header h1 {
    font-size: 50px;
}

/* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
    float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Column container */
.row {  
    display: flex;
    flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
    flex: 10%;
    background-color: #f1f1f1;
    padding: 20px;
}

/* Main column */
.main {   
    flex: 70%;
    background-color: white;
    padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
    .row {   
        flex-direction: column;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width:100%;
    }
}
.navbar a.active {
  background-color: #67b12f;
  color: white;
}
</style>
</head>
<body>

<div class="header">
    <img src="ASSETS\newicon.png" class="icon">
</div>

<div class="navbar">
  <a href="user.php">Home</a>
  <a href="user-map.php" class="active">Map</a>
  <a href="index.php" class="right">Logout</a>
</div>

<div class="row">

    <div class="side">

    </div>

    <div class="main">
        <?php
        include_once 'header.php';
        include 'locations_model.php';
        ?>

        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyB13PGkg5jSJNI6XUmA7weQlwG8tNH6P4c">
        </script>

        <div class="holder">
            <div class="Element">
                <input type="button" onclick="geolo();" name="get_location" class="button" id="get_location" value="Get my location">
            </div>
            <div class="Element"> 
                <div id="map"></div>
            </div>

            <script>
                /**
                * Create new map
                */
                var infowindow;
                var map;
                var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
                var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
                var locations = <?php get_confirmed_locations() ?>;
                var myOptions = {zoom: 8,center: new google.maps.LatLng(7.752484, 80.729071),mapTypeId: 'roadmap'};
                map = new google.maps.Map(document.getElementById('map'), myOptions);
                /**
                * Global marker object that holds all markers.
                * @type {Object.<string, google.maps.LatLng>}
                */
                var markers = {};

                /**
                * Concatenates given lat and lng with an underscore and returns it.
                * This id will be used as a key of marker to cache the marker in markers object.
                * @param {!number} lat Latitude.
                * @param {!number} lng Longitude.
                * @return {string} Concatenated marker id.
                */
                var getMarkerUniqueId= function(lat, lng) 
                {
                    return lat + '_' + lng;
                };

                /**
                * Creates an instance of google.maps.LatLng by given lat and lng values and returns it.
                * This function can be useful for getting new coordinates quickly.
                * @param {!number} lat Latitude.
                * @param {!number} lng Longitude.
                * @return {google.maps.LatLng} An instance of google.maps.LatLng object
                */
                var getLatLng = function(lat, lng) 
                {
                    return new google.maps.LatLng(lat, lng);
                };

                /**
                * Binds click event to given map and invokes a callback that appends a new marker to clicked location.
                */
                var addMarker = google.maps.event.addListener(map, 'click', function(e) 
                {
                    var lat = e.latLng.lat(); // lat of clicked point
                    var lng = e.latLng.lng(); // lng of clicked point
                    var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
                    var marker = new google.maps.Marker
                        ({
                        position: getLatLng(lat, lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: 'marker_' + markerId,
                        html: "    <div id='info_"+markerId+"'>\n" +
                        "        <table class=\"map1\">\n" +
                        "            <tr>\n" +
                        "                <td><a>Description:</a></td>\n" +
                        "                <td><textarea  id='manual_description' placeholder='Description'></textarea></td></tr>\n" +
                        "            <tr><td></td><td><input type='button' value='Save' onclick='saveData("+lat+","+lng+")'/></td></tr>\n" +
                        "        </table>\n" +
                        "    </div>"
                        });

                    markers[markerId] = marker; // cache marker in markers object
                    bindMarkerEvents(marker); // bind right click event to marker
                    bindMarkerinfo(marker); // bind infowindow with click event to marker
                });

                /**
                * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
                * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
                */
                var bindMarkerinfo = function(marker) 
                {
                    google.maps.event.addListener(marker, "click", function (point) 
                    {
                        var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                        var marker = markers[markerId]; // find marker
                        infowindow = new google.maps.InfoWindow();
                        infowindow.setContent(marker.html);
                        infowindow.open(map, marker);
                        // removeMarker(marker, markerId); // remove it
                    });
                };

                /**
                * Binds right click event to given marker and invokes a callback function that will remove the marker from map.
                * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
                */

                var bindMarkerEvents = function(marker) 
                {
                    google.maps.event.addListener(marker, "rightclick", function (point) 
                    {
                        var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                        var marker = markers[markerId]; // find marker
                        removeMarker(marker, markerId); // remove it
                    });
                };

                /**
                * Removes given marker from map.
                * @param {!google.maps.Marker} marker A google.maps.Marker instance that will be removed.
                * @param {!string} markerId Id of marker.
                */

                var removeMarker = function(marker, markerId) 
                {
                    marker.setMap(null); // set markers setMap to null to remove it from map
                    delete markers[markerId]; // delete marker instance from markers object
                };


                /**
                * loop through (Mysql) dynamic locations to add markers to map.
                */

                var i ; var confirmed = 0;
                for (i = 0; i < locations.length; i++) 
                {
                    marker = new google.maps.Marker
                    ({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
                        html: "<div>\n" +
                        "<table class=\"map1\">\n" +
                        "<tr>\n" +
                        "<td><a>Description:</a></td>\n" +
                        "<td><textarea disabled id='manual_description' placeholder='Description'>"+locations[i][3]+"</textarea></td></tr>\n" +
                        "</table>\n" +
                        "</div>"
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) 
                    {
                        return function() 
                        {
                            infowindow = new google.maps.InfoWindow();
                            confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                                $("#confirmed").prop(confirmed,locations[i][4]);
                            $("#id").val(locations[i][0]);
                            $("#description").val(locations[i][3]);
                            $("#form").show();
                            infowindow.setContent(marker.html);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

                /**
                * SAVE save marker from map.
                * @param lat  A latitude of marker.
                * @param lng A longitude of marker.
                */

                function saveData(lat,lng) 
                {
                    var description = document.getElementById('manual_description').value;
                    var url = 'locations_model.php?add_location&description=' + description + '&lat=' + lat + '&lng=' + lng;
                    downloadUrl(url, function(data, responseCode) 
                    {
                        if (responseCode === 200  && data.length > 1) 
                        {
                            var markerId = getMarkerUniqueId(lat,lng); // get marker id by using clicked point's coordinate
                            var manual_marker = markers[markerId]; // find marker
                            manual_marker.setIcon(purple_icon);
                            infowindow.close();
                            infowindow.setContent("<div style=' color: purple; font-size: 25px;'> Waiting for admin confirm!!</div>");
                            infowindow.open(map, manual_marker);
                        }
                        else
                        {
                            console.log(responseCode);
                            console.log(data);
                            infowindow.setContent("<div style='color: red; font-size: 25px;'>Inserting Errors</div>");
                        }
                    });
                }

                function downloadUrl(url, callback) 
                {
                    var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

                    request.onreadystatechange = function() 
                    {
                        if (request.readyState == 4) 
                        {
                            callback(request.responseText, request.status);
                        }
                    };

                    request.open('GET', url, true);
                    request.send(null);
                }
            </script>
        </div>
    </div>
</div>
</body>
</html>
