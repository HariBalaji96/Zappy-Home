<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="website icon" type="png" href="Logo/1.png">
    <link rel="stylesheet" href="style.css" />
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
          <img src="Logo/1.png" alt="logo" />
        </div>
        <span class="name">Welcome to Zappy Home</span>
      </nav>
    </div>
<div class="login-container">
<div class="register-box">
    <h2 class="home-title" style="color: rgb(66, 57, 57);">Employee Registration</h2>
    <form class="input-register" form="onlyemployee.php" method="post">
      <div class="separate">
      <div class="register-div"><label for="t15">Resume (In .pdf / .doc up to 2Mb)</label><input type="file" name="resume" accept=".PDF,.pdf" class="register-field" id="t15" style="width: 220px;"  required /></div>
      <div class="register-div"><label for="t11">Photo (In .jpg / .png / .jpeg up to 1Mb)</label><input type="file" accept=".JPG,.PNG,.JPEG,.jpg,.png,.jpeg" name="photo" class="register-field" id="t11" style="width: 220px;"   required /></div>
    <div class="register-div"><label for="t12">Date of Birth</label><input type="date" name="dob" class="register-field" id="t12" style="width:220px;" required /></div>
    <div class="register-div"><label for="t1">Contact No</label><input type="tel" name="phone" class="register-field" id="t1" placeholder="Phone No" pattern="[0-9]{10}" size="25" required /></div>
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
  <div class="register-div"><label for="t13">Role</label><select name="position" class="register-field" id="t13" style="width: 220px;" required>
          <option>-- Select --</option>
          <option value="Home Painting">Painter</option>
          <option value="AC Repair">AC Technician</option>
          <option value="Home Cleaning">Cleaner</option>
          <option value="Salon">Hairdresser</option>
          <option value="Carpentering">Carpenters</option>
          <option value="Plumbing">Plumber</option>
    </select>
    </div>
    <div class="register-div"><label for="t14">Experience (In Years)</label><input type="number" name="experience" class="register-field" id="t14" placeholder="Experience" style="width: 220px;" pattern="[0-9]{2}" required /></div>
    <div class="register-div"><label for="t16">Aadhar Number</label><input type="tel" name="aadhar" class="register-field" id="t16" placeholder="Aadhar Number" size="25" pattern="[0-9]{12}" required /></div>
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
      $mail=$_POST['mail'];
      $gender=$_POST['gender'];
      $address1=$_POST['address1'];
      $address2=$_POST['address2'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $country=$_POST['country'];
      $zip=$_POST['zip'];
      $dob=$_POST['dob'];
      $posting=$_POST['position'];
      $experience=$_POST['experience'];
      $img=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
      $res=$phone.".pdf";
      $aadhar=$_POST['aadhar'];
      $con=new mysqli("localhost","root","","project");
      $rs1=mysqli_query($con,"SELECT * FROM request WHERE contact='$contact'");
      $result=mysqli_num_rows($rs1);
      $rsw=mysqli_query($con,"SELECT * FROM worker WHERE contact='$contact'");
      $result1=mysqli_num_rows($rsw);
        if($result!=0)
        {
          echo "<script>document.getElementById('alert-msg').innerHTML='Your Already Registered'</script>";
        }
        elseif($result1!=0)
        {
          echo "<script>document.getElementById('alert-msg').innerHTML='Your Already an Employee'</script>";
        }
        else{
          $sql="INSERT INTO request (name,contact,password,dob,mail,gender,posting,experience,photo,resume,aadharno,address1,address2,city,state,country,zipcode) VALUES('$name','$contact','$pass','$dob','$mail','$gender','$posting','$experience','$img','$res','$aadhar','$address1','$address2','$city','$state','$country','$zip')";
          move_uploaded_file($_FILES['resume']['tmp_name'],"../Admin/Resume/".$res);
          $rs2=mysqli_query($con,$sql);
          if($rs2)
          {
            echo "<script>document.getElementById('alert-msg').innerHTML='Registered Successfully'</script>";
          }
          else{
            echo "<script>document.getElementById('alert-msg').innerHTML='Registration is not Successfully'</script>";
          }
        }
      }
    ?>
  </body>
</html>
