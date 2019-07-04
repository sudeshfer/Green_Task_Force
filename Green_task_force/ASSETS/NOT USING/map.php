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
    padding: 20px;
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
	<img src="ASSETS\icon3.png" class="icon">
</div>

<div class="navbar">
  <a href="admin.php">Home</a>
  <a href="map.php" class="active">Map</a>
  <a href="index.php" class="right">Logout</a>
</div>
<div class="row">
  <div class="side">
  </div>
  <div class="main">

  </div>
</div>
<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>
