<?php
  session_start();
  if(isset($_SESSION['phone'])){
    $phone=$_SESSION['phone'];
  }
  else{
    header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="website icon" type="png" href="../Logo/1.png">
    <title>Services</title>
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='dashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Our Services</span>
        <span class="back-btn"><a href="dashboard.php">Back</a></span>
      </nav>
    </div>
    <div class="details-container">
      <div class="service-container">
        <div class="services" onclick="location.href='subservices.php?msg=Home Painting';">
          <div class="service-details">
          <img src="../Logo/painting.png" alt="Painting Logo">
          <h1>Home Painting</h1>
        </div>
        </div>
        <div class="services" onclick="location.href='subservices.php?msg=Plumbing';">
        <div class="service-details">
        <img src="../Logo/plumber.png" alt="Plumber Logo">
        <h1>Plumbing</h1>
        </div>
        </div>
        <div class="services" onclick="location.href='subservices.php?msg=AC Repair';">
        <div class="service-details">
        <img src="../Logo/ac.png" alt="AC Logo">
        <h1>AC Repair</h1>
        </div>
        </div>
        <div class="services" onclick="location.href='subservices.php?msg=Home Cleaning';">
        <div class="service-details">
        <img src="../Logo/cleaning.png" alt="Cleaning Logo">
        <h1>Home Cleaning</h1>
        </div>
        </div>
        <div class="services" onclick="location.href='subservices.php?msg=Carpentering';">
        <div class="service-details">
        <img src="../Logo/carpenter.png" alt="Carpenter Logo">
        <h1>Carpentering</h1>
        </div>
        </div>
        <div class="services" onclick="location.href='subservices.php?msg=Salon';">
        <div class="service-details">
        <img src="../Logo/salon.png" alt="Salon Logo">
        <h1>Home Saloon</h1>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
