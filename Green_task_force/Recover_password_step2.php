<?php
session_start();
 $user_name=$_SESSION['username'];
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
    <div class="recover">
    <img src="ASSETS\avatar3.png" class="avatar">
    <?php echo "<h1>Hi $user_name </h1><br><br>";?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <h1> Your Password has been Successfully Send to Your Email </h1>
            <center>
                <img src="ASSETS\Ok_100px.png">
            </center>
            <h1 id="h1_newacc"><a href="Signin.php">Back to Login</a></h1>

        </form>

    </div>

</body>
</head>
</html>



