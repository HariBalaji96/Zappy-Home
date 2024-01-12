<?php
    session_start();
    if(!isset($_SESSION['wphone']))
    {
      header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
  else{
    $phone=$_SESSION['wphone'];
    $con=new mysqli("localhost","root","","project");
    $sql="SELECT * FROM worker WHERE contact='$phone'";
    $rs=mysqli_fetch_assoc(mysqli_query($con,$sql));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="website icon" type="png" href="../Logo/1.png">
    <title>Profile</title>
</head>
<body>
    <div class="login-container">
        <div class="profile-container">
            <div class="profile-photo">
                <?php
                echo "<img src='data:image;base64,".base64_encode($rs['photo'])."'width='200px'> ";
                if ($rs['rating']!=NULL)
                {
                  echo "<br><p style='text-align:center'><b>Ratings: </b>".$rs['rating']."⭐</p>";
                }  
            echo "</div>";
            echo "<div class='profile-details'>";
                echo "<b>Name: </b>".$rs['name'];
                echo "<br><b>Contact No: </b>".$rs['contact'];
                echo "<br><b>Gender: </b>".$rs['gender'];
                echo "<br><b>Date Of Birth: </b>".$rs['dob'];
                echo "<br><b>E-mail: </b>".$rs['mail'];
                echo "<br><b>Role: </b>".$rs['posting'];
                echo "<br><b>Experience: </b>".$rs['experience'];
                echo "<br><b>Address:</b><br>".$rs['address1'].",<br>".$rs['address2'].",<br>".$rs['city']." - ".$rs['zipcode'].".";
                echo "<br><br><a href="."update.php?msg=".$rs['contact']."><button class='accept-btn'>Edit Profile</button></a>";
            echo "</div>";
            ?>
        </div>
        <span class="back-btn" style="margin:0 auto;"><a href="empdashboard.php" style="color:rgb(66, 57, 57); font-size:28px; border: 2px solid rgb(66, 57, 57);">Back</a></span>
    </div>
</body>
</html>