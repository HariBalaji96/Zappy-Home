<?php
  session_start();
  if(!isset($_SESSION['wphone']))
  {
    header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
  else{
    $phone=$_SESSION['wphone'];
    $con=new mysqli("localhost","root","","project");
    $sql="SELECT * FROM userdetails WHERE phone='$phone'";
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
          <li><a href="profile.php?msg=<?php echo $phone?>" class="l">Profile</a></li>
          <li><a href="allocated.php?msg=<?php echo $phone?>" class="l">Allocated Services</a></li>
          <li><a href="../logout.php" class="l">Logout</a></li>
        </ul>
        <div class="menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </div>
    <div class="details-container"></div>
    <script src="../app.js"></script>
  </body>
</html>
