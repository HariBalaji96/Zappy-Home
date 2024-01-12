<?php
  session_start();
  if(!isset($_SESSION['user']))
  {
    header("Location: admin.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
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
    <title>Add Services</title>
</head>
<body>
    <div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='admindashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Add Services</span>
        <span class="back-btn"><a href="menu.php">Back</a></span>
      </nav>
    </div>
    <div class="details-container">
        <div class="register-box" style="margin-top:5vh; margin-bottom:3vh">
        <h2 class="home-title" style="color: rgb(66, 57, 57);">Add Service</h2>
        <form action="addservices.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="separate" >
        <div class="register-div"><label for="t2">Service Logo</label><input type="file" accept=".JPG,.PNG,.JPEG,.jpg,.png,.jpeg" name="logo" class="register-field" id="t2" style="width: 220px;" required /></div>
        <div class="register-div"><label for="t0">Service Name</label><input type="text" name="name" class="register-field" id="t0" placeholder="Service Name" style="width: 220px;" required /></div>
        <div class="register-div"><label for="t1">Category</label><select name="category" class="register-field" id="t1" style="width: 220px;" required>
          <option>-- Select --</option>
          <option value="Home Painting">Home Painting</option>
          <option value="AC Repair">AC Repair</option>
          <option value="Home Cleaning">Home Cleaning</option>
          <option value="Salon">Salon</option>
          <option value="Carpentering">Carpentering</option>
          <option value="Plumbing">Plumbing</option>
        </select>
        </div>
        <div class="register-div"><label for="t5">Pricing</label><input type="number" name="price" class="register-field" id="t5" placeholder="Price" style="width: 220px;" required /></div>
        <div class="register-div"><label for="t10">Pay per Choice</label><select name="choice" class="register-field" id="t10" style="width: 220px;" required>
          <option selected>--Select--</option>
          <option value="Day">Per Day</option>
          <option value="Hour">Per Hour</option>
          <option value="Sqft">Per Sqft</option>
          <option value="Person">Per Person</option>
          <option value="Appliance">Per Appliance</option>
          <option value="BHK">Per BHK</option>
          <option value="Room">Per Room</option>
        </select>
        </div> 
      </div>
        <div class="separate">
        <div class="register-div"><label for="t3">Mode of Payment</label><select name="mode" class="register-field" id="t3" style="width: 220px;" required>
          <option selected>--Select--</option>
          <option value="Cash on Delivery">Cash on Delivery</option>
          <option value="Online Payment">Online Payment</option>
        </select>
        </div>
        <div class="register-div"><label for="t4">Description</label><textarea class="register-field" name="description" id="t4" cols="25" rows="15" placeholder="Enter the Description" required></textarea></div>
    </div>
    <button type="submit" name="submit" class="submit-btn" style="width: 132px; margin-bottom: 3vh;">Add Service</button>   
    <p id="alert-msg" style="text-align:center;color: rgb(66, 57, 57); font-size:18px; font-weight:bold;"></p>  
  </form>

    <?php
    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $id=$_POST['category'];
      $img=addslashes(file_get_contents($_FILES['logo']['tmp_name']));
      $description=$_POST['description'];
      $price=$_POST['price'];
      $mode=$_POST['mode'];
      $choice=$_POST['choice'];
      $con=new mysqli("localhost","root","","project");
      $rs1=mysqli_query($con,"SELECT * FROM services WHERE name='$name' and category='$id'");
      $result=mysqli_num_rows($rs1);
        if($result!=0)
        {
          echo "<script>document.getElementById('alert-msg').innerHTML='Service Already Exist'</script>";
        }
        else{
          $sql="INSERT INTO services (logo,name,category,description,price,mode,type) VALUES('$img','$name','$id','$description','$price','$mode','$choice')";
          $rs2=mysqli_query($con,$sql);
          if($rs2)
          {
            echo "<script>document.getElementById('alert-msg').innerHTML='Service Added Successfully'</script>";
          }
          else{
            echo "<script>document.getElementById('alert-msg').innerHTML='Service is not Added'</script>";
          }
        }
      }
    ?>
    </div>

    </div>
</body>
</html>