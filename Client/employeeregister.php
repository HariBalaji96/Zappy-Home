<?php
  session_start();
  if(isset($_SESSION['phone'])){
    $phone=$_SESSION['phone'];
    $con=new mysqli("localhost","root","","project");
    $sql="SELECT * FROM userdetails WHERE phone='$phone'";
    $rs=mysqli_fetch_assoc(mysqli_query($con,$sql));
  }
  else{
    header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
?>

<script>
        function blurevent(){
        var p1 = document.getElementById('t3').value;
        var p2 = "<?php echo $rs['password']; ?>";
        if(p1!=p2)
        {
          var Rbtn = document.getElementById('Rbtn').disabled=true;
          document.getElementById('correction').innerHTML="Password Incorrect";
        }
        else{
          var Rbtn = document.getElementById('Rbtn').disabled=false;
          document.getElementById('correction').innerHTML=""
        }
      }
        function fileValidation() {
			  var fileInput = document.getElementById('t7');
			
			  var filePath = fileInput.value;
			  var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
			  if (!allowedExtensions.exec(filePath)) {
				    alert('Invalid file type');
				    fileInput.value = '';
				    return false;
			  }
      const file = fileInput.files[0];
      const fileSize = file.size;
      if (fileSize > 1024 * 1024) {
      alert('File size must be less than 1 MB');
      fileInput.value = ''; 
      return false;
    }
      }

      function fileValidation1() {
            var fileInput = document.getElementById('t8');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.doc|\.docx|\.odt|\.pdf|\.tex|\.txt|\.rtf|\.wps|\.wks|\.wpd)$/i; 
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            }
            const file = fileInput.files[0];
            const fileSize = file.size;
            if (fileSize > 2 * 1024 * 1024) {
            alert('File size must be less than 2 MB');
            fileInput.value = ''; 
            return false;
          }
        }
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="website icon" type="png" href="../Logo/1.png">
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='dashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Welcome to Zappy Home</span>
        <span class="back-btn"><a href="ouremployees.php">Back</a></span>
      </nav>
    </div>
<div class="login-container">
<div class="register-box">
    <h2 class="home-title" style="color: rgb(66, 57, 57);">Employee Register</h2>
    <form class="input-register" method="post" enctype="multipart/form-data">
    <div class="register-div"><label for="t7">Photo (In .jpg / .png / .jpeg up to 1Mb)</label><input type="file" accept=".JPG,.PNG,.JPEG,.jpg,.png,.jpeg" name="image" class="register-field" id="t7" style="width: 220px;"  onchange="return fileValidation()" required /></div>
    <div class="register-div"><label for="t3">User Password</label><input type="password" onblur="blurevent()" name="pass" class="register-field" id="t3" placeholder="Password" size="25" required />
    <span id="correction" style="font-weight:lighter; color:red; margin:0; padding:0;"></span>
    </div>
    <div class="register-div"><label for="t4">Date of Birth</label><input type="date" name="dob" class="register-field" id="t4" style="width:220px;" required /></div>
  <div class="register-div"><label for="tr">Role</label><select name="position" class="register-field" id="tr" style="width: 220px;" required>
          <option>-- Select --</option>
          <option value="Home Painting">Painter</option>
          <option value="AC Repair">AC Technician</option>
          <option value="Home Cleaning">Cleaner</option>
          <option value="Salon">Hairdresser</option>
          <option value="Carpentering">Carpenters</option>
          <option value="Plumbing">Plumber</option>
    </select>
    </div>
    <div class="register-div"><label for="t6">Experience (In Years)</label><input type="number" name="experience" class="register-field" id="t6" placeholder="Experience" style="width: 220px;" pattern="[0-9]{2}" required /></div>
    <div class="register-div"><label for="t8">Resume (In .pdf / .doc up to 2Mb)</label><input type="file" name="resume" accept=".PDF,.pdf" class="register-field" id="t8" style="width: 220px;" onchange="return fileValidation1()" required /></div>
    <div class="register-div"><label for="t9">Aadhar Number</label><input type="tel" name="aadhar" class="register-field" id="t9" placeholder="Aadhar Number" size="25" pattern="[0-9]{12}" required /></div>
    <button type="submit" id="Rbtn" name="submit" class="submit-btn" style="width: 120px; margin-bottom: 0%;">Register</button>
    <p id="alert-msg" style="text-align:center;color: rgb(66, 57, 57); font-size:18px; font-weight:bold;"></p>
  </form>

    <?php
    if(isset($_POST['submit']))
    {
      $contact=$phone;
      $name=$rs['name'];
      $pass=$_POST['pass'];
      $dob=$_POST['dob'];
      $mail=$rs['email'];
      $gender=$rs['gender'];
      $posting=$_POST['position'];
      $experience=$_POST['experience'];
      $img=addslashes(file_get_contents($_FILES['image']['tmp_name']));
      $res=$contact.".pdf";
      $aadhar=$_POST['aadhar'];
      $address1=$rs['address1'];
      $address2=$rs['address2'];
      $city=$rs['city'];
      $state=$rs['state'];
      $country=$rs['country'];
      $zip=$rs['zipcode'];
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
