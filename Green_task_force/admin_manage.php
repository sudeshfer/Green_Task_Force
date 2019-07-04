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

#captain_table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

#captain_table td, #captain_table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#captain_table tr:nth-child(even){background-color: #f2f2f2;}

#captain_table tr:hover {background-color: #ddd;}

#captain_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: MediumSeaGreen;
  color: white;
}

.captain_table_head
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  background-color: MediumSeaGreen;
  width: 10%;
  border-radius: 20px;

}

#staff_table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

#staff_table td, #staff_table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#staff_table tr:nth-child(even){background-color: #f2f2f2;}

#staff_table tr:hover {background-color: #ddd;}

#staff_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: DarkKhaki;
  color: white;

}

.staff_table_head
{
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  background-color: DarkKhaki;
  width: 10%;
  border-radius: 20px;
}
#user_table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  text-align: center;
  border-collapse: collapse;
  width: 100%;
}

#user_table td, #user_table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#user_table tr:nth-child(even){background-color: #f2f2f2;}

#user_table tr:hover {background-color: #ddd;}

#user_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: DarkSeaGreen;
  color: white;
}

.user_table_head
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
        <li><a href="admin_locations.php">LOCATION</a></li>
        <li><a href="admin_activities.php">ACTIVITIES</a></li>
        <li><a href="admin_articles.php">ARTICLES</a></li>
        <li class="active"><a href="admin_manage.php">MANAGE</a></li>
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
<div class="captain_table_head"style="margin-top: 50px;">
      <table>
        <tr>
          <td><img src='ASSETS\captain_table.png'></td>
          <td style="padding-left: 10px; font-size: 50px; padding-right: 10px;">
              <?php
                    $con=mysqli_connect("localhost","root","","green_task_force");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = "SELECT * FROM login WHERE statues='captain' ORDER BY id ASC";

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
        <tr>
          <td>Captains</td>
        </tr>
      </table>
    </div>

        <br>
        <br>
        <table id="captain_table">
  <tr>
    <th>Profile pic</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Demote</th>
    <th>Remove</th>
  </tr>
  <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM login WHERE statues='captain' ORDER BY id ASC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                  echo "<tr>";  
                  echo "<td><img src='ASSETS\captain.png'></td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".$row['firstname']."</td>";
                  echo "<td>".$row['lastname']."</td>";
                  echo "<td>".$row['email']."</td>";
                  echo '
                  <td>
                  <form action="" method="POST">
                  <input class="input_type" type="" name="cap_demote_id"   value="'.$row['id'].'">
                  <input class="sub" type="submit" name="cap_demote" value="" id="demote"><br>
                  </form>
                  </td>'; 
                  echo '
                  <td>
                  <form action="" method="POST">
                  <input class="input_type" type="" name="cap_remove_id"   value="'.$row['id'].'">
                  <input class="sub" type="submit" name="cap_remove" value="" id="remove"><br>
                  </form>
                  </td>';                 
                  echo "</tr>";
                     
                }
  ?>
        </table>
<div class="staff_table_head" style="margin-top: 100px;">
      <table >
        <tr>
          <td><img src='ASSETS\staff_table.png'></td>
          <td style="padding-left: 10px; font-size: 50px; padding-right: 10px;">
              <?php
                    $con=mysqli_connect("localhost","root","","green_task_force");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = "SELECT * FROM login WHERE statues='staff' ORDER BY id ASC";

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
        <tr>
          <td>Staff</td>
        </tr>
      </table>
    </div>

        <br>
        <br>
        <table id="staff_table">
  <tr>
    <th>Profile pic</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Promote</th>
    <th>Remove</th>
  </tr>
  <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM login WHERE statues='staff' ORDER BY id ASC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                  echo "<tr>";  
                  echo "<td><img src='ASSETS\User.png'></td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".$row['firstname']."</td>";
                  echo "<td>".$row['lastname']."</td>";
                  echo "<td>".$row['email']."</td>";
                  echo '
                  <td>
                  <form action="" method="POST">
                  <input class="input_type" type="" name="staff_promote_id" value="'.$row['id'].'">
                  <input class="sub" type="submit" name="staff_promote" value="" id="promote"><br>
                  </form>
                  </td>'; 
                  echo '
                  <td>
                  <form action="" method="POST">
                  <input class="input_type" type="" name="staff_remove_id"   value="'.$row['id'].'">
                  <input class="sub" type="submit" name="staff_remove" value="" id="remove" ><br>
                  </form>
                  </td>';
                  echo "</tr>";
                     
                }
  ?>
        </table>     


    <div class="user_table_head" style="margin-top: 100px;">
      <table >
        <tr>
          <td><img src='ASSETS\user_table.png'></td>
          <td style="padding-left: 10px; font-size: 50px; padding-right: 10px;">
              <?php
                    $con=mysqli_connect("localhost","root","","green_task_force");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = "SELECT * FROM login WHERE statues='user' ORDER BY id ASC";

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
        <tr>
          <td>Users</td>
        </tr>
      </table>
    </div>

        <br>
        <br>
        <table id="user_table">
  <tr>
    <th>Profile pic</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Remove</th>
  </tr>
  <?php
// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                $query = "SELECT * FROM login WHERE statues='USER' ORDER BY id ASC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                         
                  echo "<tr>";  
                  echo "<td><img src='ASSETS\User.png'></td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".$row['firstname']."</td>";
                  echo "<td>".$row['lastname']."</td>";
                  echo "<td>".$row['email']."</td>";
                  echo '
                  <td>
                  <form action="" method="POST">
                  <input class="input_type" type="" name="user_remove_id"  value="'.$row['id'].'">
                  <input class="sub" type="submit" name="user_remove" value="" id="remove">
                  </form>
                  </td>';
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

<!--CAPTIAN -->
  <?php
/* captain Demote-------------------------------------------------------------------------*/
if (isset($_POST['cap_demote']))
{
  $id= $_POST["cap_demote_id"];
  if ($id==='') 
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
      $query2 = "SELECT * FROM login WHERE id=$id";  
      $result2 = mysqli_query($conn, $query2);  
      while($row = mysqli_fetch_array($result2))
      {
          $user = $row['username'];
      } 
    // sql to delete a record
    $sql = "UPDATE login SET statues='staff' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

                $sqlinsert2 = "INSERT INTO activities (id, description, uploaded_date) 
                VALUES (NULL, '<b><i>$user</i></b> (former Caption) has been demoted by <b><i>$get_admin_name</i></b>', CURRENT_TIMESTAMP)";

                if ($conn->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>window.location.replace(location);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $conn->error;
                }
                $conn->close();
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
  }
}
else
{

}
/* captain remove-------------------------------------------------------------------------*/
if (isset($_POST['cap_remove']))
{
  $id= $_POST["cap_remove_id"];
  if ($id==='') 
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
      $query2 = "SELECT * FROM login WHERE id=$id";  
      $result2 = mysqli_query($conn, $query2);  
      while($row = mysqli_fetch_array($result2))
      {
          $user = $row['username'];
      } 
    // sql to delete a record
    $sql = "DELETE FROM login WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

                $sqlinsert2 = "INSERT INTO activities (id, description, uploaded_date) 
                VALUES (NULL, '<b><i>$get_admin_name</i></b>  Removed  <b><i>$user</i></b> (former Caption)', CURRENT_TIMESTAMP)";

                if ($conn->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>window.location.replace(location);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $conn->error;
                }
                $conn->close();
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
  }
}
else
{

}
?>


<!--STAFF -->
  <?php
/* STAFF promote-------------------------------------------------------------------------*/
if (isset($_POST['staff_promote']))
{
  $id= $_POST["staff_promote_id"];
  if ($id==='') 
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
      $query2 = "SELECT * FROM login WHERE id=$id";  
      $result2 = mysqli_query($conn, $query2);  
      while($row = mysqli_fetch_array($result2))
      {
          $user = $row['username'];
      } 
    // sql to delete a record
    $sql = "UPDATE login SET statues='captain' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

                $sqlinsert2 = "INSERT INTO activities (id, description, uploaded_date) 
                VALUES (NULL, '<b><i>$user</i></b> (former staff member) has been promoted by <b><i>$get_admin_name</i></b>', CURRENT_TIMESTAMP)";

                if ($conn->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>window.location.replace(location);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $conn->error;
                }
                $conn->close();
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
  }
}
else
{

}
/* STAFF remove-------------------------------------------------------------------------*/
if (isset($_POST['staff_remove']))
{
  $id= $_POST["staff_remove_id"];
  if ($id==='') 
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
      $query2 = "SELECT * FROM login WHERE id=$id";  
      $result2 = mysqli_query($conn, $query2);  
      while($row = mysqli_fetch_array($result2))
      {
          $user = $row['username'];
      } 
    // sql to delete a record
    $sql = "DELETE FROM login WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

                $sqlinsert2 = "INSERT INTO activities (id, description, uploaded_date) 
                VALUES (NULL, '<b><i>$get_admin_name</i></b>  Removed  <b><i>$user</i></b> (former staff member)', CURRENT_TIMESTAMP)";

                if ($conn->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>window.location.replace(location);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $conn->error;
                }
                $conn->close();
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
  }
}
else
{

}
?>


<!--USER -->
  <?php
/* USER remove-------------------------------------------------------------------------*/
if (isset($_POST['user_remove']))
{
  $id= $_POST["user_remove_id"];
  if ($id==='') 
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
      $query2 = "SELECT * FROM login WHERE id=$id";  
      $result2 = mysqli_query($conn, $query2);  
      while($row = mysqli_fetch_array($result2))
      {
          $user = $row['username'];
      } 
    // sql to delete a record
    $sql = "DELETE FROM login WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

                $sqlinsert2 = "INSERT INTO activities (id, description, uploaded_date) 
                VALUES (NULL, '<b><i>$get_admin_name</i></b>  Removed  <b><i>$user</i></b> (user)', CURRENT_TIMESTAMP)";

                if ($conn->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>window.location.replace(location);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $conn->error;
                }
                $conn->close();
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
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
