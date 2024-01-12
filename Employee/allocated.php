<?php
  session_start();
  if(!isset($_SESSION['wphone']))
  {
    header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
  else{
    $phone=$_SESSION['wphone'];
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
    <title>Allocated Service</title>
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='empdashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Allocated Service</span>
        <span class="back-btn"><a href="empdashboard.php">Back</a></span>
      </nav>
    </div>
    <div class="details-container">
    <div class="status-container">
      <?php
        $con=new mysqli("localhost","root","","project");
        $sql="SELECT * FROM service_request WHERE worker_phone='$phone' AND work_status IS NULL";
        $result=mysqli_query($con,$sql);
        $numrow=mysqli_num_rows($result);
        if($numrow!=0)
        {
          while($row=mysqli_fetch_assoc($result)){
          $check=$row['otp'];
          $serviceid=$row['service_id'];
          $user_phone=$row['user_phone'];
          echo "<div class='status-details'>";
          $sql1="SELECT * FROM services WHERE id='$serviceid'";
          $row1=mysqli_fetch_assoc(mysqli_query($con,$sql1));
          $cost=$row1['price'];
          echo "<img src='data:image;base64,".base64_encode($row1['logo'])."'width='100px'> ";
          echo "<h1>".$row1['name']."</h1>";
          echo "<p> Address :<br>".$row['address1'].",<br>".$row['address2'].",<br>".$row['city']." - ".$row['zip']."<br>".$row['state']."</p>";
          $sql2="SELECT * FROM userdetails WHERE phone='$user_phone'";
          $row2=mysqli_fetch_assoc(mysqli_query($con,$sql2));
          echo "<p> Client Name : ".$row2['name']." (".$row2['gender'].") <br> Contact Number : ".$row2['phone']."</p>";
          echo "<form class='input-register' id='hide' method='post' enctype='multipart/form-data'>";
          echo "<div class='register-div'><label for='t6'>OTP</label><input type='text' name='otp' class='register-field' id='t6' placeholder='Enter OTP' size='10' required /></div>";
          echo "<p id='alert-msg' style='text-align:center;color: red; font-size:18px; font-weight:bold;'></p>";
          echo "<button type='submit' name='submit' class='accept-btn'>Complete Work</button>";
          echo "</form>";
          echo "</div>";
          } 
          if(isset($_POST['submit'])){
            $otp=$_POST['otp'];
            if($otp==$check){
              $sql="UPDATE service_request SET work_status='Completed' WHERE worker_phone=$phone";
              $rs2=mysqli_query($con,$sql);
              echo "<script>document.getElementById('hide').style.display = 'none'</script>";
            }
            else{
              echo "<script>document.getElementById('alert-msg').innerHTML='Wrong OTP !'</script>";
            }   
    }

      }
      else{
        echo "<span class='name' style='color:#000'>No Services were Allocated</span>";
      }

?>
    </div>
    </div>
  </body>
</html>
