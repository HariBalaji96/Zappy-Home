<?php
  session_start();
  if(isset($_SESSION['user'])){
    if(isset($_GET['msg'])){
        $id=$_GET['msg'];
        $con=new mysqli("localhost","root","","project");
        $sql="SELECT * FROM services WHERE id='$id'";
        $rs=mysqli_fetch_assoc(mysqli_query($con,$sql));
    }
  }
  else{
    header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
  }
?>
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
        <div class="logo" onclick="location.href='admindashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Update</span>
        <span class="back-btn"><a href="updateservices.php">Cancel</a></span>
      </nav>
    </div>
    <div class="details-container" style="display:flex; flex-direction:column;">
    <form action="update.php?msg=<?php echo $id;?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="separate" style="margin-bottom:0;">
        <div class="register-div"><label for="t2">Service Logo</label><input type="file" accept=".JPG,.PNG,.JPEG,.jpg,.png,.jpeg" name="logo" class="register-field" id="t2" style="width: 220px;"/></div>
        <div class="register-div"><label for="t0">Service Name</label><input type="text" name="name" class="register-field" id="t0" placeholder="Service Name" value="<?php echo $rs['name']; ?>" style="width: 220px;" required /></div>
        <div class="register-div"><label for="t1">Category</label><select name="category" class="register-field" id="t1" style="width: 220px;" required>
          <option value="Home Painting">Home Painting</option>
          <option value="AC Repair">AC Repair</option>
          <option value="Home Cleaning">Home Cleaning</option>
          <option value="Salon">Salon</option>
          <option value="Carpentering">Carpentering</option>
          <option value="Plumbing">Plumbing</option>
        </select>
        </div>
        <div class="register-div"><label for="t5">Pricing</label><input type="number" name="price" class="register-field" id="t5" placeholder="Price" style="width: 220px;" value="<?php echo $rs['price']; ?>" required /></div>
        <div class="register-div"><label for="t10">Pay per Choice</label><select name="choice" class="register-field" id="t10" style="width: 220px;" required>
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
        <div class="separate" style="margin-bottom:0;">
        <div class="register-div"><label for="t3">Mode of Payment</label><select name="mode" class="register-field" id="t3" style="width: 220px;" required>
          <option value="Cash on Delivery">Cash on Delivery</option>
          <option value="Online Payment">Online Payment</option>
        </select>
        </div>
        <div class="register-div"><label for="t4">Description</label><textarea class="register-field" name="description" id="t4" cols="25" rows="15" placeholder="Enter the Description" required><?php echo $rs['description']; ?></textarea></div>
    </div>
    <button type="submit" name="update" class="submit-btn" style="width: 132px; margin-bottom: 3vh;">Update</button>   
    <p id="alert-msg" style="text-align:center;color: rgb(66, 57, 57); font-size:18px; font-weight:bold;"></p>  
  </form>
  <?php
  if(isset($_POST['update']))
  {
    $name=$_POST['name'];
    $category=$_POST['category'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $mode=$_POST['mode'];
    $choice=$_POST['choice'];
    if(($_FILES['logo']['tmp_name'])!=null){
        $img=addslashes(file_get_contents($_FILES['logo']['tmp_name']));
        $sql2="UPDATE services SET name ='$name',category='$category',description='$description',price='$price',mode='$mode',type='$choice',logo = '$img' WHERE id= '$id'";
        $row2=mysqli_query($con,$sql2);
        header("Location:updateservices.php");
    }
    else{
        $sql2="UPDATE services SET name ='$name',category='$category',description='$description',price='$price',mode='$mode',type='$choice' WHERE id= '$id'";
        $row2=mysqli_query($con,$sql2);
        header("Location:updateservices.php");
    }
  }
?>
    </div>
</body>
</html>