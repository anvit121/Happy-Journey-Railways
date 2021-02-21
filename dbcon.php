<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "railway";

$con =mysqli_connect($server, $user, $password, $db);

if($con){
    
}else{
    ?>
    <script>
        alert("NO Connection");
    </script>
    <?php
}
?>