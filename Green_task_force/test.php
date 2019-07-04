<?php


// define variables and set to empty values
$newFirstNameErr = $newLastNameErr  = $newusernameErr =$newpasswordErr = $newemailErr = NULL;
$newFirstName = $newLastName = $newusername = $newpassword = $newemail = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["new_First_Name"])) {
    $newFirstNameErr = "First Name is required";
  } else {
    $newFirstName = test_input($_POST["new_First_Name"]);
    // check if new_First_Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$newFirstName)) {
      $newFirstNameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["new_Last_Name"])) {
    $newLastNameErr = "Last Name is required";
  } else {
    $newLastName = test_input($_POST["new_Last_Name"]);
    // check if new_Last_Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$newLastName)) {
      $newLastNameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["new_password"])) {
    $newpasswordErr = "Password is required";
  } else {
    $newpassword = test_input($_POST["new_password"]);
    // check if new_password only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$newpassword)) {
      $newpasswordErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["new_email"])) {
    $newemailErr = "Email is required";
  } else {
    $newemail = test_input($_POST["new_email"]);
    // check if newemail address is well-formed
    if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
      $newemailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["new_username"])) {
    $newusernameErr = "Username is required";
  } else {
    $newusername = test_input($_POST["new_username"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['SIGNUP'])) {
if ($newFirstNameErr==NULL&&$newLastNameErr==NULL&&$newusernameErr==NULL&&$newpasswordErr==NULL&&$newemailErr==NULL) 
{
//echo "came";
//echo "<br>";

$newFirstName= $_POST["new_First_Name"];
$newLastName= $_POST["new_Last_Name"];
$newusername= $_POST["new_username"];
$newpassword= $_POST["new_password"];
$newemail= $_POST["new_email"];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green_task_force";
if ($newFirstName!=NULL||$newLastName!=NULL||$newusername!=NULL||$newpassword!=NULL||$newemail!=NULL) 
{
//echo "working";
//echo "<br>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `login` (`id`, `firstname`, `lastname`, `username`, `password`, `email`,`statues`)
VALUES (NULL, '$newFirstName', '$newLastName', '$newusername', '$newpassword', '$newemail', 'user')";

if ($conn->query($sql) === TRUE) {
echo "<script>alert('Your Account has been Created Successfully !');</script>";
echo "<script>confirm('Back to Login ?');</script>";

} 
else 
{
    echo "<script>alert('Error : Mysql server Connection Error ');</script>";
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
else
{

}

} else {
//echo "nothing";
//echo "<br>";

}
}
else{

}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  background-color: red;
  width: auto;
  height: auto;
}

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
.Create_account{
    width: 400px;
    height: 800px;
    background: rgba(0,0,0,0.5);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius: 20px;
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
    background: red ;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.Create_account button:hover
{
    cursor: pointer;
    background: red;
    color: #000;
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
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
</style>
</head>
<body>
<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
  <form class="Create_account" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
          <lable>First Name</lable>
            <input type="text" name="new_First_Name" placeholder="Enter Your First Name">
            <span class="error">*<?php echo $newFirstNameErr;?></span>
            <br><br>
            <lable>Last Name</lable>
            <input type="text" name="new_Last_Name" placeholder="Enter Your Last Name">
            <span class="error">*<?php echo $newLastNameErr;?></span>
            <br><br>
            <lable>Username</lable>
            <input type="text" name="new_username" placeholder="Enter Your Username">
            <span class="error">*<?php echo $newusernameErr;?></span>
            <br><br>
            <lable>New Password</lable>
            <input type="password" name="new_password" placeholder="Enter Your New Password">
            <span class="error">*<?php echo $newpasswordErr;?></span>
            <br><br>
            <lable>Email</lable>
            <input type="text" name="new_email" placeholder="Enter Your Email">
            <span class="error">* <?php echo $newemailErr;?></span>
            <br><br>
            <input type="submit" name="SIGNUP" value="Sign Up">
            <button type="button" id="cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
