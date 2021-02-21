<?php

session_start();

if(!isset($_SESSION['name'])){  
  header('login1.php');
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HAPPY JOURNEY RAILWAYS</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" href="trainicon.png" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap"
      rel="stylesheet"
    />
  </head>

  <body class="homebody">
    <!--navbar-->
    <header>
      <nav>
        <h1 id="logo">HAPPY JOURNEY RAILWAYS</h1>
        <ul class="nav-links ">
          <li><a href="#slider">Home</a></li>    
          <li><a href="#about">About</a></li>
          <li><a href="#contact1">Contact</a></li>
          <li><a href="register.php">Register</a></li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </header>
    <!--slider-->
    <div id="slider">
      <div id="headerslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#headerslider" data-slide-to="0" class="active"></li>
          <li data-target="#headerslider" data-slide-to="1"></li>
          <li data-target="#headerslider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="benches-on-train-station-1444108.jpg"
              class="d-block img-fluid"
            />
            <div class="carousel-caption">
              <h5>Making Your Journey Easier</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="red-train-on-tracks-with-green-grass-beside-under-bright-sky-159148.jpg"
              class="d-block img-fluid"
            />
            <div class="carousel-caption">
              <h5>Moving Successfully Into The Future</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="car-chair-comfort-commuting-428614.jpg"
              class="d-block img-fluid"
            />
            <div class="carousel-caption">
              <h5>Comfortable for our travelers</h5>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#headerslider"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#headerslider"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!--About-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h2>About us</h2>
            <div class="about-content">
              Indian trains are always crowded up to the neck. It is essential
              to pre-book tickets at least 3-4 months prior to your journey. Our
              system allows you to book or cancel tickets according to your
              choice. You can book tickets for the trains that have seats
              available. For this the you must enter the date and the
              destination you want to travel to. If the booking is confirmed a
              corresponding ticket id is generated which is stored along with
              the other details of the passengers. The ticket once booked can be
              cancelled any time for this the you must provide your reservation
              booking id.
            </div>
          </div>
          <div class="col-md-3">
            <p></p>
          </div>
        </div>
      </div>
    </section>
    <!--get in touch-->
    <section id="contact1">
      <div class="container">
        <h2>Contact Us</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="follow">
              <b>Contact: </b>M: 9930950101, A:9819420748, V: 9619995427
            </div>
          </div>
          <div class="col-md-6">
            <div class="follow">
              <b>Email: </b>M: mudralimbasia@gmail.com, A: anvit.d.m@gmail.com,
              V: vedantjpatil@gmail.com
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="js\smooth-scroll.js"></script>
    <script>
	var scroll = new SmoothScroll('a[href*="#"]');
</script>
  </body>
</html>
