<?php
session_start();
$get_captain_name=$_SESSION['getcaptainname'];
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
        <li ><a href="captain_home.php">HOME</a></li>
        <li><a href="captain_users.php">USERS</a></li>
        <li><a href="captain_activities.php">ACTIVITIES</a></li>
        <li class="active"><a href="captain_about.php">ABOUT</a></li>
        <li><a href="captain_contact.php">CONTACT</a></li>
        <li><a href="captain_account.php">ACCOUNT</a></li>
        <li><a href="Signin.php" id="logout">LOGOUT</a></li><br><br>
        <table class="user">
          <tr>
            <td><img src="ASSETS\captain.png" ></td>
            <td><h4 style="color: dimgray; padding: 5px;"><?php echo $get_captain_name;?></h4></td>
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
      <div style="width: 800px; padding-left: 200px;">
        <center>
      <table style="padding-top: 100px;">
        <tr>
          <td><b><i style="font-size: 30px; color: gray;">Green Task Force</i></b></td>
        </tr>
        <tr>
          <td style="padding-top: 10px;"><div>
            <hr><br><i>in the present day srilanka we can see a lot of people throwing away garbage in the streets 
destroying animal habitats and defacing the environtment.it's our
responsibility as citizens of this beautiful island to get rid of this waste and keep our surroundings clean.
volunteers can now join with the green task force to create a more greener environtment.
this website is dedicated to optimize garbage collection.volunteers in the colombo district can report thrown 
away garbage so that garbage trucks can collect them.</i><br><br>
          <hr></div></td>
          <td><div><img src="newicon.png" style="width: 250px; height: 100px;"></div><br></td>
        </tr>
      </table>
      </center>
      <br><br>
      <h3 style=" color: gray;">Our Goals</h3><br>
      <ul style="padding-left: 50px; color: gray;">
        <li>to make people aware of the damage they are causing to the environtment.</li>
        <li>to gain more volunteers.</li>
        <li>to beautify the environtment.</li>
        <li>to promote our vision.</li>
        <li>to educate people with good practices.</li>
      </ul>
      <br><br>
    </div>
    

      
      <div><CENTER><img src="ASSETS\FF.JPG" style="width: 900px; height: 500px;"></CENTER> </div><br>

    </div>
<!--side 2-->
    <div class="side">
        
    </div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
  </div>
</body>
</html>