<?php
session_start();
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>Green Task Force</title>
    <link rel="icon" type="image/png" href="ASSETS\titleicon.png">
<body id="loginpage">
<style>
    .error 
{
    color: #FF7800;
}
body{
    margin: 0;
    padding: 0;
    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}
.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}
h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}
h2{
    margin: 0;
    padding: 0 0 0px;
    text-align: center;
    font-size: 50px;
    font-family: Freestyle Script;
    color: #67b12f;
}
.recover{
    width: 400px;
    height: 400px;
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


.recover p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.recover input{
    width: 100%;
    margin-bottom: 20px;
}

.recover input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.recover input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #67b12f ;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.recover input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.recover a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.recover a:hover
{
    color: #ffc107;
}

#h1_newacc{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 12px;
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
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$LOGINERR=NULL;
$email= NULL;
function test($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['login'])) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["email"])) {
    $LOGINERR = "Email is required";
  } else {
    $email = test($_POST["email"]);
    // check if email address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $LOGINERR = "Invalid email format"; 
    }
  }
}


if($LOGINERR==NULL)
{
    $email= $_POST["email"];


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

$sqlquery = mysqli_query($conn,"SELECT * FROM login WHERE email='{$email}'");
$count =  mysqli_num_rows($sqlquery);
$row = mysqli_fetch_array($sqlquery);

if ($count > 0) 
{
//echo "<script>alert('Login Successful ');</script>";
$LOGINERR = "<font color=l#a9c12d>Email Confirmed</font>";
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'GreenTaskForceCMC@gmail.com';                 // SMTP username
    $mail->Password = 'gtf123456';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('GreenTaskForceCMC@gmail.com', 'Green Task Force');
    $mail->addAddress($email, $email);     // Add a recipient
    
    //Attachments
    $mail->AddEmbeddedImage("icon5.jpg", 1001, 'icon5.jpg');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recover Password';
    $mail->Body    = "Hi, <b><i>{$row['username']}..........</i></b><br><br> Your Password is <b>'{$row['password']}'</b><br><img src='cid:1001' width='500' height='200'>";
    $mail->AltBody = "Hi,{$row['username']}<br> Your Password is {$row['password']}";
    $LOGINERR = "<font color=#a9c12d>Sending Email....</font>";
    $mail->send();
    $xx=$row['username'];
    
    $_SESSION['username']=$xx;
    
    header('location: Recover_password_step2.php');
    

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

} 
else 
{
//echo "<script>alert('Username or Password is Wrong ');</script>";
$LOGINERR = "Email Address is Not Found";

}
$conn->close();
}
 else {
    
}

}
else
{

}
?>
    <div class="recover">
    <img src="ASSETS\avatar2.png" class="avatar">
        <h1>Enter  Your Email address to Recover the Password</h1><br><br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <p>Email Address</p>
            <input type="text" name="email" placeholder="Enter Your Email Address"><br><br>
            <span class="error"><?php echo $LOGINERR;?></span><br><br>
            <input type="submit"name="login" value="Recover Password">
            <h1 id="h1_newacc"><a href="Signin.php">Back to Login</a></h1>

        </form>

    </div>

</body>
</head>
</html>

