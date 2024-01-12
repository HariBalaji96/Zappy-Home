<?php
    session_start();
    if(isset($_SESSION['phone'])){
      $phone=$_SESSION['phone'];
    if(($_GET['msg'])){
      $id=$_GET['msg'];
      $con=new mysqli("localhost","root","","project");
      $sql="SELECT * FROM services where id='$id'";
      $row=mysqli_fetch_assoc(mysqli_query($con,$sql));
      $sql1="SELECT * FROM userdetails where phone='$phone'";
      $row1=mysqli_fetch_assoc(mysqli_query($con,$sql1));
    }
    else{
      header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
    }
  }
    else{
      header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
    }
?>
<script>
  var reciept = <?php echo $row['price'] ?>;
  function calculate(){
    var quantity = document.getElementById("t10").value;
    var payment = reciept * quantity;
    document.getElementById("payment").innerHTML = "Pay Rs." + payment;
  }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="website icon" type="png" href="../Logo/1.png">
  <title>Booking</title>
</head>
<body>
  <div class="details-container" style="min-height:100vh">
    <div class="booking-container">
      <div class="booking-title">
        <h1>Book Your Service</h1>
        <hr>
      </div>
      <div class="booking-system">
      <div class="booking-details">
      <div class="register-div"><label>Service ID : </label><?php echo $row['id']; ?></div>
      <div class="register-div"><label>Service Name : </label><?php echo $row['name']; ?></div>
      <?php
          echo "<div class='register-div'><label>Mode of Payment : </label>".$row['mode']."</div>";
      ?>
      <div class="register-div" ><label>Address : </label><p style="border: 5px solid rgb(66, 57, 57); border-radius: 20px;" id="addr"><?php echo $row1['address1'].",<br>".$row1['address2'].",<br>".$row1['city']." - ".$row1['zipcode'].",<br>".$row1['state'].",<br>".$row1['country']."."; ?></p></div>
      <form action="<?php echo "booking.php?phone=".$phone."&msg=".$id;?>" method="post">
      <?php
      if ($row['mode']=="Cash on Delivery"){
        echo "<div class='register-div'><button name='confirm' class='accept-btn'>Confirm Booking</button></div>";
      }
      else{
        echo "<div class='register-div'><label for='t10'>Number of ".$row['type']."</label><select name='choice' class='register-field' onclick='calculate()' id='t10' style='width: 220px;' required>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "<option value='7'>7</option>";
        echo "<option value='8'>8</option>";
        echo "<option value='9'>9</option>";
        echo "</select>";
        echo "</div>";
        echo "<div class='register-div'><button name='confirm' class='accept-btn' id='payment'>Pay Rs.".$row['price']."</button></div>";
      }
      ?>
      <p id="alert-msg" style="text-align:center;color: rgb(66, 57, 57); font-size:18px; font-weight:bold;"></p>
      </form>
      </div>
      <div class="register-div"><p style="font-weight:bolder; text-align:center">(OR)<br>Change the Address</p></div>
      <form action="<?php echo "booking.php?phone=".$phone."&msg=".$id;?>" method="post">
      <div class="register-div"><label for="t6">Address</label><input type="text" name="address1" class="register-field" id="t6" placeholder="Street Address" size="25" required /></div>
      <div class="register-div"><input type="text" name="address2" class="register-field" placeholder="Street Address line 2" size="25" required /></div>
      <div class="register-div"><label for="t7">City</label><input type="text" name="city" class="register-field" id="t7" placeholder="City" size="25" required /></div>
      <div class="register-div"><label for="t8">State</label><input type="text" name="state" class="register-field" id="t8" placeholder="State" size="25" required /></div>
      <div class="register-div"><label for="t9">Country</label><input type="text" name="country" class="register-field" id="t9" placeholder="Country" size="25" required /></div>
      <div class="register-div"><label for="t0">Zip Code</label><input type="text" name="zip" class="register-field" id="t0" placeholder="Zip Code" pattern="[0-9]{6}" size="25" required /></div>
          <div class="register-div"><button name="update" class="accept-btn">Update Address</button></div>
      </form>
      </div>
      
    </div>
    <span class="back-btn" style="display:inline; padding-right:5vh; padding-top:2vh"><a href="more.php?msg=<?php echo $row['category']; ?>&id=<?php echo $id; ?>" style="color:rgb(66, 57, 57); font-size:28px; border: 2px solid rgb(66, 57, 57);">Back</a></span>
  </div>
</body>
</html>
<?php
  if(isset($_POST['update']))
  {
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $zip=$_POST['zip'];
    $sql2="UPDATE userdetails SET address1='$address1',address2='$address2',city='$city',state='$state',country='$country',zipcode='$zip' WHERE phone=$phone";
    $row2=mysqli_query($con,$sql2);
  }
  if(isset($_POST['confirm']))
  {
    function generateNumericOTP($n)
    {
      $generator = "abcdefghijklmnopqrstuvxyz";
      $result = "";
      for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, rand() % strlen($generator), 1);
      }
      return $result;
      }
      $n = 4;
      $otp=generateNumericOTP($n);
      $category=$row['category'];
      $address1=$row1['address1'];
      $address2=$row1['address2'];
      $city=$row1['city'];
      $state=$row1['state'];
      $country=$row1['country'];
      $zip=$row1['zipcode'];
      $type = $row['type'];
      $mode = $row['mode']; 
      $sql3="SELECT * FROM service_request WHERE service_id='$id' and user_phone='$phone' and address1='$address1' and address2='$address2' and city='$city' and work_status IS NULL";
      $rs1=mysqli_num_rows(mysqli_query($con,$sql3));
      if($rs1==0){
        $sql4="SELECT contact,posting,MAX(rating) FROM worker WHERE posting='$category' and contact NOT IN (SELECT worker_phone FROM service_request WHERE work_status IS NULL)";
        $fetch=mysqli_query($con,$sql4);
        $numrows=mysqli_num_rows($fetch);
        if($numrows!=0){
          $row4=mysqli_fetch_assoc($fetch);
          $worker_phone=$row4['contact'];
          if($worker_phone ==''){
            echo "<script>document.getElementById('alert-msg').innerHTML='⚠️ Please wait for sometimes worker are not available at the moment'</script>";
          }
          else{
            $sql2="INSERT INTO service_request (service_id,user_phone,category,otp,address1,address2,city,state,country,zip,worker_phone,type,mode) values('$id','$phone','$category','$otp','$address1','$address2','$city','$state','$country','$zip','$worker_phone','$type','$mode')";
            mysqli_query($con,$sql2);
            header("Location:dashboard.php");
          }
        }
        else{
          echo "<script>document.getElementById('alert-msg').innerHTML='⚠️ Please wait for sometimes worker are not available at the moment'</script>";
        }
      }
      else{
        echo "<script>document.getElementById('alert-msg').innerHTML='This Service is Already booked for your address'</script>";
      }
  }
?>
