<?php
require("db_connection.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}
if(isset($_GET['confirm_location_byadmin'])) {
    confirm_location_byadmin();
}
if(isset($_GET['confirm_location_bycaptain'])) {
    confirm_location_bycaptain();
}


function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','green_task_force');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $description =$_GET['description'];
    session_start();
    $get_user_name=$_SESSION['getusername'];
    $get_admin_name=$_SESSION['getadminname'];
    // Inserts new row with place data.

    $sql = "INSERT INTO locations (id, lat, lng, description, username, location_status, cleared)
            VALUES (NULL, '$lat', '$lng', '$description', '$get_user_name',0,0)";
    if ($con->query($sql) === TRUE) 
    {
        $query2 = "SELECT * FROM locations 
        WHERE CAST(lat AS DECIMAL) = CAST($lat AS DECIMAL) and CAST(lng AS DECIMAL) = CAST($lng AS DECIMAL) and  description ='$description' and  username= '$get_user_name';"; 
        $result2 = mysqli_query($con, $query2);  
        while($row = mysqli_fetch_array($result2))  
        {                          
            $val =$row['id'];

            $sqlinsert = "INSERT INTO report (id, description, uploaded_date, username) 
            VALUES (NULL, 'You add the location <b><i>$val</i></b>', CURRENT_TIMESTAMP,'$get_user_name')";

            if ($con->query($sqlinsert) === TRUE) 
            {
                            
                echo "<script>location.reload(true);</script>";
            } 
            else 
            {
                echo "Error: " . $sqlinsert . "<br>" . $con->error;
            }
            $con->close();
        }
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }

$conn->close();
    session_end();
}
function confirm_location_byadmin(){
    session_start();
	$get_user_name=$_SESSION['getusername'];
    $get_admin_name=$_SESSION['getadminname'];
    $con=mysqli_connect ("localhost", 'root', '','green_task_force');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $id =$_GET['id'];
    $confirmed =$_GET['confirmed'];
    // update location with confirm if admin confirm.
    $sql = "UPDATE locations set location_status = $confirmed, confirmed_by='$get_admin_name (Admin)' WHERE id = $id";

    if($con->query($sql) === TRUE) 
    {   
        $sqlinsert = "INSERT INTO activities (id, description, uploaded_date) 
        VALUES (NULL, '<b><i>$get_admin_name</i></b> (Admin) confirmed the location <b><i>$id</i></b> ', CURRENT_TIMESTAMP)";

            if ($con->query($sqlinsert) === TRUE) 
            {          
                $sqlinsert2 = "INSERT INTO report (id, description, uploaded_date, username) 
                VALUES (NULL, 'Your location <b><i>$id</i></b> has been <b><i>Confirmed</i></b> by <b><i>$get_admin_name</i></b> (Admin)  ', CURRENT_TIMESTAMP,'$get_user_name')";

                if ($con->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>location.reload(true);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $con->error;
                }
                $con->close();
            } 
            else 
            {
                echo "Error: " . $sqlinsert . "<br>" . $con->error;
            }
            $con->close();
    } 
    else 
    {
        echo "Error updating record: " . $con->error; 
    }
    $con->close();
    session_end();
}

function confirm_location_bycaptain(){
    session_start();
    $get_user_name=$_SESSION['getusername'];
    $get_captain_name=$_SESSION['getcaptainname'];
    $con=mysqli_connect ("localhost", 'root', '','green_task_force');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $id =$_GET['id'];
    $confirmed =$_GET['confirmed'];
    // update location with confirm if admin confirm.
    $sql = "UPDATE locations set location_status = $confirmed , confirmed_by='$get_captain_name (Captain)' WHERE id = $id";

    if($con->query($sql) === TRUE) 
    {   
        $sqlinsert = "INSERT INTO activities (id, description, uploaded_date) 
        VALUES (NULL, '<b><i>$get_captain_name</i></b> (Captain) confirmed the location <b><i>$id</i></b> ', CURRENT_TIMESTAMP)";

            if ($con->query($sqlinsert) === TRUE) 
            {          
                $sqlinsert2 = "INSERT INTO report (id, description, uploaded_date, username) 
                VALUES (NULL, 'Your location <b><i>$id</i></b> has been <b><i>Confirmed</i></b> by <b><i>$get_captain_name</i></b> (Captain)  ', CURRENT_TIMESTAMP,'$get_user_name')";

                if ($con->query($sqlinsert2) === TRUE) 
                {
                            
                    echo "<script>location.reload(true);</script>";
                } 
                else 
                {
                    echo "Error: " . $sqlinsert2 . "<br>" . $con->error;
                }
                $con->close();
            } 
            else 
            {
                echo "Error: " . $sqlinsert . "<br>" . $con->error;
            }
            $con->close();
    } 
    else 
    {
        echo "Error updating record: " . $con->error; 
    }
    $con->close();
    session_end();
}
function get_confirmed_locations(){
	$get_user_name=$_SESSION['getusername'];
    $con=mysqli_connect ("localhost", 'root', '','green_task_force');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status      username= '$get_user_name'.

    $sqldata = mysqli_query($con,"SELECT id ,lat,lng,description,location_status,username as isconfirmed from locations  WHERE   location_status=1 and cleared=0 ");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }

    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function get_all_locations(){
    $con=mysqli_connect ("localhost", 'root', '','green_task_force');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"SELECT id ,lat,lng,description,location_status as isconfirmed from locations WHERE   cleared=0 ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}

?>