<?php
    session_start();
    if(isset($_SESSION['phone'])){
      $phone=$_SESSION['phone'];
    if(isset($_GET['msg'])){
      $id=$_GET['msg'];
    }
    else{
      header("Location: ../index.php?msg=<h3 class='link-create'>Please Login Here !</h3>");
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
    <link rel="stylesheet" href="../style.css">
    <link rel="website icon" type="png" href="../Logo/1.png">
    <title><?php echo $id; ?></title>
</head>
<body>
<div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='dashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name"><?php echo $id; ?></span>
        <span class="back-btn"><a href="services.php">Back</a></span>
      </nav>
    </div>
    <div class="details-container" style="min-height:100vh">
    <div class="service-margin">
    <?php
          $con=new mysqli("localhost","root","","project");
          $sql="SELECT * FROM services where category='$id'";
          $result=mysqli_query($con,$sql);
          $numrow=mysqli_num_rows($result);
          if($numrow!=0)
          { 
            while($row=mysqli_fetch_assoc($result))
            { 
            echo "<div class='service-field'>";
                echo "<div class='service-logo'>";
                  echo "<img src='data:image;base64,".base64_encode($row['logo'])."'width='150px'> ";
                echo "</div>";
                echo "<div class='title-container'>";
                  echo "<h1>".$row['name']."</h1>";
                  echo "<p>".$row['description']."</p>";
                  if ($row['price']!=0 && $row['price']!='')
                  {
                    echo "<p style='color:#54ff00; font-size:24px'> Price : Rs.".$row['price']." / ".$row['type']."</p>";
                  }
                  if ($row['mode']!='')
                  {
                    echo "<p style='font-size:18px'> Mode of Payment : ".$row['mode']."</p>";
                  }                   
                echo "</div>";
                echo "<a href='more.php?phone=&msg=".$id."&id=".$row['id']."'><button class='accept-btn'>More..</button></a>";
            echo "</div>";
            }
          }
          else
          {
            echo "<span class='name' style='color:#000'>Services not exist</span>";
          }
    
    ?>
    </div>
  </div>
</body>
</html>