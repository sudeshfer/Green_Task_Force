<?php
session_start();
$get_staff_name=$_SESSION['getstaffname'];
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
  border: 2px solid MediumSeaGreen;
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
        <li class="active"><a href="staff_home.php">HOME</a></li>
        <li><a href="staff_activities.php">ACTIVITIES</a></li>
        <li><a href="staff_about.php">ABOUT</a></li>
        <li><a href="staff_contact.php">CONTACT</a></li>
        <li><a href="staff_account.php">ACCOUNT</a></li>
        <li><a href="Signin.php" id="logout">LOGOUT</a></li><br><br>
        <table class="user">
          <tr>
            <td><img src="ASSETS\staffpng.png" ></td>
            <td><h4 style="color: dimgray; padding: 5px;"><?php echo $get_staff_name;?></h4></td>
          </tr>
        </table>
      </ul>

    </div>
  </header>
<div class="lable">
  <h1></h1>
</div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
  <div class="row">
    <!--side 1-->
      <div class="side">
        <div class="side_h">
          <table>
            <tr>
              <td><img style="padding-left: 10px;" src="ASSETS\confirmed.png" class="pageicons"></td>
              <td><h4 style="color: dimgray; padding-left: 5px;   ">Locations</h4></td>
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

                      <td style="padding-left: 20px;"style="padding-left: 50px;">
                        <img src="cleaner.png">
                      </td>

<form action="" method="POST">
                      <td style="padding-left: 5px;">
                        <input type="checkbox" name="checkbox" value="cleared">
                      </td>

                      <td style="padding-left: 5px;">
                        <button  id="confirm_button" value="'.$row['id'].'" name="submit"></button>
                      </td>
</form>
                      <td style="padding-left: 20px;">
                        <center>
                          <form action="staff_info.php" target="_blank" method="POST">
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
if (isset($_POST['submit'])) 
{
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  $L_id = $_POST['submit'];

    $query = "SELECT * FROM locations WHERE id=$L_id";  
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_array($result))
  {
    if ($row['cleared'] === '0')
    {
      $user_name = $row['username'];
      $L_id;

      if(!empty($_POST['checkbox']))
      {
        $statues = $_POST['checkbox'];
        if($statues ==="cleared")
        {
          $sql = "UPDATE locations SET cleared=1, clearred_by='$get_staff_name' WHERE id=$L_id";

          if($conn->query($sql) === TRUE) 
          {   
            $sqlinsert = "INSERT INTO activities (id, description, uploaded_date,cleared_by) VALUES (NULL, 
            '<b><i>$L_id</i></b>  loacation has been <b>cleared</b> and confirmed by <b><i>$get_staff_name</i></b> (Staff member) <br> Location added by - <i>$user_name</i>'
            , CURRENT_TIMESTAMP,'$get_staff_name')";

            if ($conn->query($sqlinsert) === TRUE) 
            {
                $sqlinsert2 = "INSERT INTO report (id, description, uploaded_date, username) 
                VALUES (NULL, 'Your location <b><i>$L_id</i></b> has been <b><i>Cleared</i></b> and Confirmed by <b><i>$get_staff_name</i></b> (Staff member)  ', CURRENT_TIMESTAMP,'$user_name')";

                if ($conn->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>location.reload(true);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $conn->error;
                }
                $conn->close();
            } 
            else 
            {
                echo "Error: " . $sqlinsert . "<br>" . $conn->error;
            }
            $conn->close();
          } 
          else 
          {
              echo "Error updating record: " . $conn->error;
          }
          $conn->close();
        }
        else
        {
          echo "null";  
        }
      }
      else
      {

      }
    }
    else
    {
    
    }
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
                map = new google.maps.Map(document.getElementById('map'), {center: Srilanka,zoom: 8});


                var i ; var confirmed = 0;
                for (i = 0; i < locations.length; i++) 
                {

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        //animation: google.maps.Animation.BOUNCE,
                        icon :  red_icon,
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
        
    </div>
  </div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
</body>
</html>