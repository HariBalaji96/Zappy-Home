<?php
  session_start();
  if(!isset($_SESSION['phone']))
  {
    header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
  else{
    $phone=$_SESSION['phone'];
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
    <meta http-equiv="refresh">
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
          <span id="home">Welcome <?php echo $rs['name']; ?></span>
        </div>
        <ul class="links">
          <li><a href="#home" class="l">Home</a></li>
          <li><a href="about.php" class="l">About</a></li>
          <li><a href="ouremployees.php" class="l">Our Employees</a></li>
          <li><a href="services.php" class="l">Services</a></li>
          <li><a href="../logout.php" class="l">Logout</a></li>
        </ul>
        <div class="menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </div>
    <div class="body-container" style="min-height:80vh">
      <?php
        $con=new mysqli("localhost","root","","project");
        $sql="SELECT * FROM service_request WHERE user_phone='$phone'";
        $result=mysqli_query($con,$sql);
        $numrow=mysqli_num_rows($result);
        if($numrow!=0)
        {
          echo "<div class='status-container'>";
          echo "<h1 style='color:rgb(66, 57, 57); text-align:center'>Status</h1>";
        while($row=mysqli_fetch_assoc($result))
        {
          $serviceid=$row['service_id'];
          $worker_phone=$row['worker_phone'];
          echo "<div class='status-details'>";
          $sql1="SELECT * FROM services WHERE id='$serviceid'";
          $row1=mysqli_fetch_assoc(mysqli_query($con,$sql1));

          echo "<img src='data:image;base64,".base64_encode($row1['logo'])."'width='100px'> ";
          echo "<h1>".$row1['name']."</h1>";
          echo "<p> Address :<br>".$row['address1'].",<br>".$row['address2'].",<br>".$row['city']." - ".$row['zip']."<br>".$row['state']."</p>";
          $sql2="SELECT * FROM worker WHERE contact='$worker_phone'";
          $row2=mysqli_fetch_assoc(mysqli_query($con,$sql2));
          echo "<p> Worker Name : ".$row2['name']." (".$row2['gender'].") ".$row2['rating']."⭐</p>";
          echo "<p>OTP : ".$row['otp']."</p>";
          if ($row['work_status']==''){
            echo "Status : Worker Allocated<br>";
            if($row['mode'] == "Cash on Delivery"){
              echo "Payment Status : Cash on Delivery</p>";
            }
            else{
              echo "Payment Status : Paid</p>";
            }
          }
          else{
            echo "Status : ".$row['work_status']."</p>";
            if ($row['work_status']=='Completed' && $row['rating']==''){
              echo "<form method='post' id='".$row['id']."'>";
              echo "<label>Service No : </label><select name='id' style='background:transparent; color:white'>";
              echo "<option value='".$row['id']."' selected>".$row['id']."</option>";
              echo "</select><br><br>";
              echo "<label for='tr'>Rating</label><select name='star' class='register-field' id='tr' style='width: 100px; margin:0' required>";
              echo "<option value='1'>Very Poor</option>";
              echo "<option value='2'>Poor</option>";
              echo "<option value='3'>Good</option>";
              echo "<option value='4'>Very Good</option>";
              echo "<option value='5' selected>Excellent</option>";
              echo "</select>";
              echo "<input type= 'submit' name='rating' value='Rate' style ='margin-top:10px' class='accept-btn'>";
              echo "</form>";
            }
            if(isset($_POST['rating'])){
              $rating=$_POST['star'];
              $code=$_POST['id'];
              $sql2="UPDATE service_request SET rating='$rating' WHERE id=$code";
              $row2=mysqli_query($con,$sql2);
              echo "<script>";
              echo "document.getElementById('".$code."').style.display = 'none'";
              echo "</script>";
              $sql="SELECT contact FROM worker";
              $rs=mysqli_query($con,$sql);
              while($row=mysqli_fetch_assoc($rs)){
                $total=0;
                $worker_contact=$row['contact'];
                $sql1="SELECT rating FROM service_request WHERE worker_phone='$worker_contact' AND rating IS NOT NULL";
                $rs1=mysqli_query($con,$sql1);
                $numrow=mysqli_num_rows($rs1);
                if ($numrow!=0){
                while($row1=mysqli_fetch_assoc($rs1)){
                    $total=$total+$row1['rating'];
                  }
                  $avg=$total/$numrow;
                  $avg=round($avg, 1);
                  $sql3="UPDATE worker SET rating='$avg' WHERE contact='$worker_contact'";
                  $row3=mysqli_query($con,$sql3);
                }
      
              }
            } 
          }
          echo "</div>";
        }
    }
      echo "</div>";
?>
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
    <script src="../app.js"></script>
    <script>


    </script>
  </body>
</html>
