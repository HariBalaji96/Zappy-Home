<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="website icon" type="png" href="../Logo/1.png">
    <link rel="stylesheet" href="../style.css" />
    <script>
      function blurevent(){
        var p1 = document.getElementById('t3').value;
        var p2 = document.getElementById('t4').value;
        if(p1!=p2)
        {
          var Rbtn = document.getElementById('Rbtn').disabled=true;
          document.getElementById('correction').innerHTML="Password Mismatch"
        }
        else{
          var Rbtn = document.getElementById('Rbtn').disabled=false;
          document.getElementById('correction').innerHTML=""
        }
      }
    </script>
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Welcome to Zappy Home</span>
        <span class="back-btn"><a href="../index.php">Back</a></span>
      </nav>
    </div>
<div class="login-container">
<div class="register-box">
    <h2 class="home-title" style="color: rgb(66, 57, 57);">Register</h2>
    <form class="input-register" method="post">
      <div class="separate">
    <div class="register-div"><label for="t1">Phone No</label><input type="tel" name="phone" class="register-field" id="t1" placeholder="Phone No" pattern="[0-9]{10}" size="25" required /></div>
    <div class="register-div"><label for="t2">Name</label><input type="text" name="name" class="register-field" id="t2" placeholder="Name" size="25" required /></div>
    <div class="register-div"><label for="t3">Create-Password</label><input type="password"  name="pass" class="register-field" id="t3" placeholder="Create-Password" size="25" required />
    <span id="correction" style="font-weight:lighter; color:red; margin:0; padding:0;"></span>
    </div>
    <div class="register-div"><label for="t4">Confirm-Password</label><input type="password" onblur="blurevent()" name="cpass" class="register-field" id="t4" placeholder="Confirm-Password" size="25" required /></div>
    <div class="register-div"><label for="t5">Email</label><input type="email" name="mail" class="register-field" id="t5" placeholder="Email" size="25" required /></div>
    <div class="register-div"><label for="td">Gender</label><select name="gender" class="register-field" id="td" style="width: 220px;" required>
      <option selected>--Select--</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Others">Others</option>
    </select>
  </div>
  </div>
  <div class="separate">
    <div class="register-div"><label for="t6">Address</label><input type="text" name="address1" class="register-field" id="t6" placeholder="Street Address" size="25" required /></div>
    <div class="register-div"><input type="text" name="address2" class="register-field" placeholder="Street Address line 2" size="25" required /></div>
    <div class="register-div"><label for="t7">City</label><select name="city" class="register-field" id="t7" style="width: 220px;" required>
      <option value="Coimbatore">Coimbatore</option>
    </select>
  </div>
  <div class="register-div"><label for="t8">State</label><select name="state" class="register-field" id="t8" style="width: 220px;" required>
      <option value="Tamil Nadu">Tamil Nadu</option>
    </select>
  </div>
  <div class="register-div"><label for="t9">Country</label><select name="country" class="register-field" id="t9" style="width: 220px;" required>
      <option value="India">India</option>
    </select>
  </div>
    <div class="register-div"><label for="t0">Zip Code</label><input type="text" name="zip" class="register-field" id="t0" placeholder="Zip Code" pattern="[0-9]{6}" size="25" required /></div>
  </div>
    <button type="submit" id="Rbtn" name="submit" class="submit-btn" style="width: 120px; margin-bottom: 0%;">Register</button>
    <p id="alert-msg" style="text-align:center;color: rgb(66, 57, 57); font-size:18px; font-weight:bold;"></p>
  </form>
    <?php
    if(isset($_POST['submit']))
    {
      $phone=$_POST['phone'];
      $name=$_POST['name'];
      $pass=$_POST['pass'];
      $cpass=$_POST['cpass'];
      $mail=$_POST['mail'];
      $gender=$_POST['gender'];
      $address1=$_POST['address1'];
      $address2=$_POST['address2'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $country=$_POST['country'];
      $zip=$_POST['zip'];
      $con=new mysqli("localhost","root","","project");
      $rs1=mysqli_query($con,"SELECT * FROM userdetails WHERE phone='$phone'");
      $result=mysqli_num_rows($rs1);
        if($result!=0)
        {
          echo "<script>document.getElementById('alert-msg').innerHTML='Your Already an User'</script>";
          echo "<div class='footer-content' style='margin:3vh auto'>";
          echo "<a href='../index.php'><button class='accept-btn' style='font-weight:bold'>Login Here !</button></a></div>";
        }
        else{
          $sql="INSERT INTO userdetails (phone,name,password,email,gender,address1,address2,city,state,country,zipcode) VALUES('$phone','$name','$pass','$mail','$gender','$address1','$address2','$city','$state','$country','$zip')";
          $rs2=mysqli_query($con,$sql);
          echo "<script>document.getElementById('alert-msg').innerHTML='Registered Successfully'</script>";
          echo "<div class='footer-content'>";
          echo "<a href='../index.php'><button class='accept-btn' style='font-weight:bold'>Login</button></a></div>";
        }
      }
    ?>
    </div>
  </body>
</html>
