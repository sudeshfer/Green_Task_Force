<?php
session_start();
$get_admin_name=$_SESSION['getadminname'];
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
    height: auto;
    background-color: #f1f1f1;
    padding: 10px;
    float: right;
    background-image: url(side.jpg);
    min-height: 615px;
}
.side_h
{
    width: 300px;
    height: auto;
    background-color: #f1f1f1;
    float: right;
}
.side_b
{
    overflow: scroll;
    width: 300px;
    height: 550px;
    background-color: #f1f1f1;
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
#unconfirmed_location {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

#unconfirmed_location td, #unconfirmed_location th {
  border: 1px solid #ddd;
  padding: 8px;
}

#unconfirmed_location tr:nth-child(even){background-color: #f2f2f2;}

#unconfirmed_location tr:hover {background-color: #ddd;}

#unconfirmed_location th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: MediumOrchid;
  color: white;
}

.unconfirmed_location_head
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  background-color: MediumOrchid;
  width: 10%;
  border-radius: 20px;

}

#confirmed_location {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

#confirmed_location td, #confirmed_location th {
  border: 1px solid #ddd;
  padding: 8px;
}

#confirmed_location tr:nth-child(even){background-color: #f2f2f2;}

#confirmed_location tr:hover {background-color: #ddd;}

#confirmed_location th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: MediumSeaGreen;
  color: white;

}

.confirmed_location_head
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  background-color: MediumSeaGreen;
  width: 10%;
  border-radius: 20px;
}
#cleared_locations {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

#cleared_locations td, #cleared_locations th {
  border: 1px solid #ddd;
  padding: 8px;
}

#cleared_locations tr:nth-child(even){background-color: #f2f2f2;}

#cleared_locations tr:hover {background-color: #ddd;}

#cleared_locations th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: DarkSeaGreen;
  color: white;
}

.cleared_locations_head
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  background-color: DarkSeaGreen;
  width: 10%;
  border-radius: 20px;

}
.sub
{  
  background-color: MediumSeaGreen; /* Green */
  border-radius: 20px;
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  padding: 10px 10px 10px 10px; 
  width: 50px;
  height: 50px;
  cursor: pointer;
}
.sub:hover
{
  background-color: tomato;
}
.input_type
{
display: none;
}
#promote
{
background-image: url("promote.png");
background-repeat: no-repeat;
background-position: center;
}
#demote
{
background-image: url("demote.png");
background-repeat: no-repeat;
background-position: center;
}
#remove
{
background-image: url("remove.png");
background-repeat: no-repeat;
background-position: center;
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
        <li><a href="admin_home.php">HOME</a></li>
        <li class="active"><a href="admin_locations.php">LOCATION</a></li>
        <li><a href="admin_activities.php">ACTIVITIES</a></li>
        <li><a href="admin_articles.php">ARTICLES</a></li>
        <li><a href="admin_manage.php">MANAGE</a></li>
        <li><a href="admin_about.php">ABOUT</a></li>
        <li><a href="admin_contact.php">CONTACT</a></li>
        <li><a href="admin_account.php">ACCOUNT</a></li>
        <li><a href="Signin.php" id="logout">LOGOUT</a></li><br><br>
        <table class="user">
          <tr>
            <td><img src="ASSETS\admin.png" ></td>
            <td><h4 style="color: dimgray; padding: 5px;"><?php echo $get_admin_name;?></h4></td>
          </tr>
        </table>
      </ul>

		</div>
	</header>
  <div class="row">
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->   
<!--side 1-->
    <div class="side">

    </div>
<!--main-->
        <div class="main">
    <center>
<div class="unconfirmed_location_head"style="margin-top: 50px;">
      <table>
        <tr>
          <td>Unconfirmed Locations</td>
          <td style="padding-left: 10px; font-size: 50px; padding-right: 10px;">
              <?php
                    $con=mysqli_connect("localhost","root","","green_task_force");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = "SELECT * FROM locations WHERE location_status=0 ORDER BY id ASC";

                    if ($result=mysqli_query($con,$query))
                    {
                    // Return the number of rows in result set
                    $rowcount=mysqli_num_rows($result);
                    printf($rowcount);
                    // Free result set
                    mysqli_free_result($result);
                    }

                    mysqli_close($con);
              ?>
          </td>
        </tr>
      </table>
    </div>

        <br>
        <br>
        <table id="unconfirmed_location">
  <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Latitude & Longitude</th>
    <th>Description</th>
  </tr>
  <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM locations WHERE location_status=0 ORDER BY id ASC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";  
                  echo '<td><img style="width:50px;height50px;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="confirmed_img" /></td>';
                  echo "<td>Latitude = ".$row['lat']."<br>Longitude = ".$row['lng']."</td>";
                  echo "<td>".$row['description']."</td>";               
                  echo "</tr>";
                     
                }
  ?>
        </table>
