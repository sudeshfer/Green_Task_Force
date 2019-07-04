<?php
session_start();
$get_staff_name=$_SESSION['getstaffname'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green_task_force";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM login WHERE username='$get_staff_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $adminfirstname = $row["firstname"];
        $adminlastname = $row["lastname"];
        $adminemail = $row["email"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
.pro_pic
{
  width: 150px;
  height: 150px;
  background-color: white;/*#e5e5e7;*/
  border: 5px solid gray;
  border-radius: 50%;
  margin-top: 50px;
  background-image: "logo.png";
}
#account_table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

#account_table td, #account_table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#account_table tr:nth-child(even){background-color: #f2f2f2;}

#account_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: MediumSeaGreen;
  color: white;
}
.input
{
  width: 100%; 
  height: 100% ; 
  text-align: center; 
  font-size: 15px; 
  border : none;
}
#sub
{
  float: right;   
  background-color: MediumSeaGreen; /* Green */
  border-radius: 20px;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin-top: 25px;
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

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
     
  background-color: MediumSeaGreen; /* Green */
  border-radius: 20px;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin-top: 25px;
  margin-left: 72%;
  cursor: pointer;

}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  bottom: 0;
  right: 15px;
  z-index: 9;
  margin-top: 100px;
}


.Create_account{
    width: 400px;
    height: 800px;
    background: rgba(0,0,0,0.5);
    color: #fff;
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius: 20px;
    float: center;
}

.Create_account p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.Create_account input{
    width: 100%;
    margin-bottom: 20px;
}
.Create_account button{
    width: 100%;
    margin-bottom: 20px;
}
.Create_account input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.Create_account input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #67b12f ;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.Create_account input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.Create_account button
{
    border: none;
    outline: none;
    height: 40px;
    background: tomato ;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.Create_account lable
{
float: left;
}
.Create_account button:hover
{
    cursor: pointer;
    background: red;
}
.Create_account a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.Create_account a:hover
{
    color: #ffc107;
}
.error 
{
    color: #F8981f;
}
::placeholder {
    color: darkgrey;
    opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color: darkgrey;
}

::-ms-input-placeholder { /* Microsoft Edge */
   color: darkgrey;
}
	</style>
	<header>
		<div>
			<div class="logo">
				<img src="logo.png">
			</div>
			<ul class="main-nav">
        <li><a href="staff_home.php">HOME</a></li>
        <li><a href="staff_activities.php">ACTIVITIES</a></li>
        <li><a href="staff_about.php">ABOUT</a></li>
        <li><a href="staff_contact.php">CONTACT</a></li>
        <li class="active"><a href="staff_account.php">ACCOUNT</a></li>
        <li><a href="Signin.php" id="logout">LOGOUT</a></li><br><br>
        <table class="user">
          <tr>
            <td><img src="ASSETS\staffpng.png"></td>
            <td><h4 style="color: dimgray; padding: 5px;"><?php echo $get_staff_name;?></h4></td>
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
  <div class="pro_pic"><img src="ASSETS\staff_100px.png" style="width: 100px; height: 100px; padding-top: 25px; "></div>
  <br>
  <p style="color: gray; font-size: 20px;"> <?php echo $get_staff_name; ?></p> <br>
  <center>
    <div style="width: 500px;margin-top: 25px;">
      <form action="" method="POST">
        <table id="account_table">
        <tr>
          <th>Firstname</th>
          <td><input class="input" type="text" name="f_name" value="<?php echo $adminfirstname; ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th>Lastname</th>
          <td><input  class="input" type="text" name="l_name" value="<?php echo $adminlastname; ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
         <th>Email</th>
          <td><input class="input" type="text" name="e_mail" value="<?php echo $adminemail; ?>"></td>
        </tr>
        </table>
        <input id="sub" type="submit" name="save" value="Save" >
      </form>
    </div>
</center>
</center>
  </div>

<!--side 2-->
    <div class="side">
        
    </div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
  </div>


<?php
if (isset($_POST['save']))
{
  $fname= $_POST["f_name"];
  $lname= $_POST["l_name"];
  $e__mail= $_POST["e_mail"];
  if ($fname==='' or $lname==='' or $e__mail==='') 
  {

  }
  else
  {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "UPDATE login SET  firstname='$fname',lastname ='$lname',email ='$e__mail' WHERE username='$get_staff_name'";

    if ($conn->query($sql) === TRUE) {
      echo "<script>window.location.replace(location);</script>";
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
  }
}
else
{

}
?>
</body>
</html>