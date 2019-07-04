<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green_task_force";
$id= $_POST["submit_info"];
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query = "SELECT * FROM locations WHERE id=$id";  
$result = mysqli_query($conn, $query);  
while($row = mysqli_fetch_array($result))
{	

	$lat = $row['lat'];
	$lng = $row['lng'];
	$description = $row['description'];
	$username = $row['username'];
	$location_status = $row['location_status'];
	$cleared = $row['cleared'];
	$image= $row['image'];
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>Green Task Force</title>
    <link rel="icon" type="image/png" href="ASSETS\titleicon.png">
</head>
<style>
	body{
    margin: 0;
    padding: 0;
    background-image:url(side.jpg);
    background-size: cover;
    font-family: sans-serif;
	background-repeat: no-repeat;
}
.activity_head
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 20px;
  background-color: #67b12f;
  width: 80px;
  margin-top: 20px;
  margin-left: 845px;
  margin-bottom: 10px;
  border-radius: 50px;
}
.l_image
{
	margin-top: 0px;
 	width: 1000px;
	height: 500px;
	background-color: white;
	background-repeat: no-repeat;
	background-size: cover;
	border: 1px solid black;

}
.main
{
	width: 1000px;
	background-color: transparent;
	
}
#info_table {
  font-family: Century Gothic;
  text-align: left;
  border-collapse: collapse;
  width: 100%;
}

#info_table td, #info_table th {
    padding: 8px;
}

.table_row
{
  border: 2px solid MediumSeaGreen;
  background-color: white;
  width: auto;
  height: 100%;
  border-radius: 20px;
  margin: 5px 5px 5px 5px;
  padding: 10px 10px 10px 10px; 
}

</style>
<body>
	<center>
	<div class="main">
			<div class="activity_head"><i>Info</i></div>
			<div > <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image ).'" class="l_image"/>'; ?></div>
			<div><br><br>
				<table id="info_table">
					<tr>
						<td><div class="table_row"><b>ID</b> : <?php echo '<i style="color: MediumSeaGreen"><b>'.$id.'</b></i>'; ?></div></td>
					</tr>
					<tr>
						<td><div class="table_row"><b>Description :</b> <br><?php echo '<i>'.$description.'</i>'; ?></div></td>
					</tr>
					<tr>
						<td><div class="table_row"><b>location :</b> <br><?php echo "<i>longitude : $lng <br> latitude : $lat</i>  "; ?></div></td>
					</tr>
					<tr>
						<td><div class="table_row"><b>Statues  :</b>
							<?php 
								if ($location_status === '1') {
								 	echo '<i style="color: #67b12f"><b>Confirmed location</b><i>';
								 		if ($cleared === '0') {
								 			echo ' <i style="color: black">and</i> <i style="color: red"><b>Not Cleared yet</b><i>';
										}
										else
										{
											echo ' <i style="color: black">and</i> <i style="color: #67b12f"><b>Cleared</b><i>';
										} 
								}
								else
								{
									echo '<i style="color: purple"><b>Unonfirmed location</b><i>';
								} 
							?></div></td>
					</tr>																							
				</table>
				
			</div>
	</div>
	</center>
</body>
</html>