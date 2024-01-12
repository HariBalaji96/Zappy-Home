<?php
  session_start();
  if(!isset($_SESSION['phone']))
  {
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
    <title>Zappy Home</title>
    <link rel="website icon" type="png" href="../Logo/1.png">
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <div class="title">
          <span id="home">About Us</span>
          
        </div>
        <span class="back-btn"><a href="dashboard.php">Back</a></span>
      </nav>
    </div>
    <div class="details-container" style="min-height:80vh">
    <div style="background:rgb(66, 57, 57); width:60%; margin:10vh auto; border-radius:20px">
    <h1 style="text-align:center; color:white;">About Us</h1>
      <p style="text-align:center; color:white;font-size:20px">The Zappy Home is a platform designed to connect service seekers with service providers for various household tasks. The platform enables service seekers to easily search and book services such as cleaning, plumbing, AC repairs, painting and more. The Zappy Home provides a user-friendly interface that allows service seekers to search for services and book the services easily. The rating system allows service seekers to rate service providers, ensuring a high level of quality and transparency. The employee dashboard allows the service providers to manage profile and view service allocation. The admin dashboard allows the platform owner to manage the services, service providers and users. The application is built using modern technologies such as HTML, CSS, PHP, JavaScript and MySQL, providing a scalable and efficient solution for the home services industry. </p>
      <br>
      <p style="text-align:center; color:white;font-size:20px;font-weight:bolder;font-style:italic;">20X016 - B. HARI ANAND</p>
      <br>
      <p style="text-align:center; color:white;font-size:20px;font-weight:bolder;font-style:italic;">20X041 - B. SITHIK KUMAR</p>
    </div>
</div>
      </div>

      
      
      
      
      <div class="footer-container">
        <div class="footer">
          <div class="socialmedia">
            <a
              href="https://www.instagram.com/golden_psgtech/"
              class="media"
              target="_blank"
              ><img src="../Logo/instagram.png" alt="instagram" class="social-img"
            /></a>
            <a href="mailto: 20x016@psgtech.ac.in" class="media" target="_blank"
              ><img src="../Logo/gmail.png" alt="gmail" class="social-img"
            /></a>
            
            <a
              href="https://www.linkedin.com/in/hari-balaji-938327255/"
              class="media"
              target="_blank"
              ><img src="../Logo/linkedin.png" alt="linkedin" class="social-img"
            /></a>
          </div>
        </div>
      </div>
    </div>
    <script>


    </script>
  </body>
</html>
