<?php
session_start();
include('dbcon.php');


$name = $_POST['name'];
$fromdestination = $_SESSION['fromdest'];
$todestination = $_SESSION['todest'];
$travelclass = $_POST['travelclass'];
$list = $_POST['list'];
$passenger_1 = $_POST['passenger_1'];
$passenger_2 = $_POST['passenger_2'];
$passenger_3 = $_POST['passenger_3'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railway";

$con =new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error){
    die("connection failed:".$con->connect_error);
}
echo "Connection successfully";


$sql = "INSERT INTO ticket (name,from_dest,to_dest,travelclass,list,passenger_1,passenger_2,passenger_3)
        SELECT name,from_dest,to_dest,travelclass,list,passenger_1,passenger_2,passenger_3
        FROM train_det";
        

if ($con->query($sql) == TRUE) {
    
            ?>
              <script>
                location.replace("booking-confirmation.php");
              </script>
            <?php
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>