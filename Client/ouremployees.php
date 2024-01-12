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
    <title>Our Employees</title>
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='dashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Our Employees</span>
        <span class="back-btn"><a href="dashboard.php">Back</a></span>
      </nav>
    </div>
    <div class="details-container">
    <?php
      $con=new mysqli("localhost","root","","project");
      $sql="SELECT * FROM worker";
      $result=mysqli_query($con,$sql);
      $numrow=mysqli_num_rows($result);
      if($numrow!=0)
      {
        while($row=mysqli_fetch_assoc($result))
        {  
          echo "<div class='worker-details'>";
          echo "<div class='worker-photo'>";
          echo "<img src='data:image;base64,".base64_encode($row['photo'])."'width='120px'> ";
          echo "</div>";
          echo "<div class='worker-info'>";
          echo "<b>Name:</b> ".$row['name'];
          echo "<br><b>Date Of Birth:</b> ".$row['dob'];
          echo "<br><b>Gender:</b> ".$row['gender'];
          echo "<br><b>Role:</b> ".$row['posting'];
          echo "<br><b>Experience:</b> ".$row['experience'];
          if ($row['rating']!=NULL){
            echo "<br><b>Ratings:</b> ".$row['rating']."⭐";
          }
          echo "</div>";
          echo "</div>";
        }
      }
      ?>
    </div>
    <div class="Employee-footer">
      <div class="footer-content" id="test">
        <span>Register has Employee</span>
        <button
          onclick="window.location='employeeregister.php';"
          id="Rbtn"
          class="submit-btn"
          style="width: 120px"
        >
          Register
        </button>
      </div>
    </div>
    <script></script>
  </body>
</html>
