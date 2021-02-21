<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <Title>HAPPY JOURNEY RAILWAYS</Title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="icon" href="trainicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
  <body>

  <?php

    include 'dbcon.php';

    if(isset($_POST['register'])){

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $email_query = "SELECT * FROM registration WHERE email='$email'";
    $query = mysqli_query($con,$email_query);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        echo "Email Already Exists";
    }else{
        if($password === $cpassword){
        $insertquery = "INSERT INTO registration (name, email, contact, gender, age, password) 
                        VALUES ('$fname','$email','$contact','$gender','$age','$pass')";
        $iquery = mysqli_query($con,$insertquery);

            if($con){
                ?>
                    <script>
                         alert("Connection Successful");
                         location.replace("login1.php");
                    </script>
                <?php
            }else{
                 ?>
                    <script>
                         alert("NO Connection");
                    </script>
                <?php
            }

            }else{
                echo "Password does not match";
            }

    }
}

?>

      <header>
        <nav>
           <h1 id="logo">HAPPY JOURNEY RAILWAYS</h1>
           <ul class="nav-links ">
           
                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php">About</a></li>
                    <li><a href="home.php">Contact</a></li>
                    <li><a href="login1.php">Login</a></li>
                    
                </ul>
            <div class="burger">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
            </div>
        </nav>
     </header>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
        method="POST" >
            <div class="Registration-form">
            <label>Name</label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Name" required/>
            <label>Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required/>
            <label>Contact Number</label>
            <input
            type="number"
            name="contact"
            id="contact"
            class="form-control"
            placeholder="Contact"
            minlength="10"
            maxlength="10"
            required
            />
        
        <label>Gender</label>
          <select name="gender" id="gender" class="custom-select" required>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="other">Other</option>
          </select>
        
        <label>Age</label>
          <input
            type="number"
            name="age"
            id="age"
            class="form-control"
            placeholder="Age"
            minlength="2"
            maxlength="2"
            required
          />
        <label>Password</label>
          <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Create Password"
            minlength="6"
            required
          />
          <label>Confirm Password</label>
          <input
            type="password"
            name="cpassword"
            class="form-control"
            placeholder="Confirm Password"
            minlength="6"
            required
          />

          
          <a href="form.php"><button type="submit" value="submit" name="register" id="submit" class="btn-primary Create" >Create Account</button></a>
          <p class="message">
            Already a member? <a href= "login1.php">Log In</a>
          </p>
      </div>
      
    </form>
  </body>
</html>