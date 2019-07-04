<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green_task_force";
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>Green Task Force</title>
    <link rel="icon" type="image/png" href="ASSETS\titleicon.png">
</head>
<body>
    <style>

body{
    margin: 0;
    padding: 0;
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
    background-color: #ddd;
    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(m.jpg);
}
header
{
    height: 200px;
}

.main-nav
{
     float: right;
     list-style: none;
     margin-top: 30px;
}

.main-nav li
{
    display: inline-block;
}

.main-nav li a
{
    color: white;
    text-decoration: none;
    padding: 5px 20px;
    font-family: "Roboto",sans-serif;
    font-size: 15px;
}

.main-nav li.active a
{
    border: 2px solid #67b12f;
    background-color: #67b12f;
    border-radius: 10px;
}

.main-nav li a:hover
{
    border: 1px solid white;
    border-radius: 10px;
}

.logo img
{
    width:500px;
    height: auto;
    float: left; 
}

body
{
    font-family: Arial, Helvetica, sans-serif;
}

.main {   
    flex: 40%;
    background-color: white;
    padding: 20px;
    height: 500px;
    background-color: transparent;
}

/* Fake image, just for this example */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

.row {  
    display: flex;
    flex-wrap: wrap;
}

.user
{
  background-color: #f1f1f1;
  padding-top: 5px;
  padding-left: 5px;
  padding-bottom: 5px;
  float: right;
}
/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
    
    width: 350px;
    background-color: transparent;
    padding: 10px;
    float: right;
}
.side_h
{
    width: 350px;
    height: auto;
    background-color: transparent;
    float: right;
}
.side_b
{
    overflow: auto;
    width: 350px;
    height: 600px;
    background-color: transparent;
    float: right;
}
#logout:hover
{
  border: 2px solid tomato;
  background-color: tomato;
}
.pageicons
{
  width: 30px;
  height: 30px;
}
.confirmed
{
  border: 2px solid MediumSeaGreen;
  width: auto;
  height: 100px;
  border-radius: 20px;
  margin-right: 5px;
  background-color: white;
  background-color: #ddd;
}
.unconfirmed
{
  border: 2px solid orange;
  width: auto;
  height: 150px;
  border-radius: 20px;
  margin-right: 5px;
  background-color: white;
  background-color: #ddd;
  margin-bottom: 20px;
}
.confirmed_img
{
    float: right; 
    width: 50px;
    height: 50px; 
    margin:10px 20px 9px 9px;
}

#lolcation_del_button
{
  background-image: url("del.png");
  background-color: transparent;
  border: none;
  color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  font-size: 16px;
  cursor: pointer;
}
#confirm_button
{
  background-image: url("confirm.png");
  background-color: transparent;
  border: none;
  color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  font-size: 16px;
  cursor: pointer;
}
#confirm_button:hover
{
    background-color: #ddd;
}
#info_button
{
  background-image: url("info.png");
  background-color: transparent;
  border: none;
  color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  font-size: 16px;
  cursor: pointer;
}

#track_button_ppl
{
  background-image: url("prpl_track.png");
  background-color: transparent;
  border: none;
  color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  font-size: 16px;
  cursor: pointer;
}
#track_button_green
{
  background-image: url("green_track.png");
  background-color: transparent;
  border: none;
  color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  font-size: 16px;
  cursor: pointer;
}
.btn
{
    float: right;
    margin: 50px;   
    text-decoration: none;
    padding: 5px 20px;
    font-family: "Roboto",sans-serif;
    font-size: 15px;
    border: 2px solid white;
    color: white;
}
.btn:hover
{

    background-color: #67b12f;
    color: white;
    border: 2px solid #67b12f;
}
@media screen and (max-width: 100px) {
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
    </style>
    <header>
    <div class="logo"><img src="logo.png"></div>
    <div><a href="Signin.php" class="btn">Join with us</a></div>
    </header>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <div class="row">
        <!--side 1-->
        <div class="side">
        <div class="side_h">
          <table>
            <tr>
              <td><img style="padding-left: 10px;" src="ASSETS\confirmed.png" class="pageicons"></td>
              <td><h4 style="color: white; padding-left: 5px;   ">Locations</h4></td>
            </tr>
          </table>
        </div>

        <div class="side_b"  >
            <br>
              <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM locations WHERE location_status='1' and cleared=0 ORDER BY id DESC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                echo '<div class="confirmed">
                <div >
                        <table style="float: right;">
                            <tr>
                                <td><img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="confirmed_img" /></td>
                            </tr>
                        </table>
                </div>
                <div>
                    <table style="margin:9px 9px 9px 20px; font-family: monospace;">
                        <tr>
                            <td><div style="background-color: MediumSeaGreen; width: 5px; height: 50px;"></div></td>
                            <td ><div style="overflow: auto;  width: auto; height: 50px;">Description :<br><br> '.$row['description'].' <br><br> <p style=" color:blue;">['.$row['username'].']</p><p style=" color:blue;">[id = '.$row['id'].']</p></div></td>
                        </tr>
                    </table> 
                </div>
            </div><br>';
                     
                }
?>
        </div>
    </div>
        <!--main-->
        <div class="main">
        <table>
          <tr>
            <td><img src="ASSETS\gmaps.png" class="pageicons"></td>
            <td><h4 style="color: white; padding: 5px;">Google map</h4></td>
          </tr>
        </table>
            <?php
        include_once 'header2.php';
        include 'locations_model.php';
        ?>
        <div id="map"></div>
        <!------ Include the above in your HEAD tag ---------->
        <script>
            var map;
            var marker;
            var infowindow;
            var red_icon =  'http://maps.google.com/mapfiles/ms/icons/green-dot.png' ;
            var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
            var locations = <?php get_confirmed_locations() ?>;

            function initMap() 
            {
                var Srilanka = {lat: 7.752484, lng:  80.729071};
                infowindow = new google.maps.InfoWindow();
                map = new google.maps.Map(document.getElementById('map'), {center: Srilanka,zoom: 7});


                var i ; var confirmed = 0;
                for (i = 0; i < locations.length; i++) 
                {

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        //animation: google.maps.Animation.BOUNCE,
                        icon :red_icon,
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
                var url = 'locations_model.php?confirm_location_byadmin&id=' + id + '&confirmed=' + confirmed ;
                downloadUrl(url, function(data, responseCode) 
                {
                    if (responseCode === 200  && data.length > 1) 
                        {infowindow.setContent("<div style='color: purple; font-size: 25px;'>Inserting Errors</div>");
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
            </table>
        </div>

        <script async defer
            src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyB13PGkg5jSJNI6XUmA7weQlwG8tNH6P4c&callback=initMap">
        </script>

        </div>
        <!--side 2-->
<div class="side">
        <div class="side_h">
          <table>
            <tr>
              <td><img style="padding-left: 10px;" src="ASSETS\RSS_50px.png" class="pageicons"></td>
              <td><h4 style="color: white; padding-left: 5px;">News and Articals</h4></td>
            </tr>
          </table>
        </div>
        <div class="side_b">
            <br>
              <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM articals";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                echo '<div class="unconfirmed">
                <div>
                    <table style="margin:9px 9px 9px 20px; font-family: monospace;">
                        <tr>
                            <td><div style="background-color: orange; width: 5px; height: 100px;"></div></td>
                            <td ><div style="overflow: auto;  width: auto; height: 100px;">'.$row['description'].'</div></td>
                        </tr>
                    </table> 
                </div>
            
            </div>';
                     
                }
?>
            
        </div>
    </div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
</body>
</html>