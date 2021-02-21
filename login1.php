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

      if(isset($_POST['login'])){

          $email = $_POST['email'];
          $password = $_POST['password'];

          $email_search = " SELECT * from `registration` WHERE email='$email'";
          $query = mysqli_query($con, $email_search);

          $email_count = mysqli_num_rows($query);

          if($email_count){
          $email_pass = mysqli_fetch_assoc($query);

          $db_pass = $email_pass['password'];

          $_SESSION['name'] = $email_pass['name']; 
          $_SESSION['id'] = $email_pass['id']; 
          
          
          $pass_decode = password_verify($password, $db_pass);

          if($pass_decode)
          {
              echo "Login Successful";
              $_SESSION['id'] = $email_pass['id'];
              $_SESSION['email'] = $email_pass['email'];
              $sql = "INSERT INTO `login` (`email`,`password`) 
                      VALUES ('$email','$password')";
              
                if ($con->query($sql) == TRUE)
                 {
                    
                    ?>
                    <script>
                     location.replace("form.php");
                    </script>
                    <?php
                 }
                 else 
                 {
                    echo "Error: " . $sql . "<br>" . $con->error;
                 } 

          }
          else 
          {
            echo"Password Incorrect";
          }
    }else 
      {
        echo "Invalid Email";
      }
}

?>
    <div class="bg-image"></div>
    <header>
      <nav>
          <h1 id="logo">HAPPY JOURNEY RAILWAYS</h1>
          <ul class="nav-links ">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php">About</a></li>
                    <li><a href="home.php">Contact</a></li>
                    <li><a href="register.php">Register</a></li>
                    
                </ul>
          <div class="burger">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
          </div>
      </nav>
  </header>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
      <div class="Login-form">
        <label>Email</label>
        <input type="text" name= "email" class="form-control" placeholder="Email" />
        <label>Password</label>
        <input
          type="password"
          name="password"
          class="form-control"
          placeholder="Password"
          minlength="6"
        />
        <button type="submit" value="submit" name="login" class="btn-primary Login">Login</button>
        <p class="message">
          Don't have an account? <a href="register.php">Register</a>
        </p>
      </div>
    </form>
  </body>
</html>
