<?php
  session_start();
?>  

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HAPPY JOURNEY RAILWAYS</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="icon" href="trainicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    </head>

    <body>

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
        <?php 
                    if(isset($_SESSION["error"])){
                        echo '<div class="alert alert-dismissable alert-success">
                            <button data-dismiss="alert" class="close" type="button">x</button>
                            <p>'. $_SESSION["error"] .'</p></div>';
                    }
                    ?>
        <div class="profile">
            <h4>Welcome to the booking form <?php echo $_SESSION['name'] ; ?>!</h4>
        </div>
        <form method="post" action="trainlist.php">
            
            <div class="booking-form">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['name']; ?>" disabled/>
            <label>From</label>
            <input type="text" class="form-control" placeholder="City" name="fromdest">
            <label>To</label>
            <input type="text" class="form-control" placeholder="City" name="todest">
            
            

                <div class="input-group">
                    <button type="submit" class="btn-primary train" name="form" id="submit">Proceed to Booking</button>
                    
                </div>
            </div>
        </form>
    
    </body>
    <?php 
  unset($_SESSION['error']);
?>
</html>
