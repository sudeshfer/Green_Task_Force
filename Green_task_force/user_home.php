<?php
session_start();
$get_user_name=$_SESSION['getusername'];
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
    *
{
  margin: 0;
  padding: 0;
}

header
{
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(m.jpg);
  height: 300px;
  background-size: auto;
  background-repeat: no-repeat;
  background-position: left;
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
  width:700px;
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
    
    width: 300px;
    height: 850px;
    background-color: transparent;
    padding: 10px;
    float: right;
    background-image: url(side.jpg);
}
.side_h
{
    width: 300px;
    height: auto;
    background-color: transparent;
    float: right;
}
.side_b
{
    overflow: auto;
    width: 300px;
    height: 800px;
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
  border: 2px solid limegreen;
  width: auto;
  height: 100px;
  border-radius: 20px;
  margin-right: 5px;
  background-color: white;
}
.unconfirmed
{
  border: 2px solid purple;
  width: auto;
  height: 100px;
  border-radius: 20px;
  margin-right: 5px;
  background-color: white;
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
  .container
  {
    background-color: gold;
    position: relative;
    width: 60px;
    height: 60px;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 10px 5px 5px 5px; 
  }
  .fake_image
  {
    background-color: #ddd;
    color: white;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border: 2px solid gray;
    background-image: url("add.png");
    background-size: cover;
  }
  #image
  {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 60px;
    height: 60px;
    opacity: 0;
    cursor: pointer;
  }
  #insert
  {
    margin: 20px 20px 20px 20px;
  }
  .manual_description
  {
    width: 200px;
    height: 60px;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 5px 5px 5px 5px;

  }
  .info_win_save_btn
  {
    border: none;
    background-color: gray;
    color: white;
    border-radius: 20px;
    padding: 5px 10px 5px 10px;
    cursor: pointer;
    margin-left: 5px;
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
    <div>
      <div class="logo">
        <img src="logo.png">
      </div>
      <ul class="main-nav">
        <li class="active"><a href="user_home.php">HOME</a></li>
        <li><a href="user_report.php">REPORT</a></li>
        <li><a href="user_about.php">ABOUT</a></li>
        <li><a href="user_contact.php">CONTACT</a></li>
        <li><a href="user_account.php">ACCOUNT</a></li>
        <li><a href="Signin.php" id="logout">LOGOUT</a></li><br><br>
        <table class="user">
          <tr>
            <td><img src="ASSETS\user.png" ></td>
            <td><h4 style="color: dimgray; padding: 5px;"><?php echo $get_user_name;?></h4></td>
          </tr>
        </table>
      </ul>

    </div>
  </header>
<div class="lable">
  <h1></h1>
</div>
  <div class="row">
    <!--side 1-->
      <div class="side">
        <div class="side_h">
          <table>
            <tr>
              <td><img style="padding-left: 10px;" src="ASSETS\mylocations.png" class="pageicons"></td>
              <td><h4 style="color: dimgray; padding-left: 5px;">My Locations</h4></td>
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
                $query = "SELECT * FROM locations WHERE location_status='1' and 	username ='$get_user_name' and cleared=0 ORDER BY id DESC";  
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
                          <td ><div style="overflow: auto;  width: auto; height: 50px;">Description :<br><br> '.$row['description'].'<br><br> <p style=" color:blue;">[id = '.$row['id'].']</p><br></div></td>
                      </tr>
                  </table> 
                </div>
                <div>
                    <table style="font-family: monospace; margin-left: 20px;">
                  <tr>
                      <td>
                        <center>
                          <button id="track_button_green">
                            <a style="text-decoration: none; color: transparent;" href="">tracker</a>
                          </button>
                        </center>
                      </td>

                      <td style="padding-left: 20px;">
                        <center>
                          <form action="user_info.php" target="_blank" method="POST">
                            <button id="info_button" value="'.$row['id'].'" name="submit_info"></button>
                          </form>
                        </center>
                      </td>

                  </tr>
                </table>
                </div>
            </div><br>';
                     
                }
?>

<?php
if (isset($_POST['getid'])) 
{
  $val = $_POST['getid'];


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  } 

  $sql1 = "SELECT * FROM locations WHERE id=$val";
  $result1 = $conn->query($sql1);

  if ($result1->num_rows > 0) 
  {
    // sql to delete a record
    $sql = "DELETE FROM locations WHERE id=$val";

    if ($conn->query($sql) === TRUE) 
    {
        $sqlinsert = "INSERT INTO report (id, description, uploaded_date, username) 
        VALUES (NULL, 'You delete the location <b><i>$val</i></b>', CURRENT_TIMESTAMP,'$get_user_name')";

            if ($conn->query($sqlinsert) === TRUE) 
            {
                            
                echo "<script>location.reload(true);</script>";
            } 
            else 
            {
                echo "Error: " . $sqlinsert . "<br>" . $conn->error;
            }
            $conn->close();;
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
    }
 
    $conn->close();
  } 
  else 
  {

  }
}
else
{

}
?>


         
        </div>
    </div>
      <!--main-->
      <div class="main">
        <table>
          <tr>
            <td><img src="ASSETS\gmaps.png" class="pageicons"></td>
            <td><h4 style="color: dimgray; padding: 5px;">Google map</h4></td>
          </tr>
        </table>
        <?php
        include_once 'header.php';
        include 'locations_model.php';
      ?>

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyB13PGkg5jSJNI6XUmA7weQlwG8tNH6P4c">
    </script>

    
    <div id="map">   </div>
    

    <script>
        /**
         * Create new map
         */
        var infowindow;
        var map;
        var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
        var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
        var green_icon =  'http://maps.google.com/mapfiles/ms/icons/green-dot.png' ;
        var locations = <?php get_confirmed_locations() ?>;
        var myOptions = {
            zoom: 8,

            center: new google.maps.LatLng(7.752484, 80.729071),
            mapTypeId: 'roadmap'
        };
        map = new google.maps.Map(document.getElementById('map'), myOptions);
   
      
          

     
        var markers = {};

      
        var getMarkerUniqueId= function(lat, lng) {
            return lat + '_' + lng;
        };

      
        var getLatLng = function(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        };

        /**
         * Binds click event to given map and invokes a callback that appends a new marker to clicked location.
         */
        var addMarker = google.maps.event.addListener(map, 'click', function(e) {
            var lat = e.latLng.lat(); // lat of clicked point
            var lng = e.latLng.lng(); // lng of clicked point
            var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
            var marker = new google.maps.Marker({
                position: getLatLng(lat, lng),
                map: map,
                animation: google.maps.Animation.DROP,
                id: 'marker_' + markerId,
                html: 
"<div id='info_"+markerId+"'>\n" +
"  <form method='post' enctype='multipart/form-data'>\n" +
"  <table class=\"map1\">\n" +
"    <tr >\n" +
"      <td>\n" +
"          <div class='container'>\n" +
"            <div class='fake_image'></div>\n" +
"            <div>\n" +
"              <input type='file' name='image' id='image' style='width: 100%;height: 100%;' />\n" +
"            </div>\n" +
"          </div>\n" +
"      </td>\n" +
"      <td>\n" +
"        <textarea  class='manual_description' name='Description' placeholder='Description' ></textarea>\n" +
"      </td>\n" +
"    </tr>\n" +
"    <tr>\n" +
"    <td></td>\n" +
"      <td><input type='submit' name='save' id='save' value='Save' class='info_win_save_btn'/></td>\n" +
"      <td><input type='text' name='lat' value='"+lat+"' style='display:none'></td>\n" +
"      <td><input type='text' name='lng' value='"+lng+"' style='display:none'></td>\n" +
"    </tr>\n" +
"  </table>\n" +
"  </form>\n" +
"</div>"
            });
            markers[markerId] = marker; // cache marker in markers object
            bindMarkerEvents(marker); // bind right click event to marker
            bindMarkerinfo(marker); // bind infowindow with click event to marker
        });

        /**
         * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
         */
        var bindMarkerinfo = function(marker) {
            google.maps.event.addListener(marker, "click", function (point) {
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
        var bindMarkerEvents = function(marker) {
            google.maps.event.addListener(marker, "rightclick", function (point) {
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
        var removeMarker = function(marker, markerId) {
            marker.setMap(null); // set markers setMap to null to remove it from map
            delete markers[markerId]; // delete marker instance from markers object
        };


        /**
         * loop through (Mysql) dynamic locations to add markers to map.
         */
        var i ; var confirmed = 0;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon :   locations[i][5] === '<?php echo $get_user_name ;?>'?  green_icon  : red_icon,
                html: 
                "<div>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><a>Description:</a></td>\n" +
                "<td><textarea disabled id='manual_description' placeholder='Description'>"+locations[i][3]+"</textarea></td></tr>\n" +
                "</table>\n" +
                "</div>"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
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
        function saveData(lat,lng) {
            var description = document.getElementById('manual_description').value;
            var url = 'locations_model.php?add_location&description=' + description + '&lat=' + lat + '&lng=' + lng;
            downloadUrl(url, function(data, responseCode) {
                if (responseCode === 200  && data.length > 1) {
                    var markerId = getMarkerUniqueId(lat,lng); // get marker id by using clicked point's coordinate
                    var manual_marker = markers[markerId]; // find marker
                    manual_marker.setIcon(purple_icon);
                    infowindow.close();
                    infowindow.setContent("<div style=' color: purple; font-size: 25px;'> Waiting for admin confirm!!</div>");
                    infowindow.open(map, manual_marker);
                    window.location.reload(true);

                }else{
                    console.log(responseCode);
                    console.log(data);
                    infowindow.setContent("<div style='color: red; font-size: 25px;'>Inserting Errors</div>");
                }
            });

        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    callback(request.responseText, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }


    </script>

<?php
include_once 'footer.php';

?>
      </div>
      <!--side 2-->
      <div class="side">
        <div class="side_h">
          <table>
            <tr>
              <td><img style="padding-left: 10px;" src="ASSETS\mynotconfirmed.png" class="pageicons"></td>
              <td><h4 style="color: dimgray; padding-left: 5px;">My Unconfirmed Locations</h4></td>
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
                $query = "SELECT * FROM locations WHERE location_status='0' and username ='$get_user_name' and cleared=0 ORDER BY id DESC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
        echo '<div class="unconfirmed">
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
                          <td><div style="background-color: BlueViolet; width: 5px; height: 50px;"></div></td>
                          <td ><div style="overflow: auto;  width: auto; height: 50px;">Description :<br><br> '.$row['description'].'<br><br> <p style=" color:blue;">[id = '.$row['id'].']</p><br></div></td>
                      </tr>
                  </table> 
                </div>
                <div>
                    <table style="font-family: monospace; margin-left: 20px;">
                  <tr>
                      <td>
                        <center>
                          <form action="user_info.php" target="_blank" method="POST">
                            <button id="info_button" value="'.$row['id'].'" name="submit_info"></button>
                          </form>
                        </center>
                      </td>

                      <td style="padding-left: 20px;">
                        <center>
                          <form action="" method="POST">
                            <button  id="lolcation_del_button" value="'.$row['id'].'"  name="getid"></button>
                          </form>
                        </center>
                      </td>

                  </tr>
                </table>
                </div>
            </div><br>';
                     
                }
?>
            
        </div>
    </div>
</body>
</html>



<?php  
 $con=mysqli_connect ("localhost", 'root', '','green_task_force');  
 if(isset($_POST["save"]))  
 {  
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $description = $_POST['Description'];
    // Inserts new row with place data.
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    $sql = "INSERT INTO locations (id, lat, lng, description, username, location_status, cleared, image)
            VALUES (NULL, '$lat', '$lng', '$description', '$get_user_name',0,0,'$file')";
    if ($con->query($sql) === TRUE) 
    {
        $query2 = "SELECT * FROM locations 
        WHERE CAST(lat AS DECIMAL) = CAST($lat AS DECIMAL) and CAST(lng AS DECIMAL) = CAST($lng AS DECIMAL) and  description ='$description' and  username= '$get_user_name';"; 
        $result2 = mysqli_query($con, $query2);  
        while($row = mysqli_fetch_array($result2))  
        {                          
            $val =$row['id'];

            $sqlinsert = "INSERT INTO report (id, description, uploaded_date, username) 
            VALUES (NULL, 'You add the location <b><i>$val</i></b>', CURRENT_TIMESTAMP,'$get_user_name')";

            if ($con->query($sqlinsert) === TRUE) 
            {
                            
                echo "<script>window.location.replace(location);</script>";
            } 
            else 
            {
                echo "Error: " . $sqlinsert . "<br>" . $con->error;
            }
            $con->close();
        }
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }

$conn->close();
}  

?>

<script> 

 $(document).ready(function(){  
      $('#save').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 