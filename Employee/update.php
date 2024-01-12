<?php
  session_start();
  if(isset($_SESSION['wphone'])){
    $phone=$_SESSION['wphone'];
    $con=new mysqli("localhost","root","","project");
    $sql="SELECT * FROM worker WHERE contact='$phone'";
    $row=mysqli_fetch_assoc(mysqli_query($con,$sql));
  }
  else{
    header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
?>
<script>
        function fileValidation() {
			  var fileInput = document.getElementById('t0');
			
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
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <title>Update</title>
    <link rel="website icon" type="png" href="../Logo/1.png">
</head>
<body>
<div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='empdashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Update</span>
        <span class="back-btn"><a href="profile.php">Cancel</a></span>
      </nav>
    </div>
    <div class="details-container">
    <form action="update.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="separate" style="margin-bottom:0;">
        <div class="register-div"><label for="t0">Photo</label><input type="file" accept=".JPG,.PNG,.JPEG,.jpg,.png,.jpeg" name="photo" class="register-field" id="t0" onchange="fileValidation()" style="width: 220px;"/></div>
        <div class="register-div"><label for="t1">Name</label><input type="text" name="name" class="register-field" id="t1" placeholder="Name" value="<?php echo $row['name']; ?>" style="width: 220px;" required /></div>
        <div class="register-div"><label for="t3">Email</label><input type="email" name="mail" class="register-field" id="t3" placeholder="Email" size="25" value="<?php echo $row['mail']; ?>" required /></div>
        <div class="register-div"><label for="t4">Gender</label><select name="gender" class="register-field" id="t4" style="width: 220px;" required>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Others">Others</option>
        </select>
        </div>
      </div>
        <div class="separate">
        <div class="register-div"><label for="td">Date of Birth</label><input type="date" name="dob" class="register-field" id="td" value="<?php echo $row['dob']; ?>" style="width:220px;" required /></div>
        <div class="register-div"><label for="t5">Experience (In Years)</label><input type="number" name="experience" class="register-field" id="t5" placeholder="Experience" style="width: 220px;" value="<?php echo $row['experience']; ?>" pattern="[0-9]{2}" required /></div>
        <div class="register-div"><label for="t6">Address</label><input type="text" name="address1" class="register-field" id="t6" placeholder="Street Address"  value="<?php echo $row['address1']; ?>" size="25" required /></div>
        <div class="register-div"><input type="text" name="address2" class="register-field" placeholder="Street Address line 2" size="25"  value="<?php echo $row['address2']; ?>" required /></div>
        <div class="register-div"><label for="t7">City</label><select name="city" class="register-field" id="t7" style="width: 220px;" required>
          <option value="Coimbatore">Coimbatore</option>
          </select>
        </div>
        <div class="register-div"><label for="t10">Zip Code</label><input type="text" name="zip" class="register-field" id="t10" placeholder="Zip Code" pattern="[0-9]{6}" size="25"  value="<?php echo $row['zipcode']; ?>" required /></div>
        </div>
        <button type="submit" name="update" class="submit-btn" style="width: 132px; margin-bottom: 3vh;">Update</button>   
  </form>
  <?php
  if(isset($_POST['update']))
  {
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $gender=$_POST['gender'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $zip=$_POST['zip'];
    $city=$_POST['city'];
    $dob=$_POST['dob'];
    $experience=$_POST['experience'];
    if(($_FILES['photo']['tmp_name'])!=null){
        $img=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $sql2="UPDATE worker SET name ='$name',mail='$mail',gender='$gender',address1='$address1',address2='$address2',photo = '$img',zipcode='$zip',experience='$experience',dob='$dob' WHERE contact= '$phone'";
        $row2=mysqli_query($con,$sql2);
        header("Location:profile.php");
    }
    else{
      $sql2="UPDATE worker SET name ='$name',mail='$mail',gender='$gender',address1='$address1',address2='$address2',zipcode='$zip',city='$city',experience='$experience',dob='$dob' WHERE contact = '$phone'";
      $row2=mysqli_query($con,$sql2);
        header("Location:profile.php");
    }
  }
?>
    </div>
</body>
</html>