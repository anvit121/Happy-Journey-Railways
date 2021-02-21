<?php

session_start();
include('dbcon.php');
if(isset($_POST['form'])){
    $name = $_SESSION['name'];
    $fromdestination = $_POST['fromdest'];
    $todestination = $_POST['todest'];
    
    $_SESSION['fromdest'] = $fromdestination;
    $_SESSION['todest'] = $todestination;
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HAPPY JOURNEY RAILWAYS</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="icon" href="trainicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@100;500&display=swap" rel="stylesheet">
    </head>

    <body>

    <?php
       include('dbcon.php');
        
        if(isset($_POST['submit'])){

        $name = $_SESSION['name'];
        $fromdestination = $_SESSION['fromdest'];
        $todestination = $_SESSION['todest'];
     
        $departure = $_POST['departing'];
        $travelclass = $_POST['travelclass'];
        $list = $_POST['list'];
        if($list ==''){
            $_SESSION['error'] = "No Train Found";
            header("Location: form.php");
        }
        $passen_1 = $_POST['passenger_1'];
        $gen_1 = $_POST['gender_1'];
        $age_1 = $_POST['age_1'];
        $passen_2 = $_POST['passenger_2'];
        $gen_2 = $_POST['gender_2'];
        $age_2 = $_POST['age_3'];
        $passen_3 = $_POST['passenger_3'];
        $gen_3 = $_POST['gender_3'];
        $age_3 = $_POST['age_3'];
        $food = $_POST['food'];

        $sql = "INSERT INTO `train_det` (`name`,`from_dest`,`to_dest`,`departing`,`travelclass`,`list`,`passenger_1`,`gender_1`,`age_1`,`passenger_2`,`gender_2`,`age_2`,`passenger_3`,`gender_3`,`age_3`,`food`)
		VALUES ('$name','$fromdestination','$todestination','$departure','$travelclass','$list','$passen_1','$gen_1','$age_1','$passen_2','$gen_2','$age_2','$passen_3','$gen_3','$age_3','$food')";

        
        if ($con->query($sql) == TRUE) {
            echo"Record inserted successfully";
            ?>
                    <script>
                         location.replace("ticket.php");
                    </script>
            <?php
            
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

    }

        $con->close();
?>
        <header>
            <nav>
                <h1 id="logo">HAPPY JOURNEY RAILWAYS</h1>
                <ul class="nav-links ">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php">About</a></li>
                    <li><a href="home.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </header>
        <div class="profile">
            <h4>Welcome to the booking form <?php echo $_SESSION['name'] ; ?>!</h4>
        </div>
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <div class="booking-form1">
                 <h3 class="text-center"> Reservation Form </h3>
                 <label class ="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['name']; ?>" disabled/>
                    <label class ="name">From</label>
                    <input type="text" name="from_dest" id="name" class="form-control" value="<?php echo $_POST['fromdest']; ?>" disabled/>
                    <label class ="name">To</label>
                    <input type="text" name="to_dest" id="name" class="form-control" value="<?php echo $_POST['todest']; ?>" disabled/>

                        <div class="bookingform">
                            <div class="input-group">  
                        <label class ="name" >Departure date</label>
                        <input type="date" class="form-control select date" name="departing">
                        
                        </div>
                        
                        <div class="input-group">
                        <label class ="name">Travel Class </label>
                        <select class="custom-select" name="travelclass">
                            <option value="(1A)">AC First Class (1A)</option>
                            <option value="(2A)">AC 2 Tier (2A)</option>
                            <option value="(3A)">AC 3 tier (3A)</option>
                            <option value="(CC)">AC Chair car (CC)</option>
                            <option value="(SL)">Sleeper (SL)</option>
                        </select>
                        </div>
                      </div>
                            <div>
                    <label class="list-head">List of Available Trains </label>
                    
                    <?php
                    include('dbcon.php');
                            if(isset($_POST['form'])){
                            
                            $fromdestination = $_SESSION['fromdest'];
                            $todestination = $_SESSION['todest'];
                            
                            
                            $sql1 ="SELECT train_name
                                    FROM train_list
                                    WHERE from_dest='$fromdestination' and to_dest='$todestination'";
                            $sqldata = mysqli_query($con, $sql1) or die('error getting data');

                    }
                        ?>
                         <select name="list" class="custom-select">
                            <?php 
                            
                            while($row = mysqli_fetch_array($sqldata)) { ?> 
                            <option value="<?php echo $row['train_name'];?>"> <?php echo $row['train_name'];?></option>
                            <?php }  ?>
                               
                         </select>
                        
                 
                 </div>

                 <div class="personal" id="personal">
                     <table class="table" border="2">
                         <h4 class="heading">Personal Details</h4>
                         <tr class="text-white">
                             <th width="60"> Sr.No</th>
                             <th>Name</th>
                             <th width="120">Gender</th>
                             <th width="90">Age</th>
                             <th>Choice if any</th>
                             
                         </tr>


                         <tr class="text-white">
                             <td>1</td>
                             <td><input type="text" name="passenger_1" style="color:white; border:none; outline:none; background:transparent;"></td>
                             <td><input type="text" name="gender_1" style="color:white; border:none; outline:none; background:transparent;"></td>
                             <td><input type="text" name="age_1" style="color:white; border:none; outline:none; background:transparent;"></td>
                             <td rowspan="3"><input type="radio" value="veg" id="veg" name="food">Veg/<input type="radio" value="nonveg" id="nonveg" name="food">Non-Veg</td>
                         </tr>


                        <tr class="text-white">
                            <td>2</td>
                            <td><input type="text" name="passenger_2" style="color:white; border:none; outline:none; background:transparent;"></td>
                            <td><input type="text" name="gender_2" style="color:white; border:none; outline:none; background:transparent;"></td>
                            <td><input type="text" name="age_2" style="color:white; border:none; outline:none; background:transparent;"></td>
                        </tr>


                        <tr class="text-white">
                            <td>3</td>
                            <td><input type="text" name="passenger_3" style="color:white; border:none; outline:none; background:transparent;"></td>
                            <td><input type="text" name="gender_3" style="color:white; border:none; outline:none; background:transparent;"></td>
                            <td><input type="text" name="age_3" style="color:white; border:none; outline:none; background:transparent;"></td>
                            
                        </tr>

                     </table>
                 </div>

                

                <div class="input-group">
                
                <input type="submit" name="submit" class="btn-primary train1" value="Book Tickets"/>
                </div>
            </div>  
        </form>
    </body>
</html>