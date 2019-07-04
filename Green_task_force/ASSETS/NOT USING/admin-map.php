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
    padding: 5px;
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
  <a href="admin.php">Home</a>
  <a href="admin-map.php" class="active">Map</a>
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
        <div id="map"></div>
        <!------ Include the above in your HEAD tag ---------->
        <script>
            var map;
            var marker;
            var infowindow;
            var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
            var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
            var locations = <?php get_all_locations() ?>;

            function initMap() 
            {
                var Srilanka = {lat: 7.752484, lng:  80.729071};
                infowindow = new google.maps.InfoWindow();
                map = new google.maps.Map(document.getElementById('map'), {center: Srilanka,zoom: 8});


                var i ; var confirmed = 0;
                for (i = 0; i < locations.length; i++) 
                {

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
                        html: document.getElementById('form')});

                    google.maps.event.addListener(marker, 'click', (function(marker, i) 
                    {
                        return function() 
                        {
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
            }

            function saveData() 
            {
                var confirmed = document.getElementById('confirmed').checked ? 1 : 0;
                var id = document.getElementById('id').value;
                var url = 'locations_model.php?confirm_location&id=' + id + '&confirmed=' + confirmed ;
                downloadUrl(url, function(data, responseCode) 
                {
                    if (responseCode === 200  && data.length > 1) 
                        {
                            infowindow.close();
                            window.location.reload(true);
                        }
                        else
                        {
                            infowindow.setContent("<div style='color: purple; font-size: 25px;'>Inserting Errors</div>");
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

        <div style="display: none" id="form">
            <table class="map1">
                <tr>
                    <input name="id" type='hidden' id='id'/>
                    <td><a>Description:</a></td>
                    <td><textarea disabled id='description' placeholder='Description'></textarea></td>
                </tr>
                <tr>
                    <td><b>Confirm Location ?:</b></td>
                    <td><input id='confirmed' type='checkbox' name='confirmed'></td>
                </tr>

                <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
            </table>
        </div>

        <script async defer
            src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyB13PGkg5jSJNI6XUmA7weQlwG8tNH6P4c&callback=initMap">
        </script>

    </div>

</div>
<!--
    <div class="footer">
        <h2>Footer</h2>
    </div>
-->
</body>
</html>
