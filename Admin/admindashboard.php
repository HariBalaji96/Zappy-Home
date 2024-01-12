<?php
  session_start();
  if(!isset($_SESSION['user']))
  {
    header("Location: admin.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
  else{
    $user=$_SESSION['user'];
    $con=new mysqli("localhost","root","","project");
    $sql="SELECT * FROM admin WHERE userid='$user'";
    $rs=mysqli_fetch_assoc(mysqli_query($con,$sql));
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
    <title>Dashboard</title>
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <div class="title">
          <span>Welcome <?php echo $rs['name']; ?></span>
        </div>
        <ul class="links">
          <li><a href="userdetails.php" class="l">User Details</a></li>
          <li><a href="workerdetails.php" class="l">Workers</a></li>
          <li><a href="request.php" class="l">Request</a></li>
          <li><a href="menu.php" class="l">Services</a></li>
          <li><a href="logout1.php" class="l">Logout</a></li>
        </ul>
        <div class="menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </div>
    <div class="body-container" style="height:80vh">

    </div>
    <script src="../app.js"></script>
  </body>
</html>
