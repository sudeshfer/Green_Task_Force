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
.activity
{
  border: 1px solid MediumSeaGreen;
  width: auto;
  height: 100%;
  border-radius: 20px;
  margin: 5px 5px 5px 5px;
  padding: 10px 10px 10px 10px; 
}
.activity_head
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  background-color: MediumSeaGreen;
  width: 10%;
  border-radius: 20px;
  margin-top: 50px;
}
#addbtn
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 10px;
  background-color: #67b12f;
  width: auto;
  border-radius: 20px;
  margin-left: 450px;
  cursor: pointer;
}
.delete
{
  border: none;
  cursor: pointer;
}
#contaioner
{
height: 500px;
overflow: auto;
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
        <li><a href="admin_locations.php">LOCATION</a></li>
        <li ><a href="admin_activities.php">ACTIVITIES</a></li>
        <li class="active"><a href="admin_articles.php">ARTICLES</a></li>
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
  <form action="" method="post">
  <div>
    <div class="activity_head" style="background-color: #67b12f; ">ADD Articals</div>
    <div class='activity' style="width: 500px; height: 100px;">
      <textarea style="width: 100%; height: 100%; border: none;" name="des" placeholder="Description :"></textarea>
    </div>
    <input type="submit" name="add" value="Add" id="addbtn">
  </div>
</form>
<div class="activity_head">My Articals</div>
</center>
<br><br>

<div id="contaioner">
<table style="width: 100%;">
<?php
  // Create connections
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  } 
  $query = "SELECT * FROM articals ORDER BY uploaded_date DESC";  
  $result = mysqli_query($conn, $query);  
  while($row = mysqli_fetch_array($result))  
  {                          
    $val =$row['id'];

    if ($val%2===0) {
        echo "              
    <tr>
    <td style='width:75%;'><div class='activity' style='width:100%; background-color: #ddd;'>".$row['description']."<div></td>
    <td ><div class='activity' style='width:200px; float:right; background-color: #ddd;'><center><i>".$row['uploaded_date']."<i></center><div></td>
    <td ><div class='activity' style='width:auto; float:right; background-color: #ddd;'><center><form action='' method='post'>
    <input type='text' name='id' style='display:none;' value='".$row['id']."'><input type='submit' name='delete' value='X' class='delete'></form></center><div></td>
    </tr>
                      
    ";
    }
    else
    {
        echo "
                      
    <tr>
    <td style='width:75%;'><div class='activity' style='width:100%;'>".$row['description']."<div></td>
    <td ><div class='activity' style='width:200px; float:right;'><center><i>".$row['uploaded_date']."<i></center><div></td>
    <td ><div class='activity' style='width:auto; float:right;'><center><form action='' method='post'>
    <input type='text' name='id' style='display:none;' value='".$row['id']."'><input type='submit' name='delete' value='X' class='delete' style='background-color:transparent;'></form></center><div></td>
    </tr>
                      
    ";
    }
  }
?>
</table>
</div>

    </div>
<!--side 2-->
    <div class="side">
        
    </div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
  </div>
</body>
</html>

<?php
if (isset($_POST['add']))
{
$des= $_POST["des"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO articals (description)
VALUES ('$des')";

if ($conn->query($sql) === TRUE) {
    echo "<script>window.location.replace(location);</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

if (isset($_POST['delete']))
{
$id= $_POST["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM articals WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>window.location.replace(location);</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}   
?>