<div class="confirmed_location_head" style="margin-top: 100px;">
      <table >
        <tr>
          <td>Confirmed Locations</td>
          <td style="padding-left: 10px; font-size: 50px; padding-right: 10px;">
              <?php
                    $con=mysqli_connect("localhost","root","","green_task_force");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = "SELECT * FROM locations WHERE location_status=1 and cleared=0 ORDER BY id ASC";

                    if ($result=mysqli_query($con,$query))
                    {
                    // Return the number of rows in result set
                    $rowcount=mysqli_num_rows($result);
                    printf($rowcount);
                    // Free result set
                    mysqli_free_result($result);
                    }

                    mysqli_close($con);
              ?>
          </td>
        </tr>
      </table>
    </div>

        <br>
        <br>
        <table id="confirmed_location">
  <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Latitude & Longitude</th>
    <th>Description</th>
    <th>Confirmed by</th>
  </tr>
  <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM locations WHERE location_status=1 and cleared=0 ORDER BY id ASC"; 
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";  
                  echo '<td><img style="width:50px;height50px;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="confirmed_img" /></td>';
                  echo "<td>Latitude = ".$row['lat']."<br>Longitude = ".$row['lng']."</td>";
                  echo "<td>".$row['description']."</td>";
                  echo "<td>".$row['confirmed_by']."</td>";              
                  echo "</tr>";
                     
                }
  ?>
        </table>     


    <div class="cleared_locations_head" style="margin-top: 100px;">
      <table >
        <tr>
          <td>Cleared Locations</td>
          <td style="padding-left: 10px; font-size: 50px; padding-right: 10px;">
              <?php
                    $con=mysqli_connect("localhost","root","","green_task_force");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = "SELECT * FROM locations WHERE location_status=1 and cleared=1 ORDER BY id ASC";

                    if ($result=mysqli_query($con,$query))
                    {
                    // Return the number of rows in result set
                    $rowcount=mysqli_num_rows($result);
                    printf($rowcount);
                    // Free result set
                    mysqli_free_result($result);
                    }

                    mysqli_close($con);
              ?>
          </td>
        </tr>
      </table>
    </div>

        <br>
        <br>
        <table id="cleared_locations">
  <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Latitude & Longitude</th>
    <th>Description</th>
    <th>Confirmed by</th>
    <th>Cleared by</th>
  </tr>
  <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM locations WHERE location_status=1 and cleared=1 ORDER BY id ASC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";  
                  echo '<td><img style="width:50px;height50px;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="confirmed_img" /></td>';
                  echo "<td>Latitude = ".$row['lat']."<br>Longitude = ".$row['lng']."</td>";
                  echo "<td>".$row['description']."</td>";
                  echo "<td>".$row['confirmed_by']."</td>";
                  echo "<td>".$row['clearred_by']."</td>";             
                  echo "</tr>";
                     
                }
  ?>
        </table>     
    </center>
    </div>
<!--side 2-->
    <div class="side">
        
    </div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
  </div>
</body>
</html>