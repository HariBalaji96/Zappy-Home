<?php
    session_start();
    if(isset($_SESSION['phone'])){
        $phone=$_SESSION['phone'];
    if(isset($_GET['msg']) && isset($_GET['id'])){
      $service=$_GET['msg'];
      $id=$_GET['id'];
      $con=new mysqli("localhost","root","","project");
      $sql="SELECT * FROM services where id='$id'";
      $result=mysqli_query($con,$sql);
      $numrow=mysqli_num_rows($result);
      $row=mysqli_fetch_assoc($result);
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
    <title><?php echo $row['name']; ?></title>
</head>
<body>
    <div class="details-container" style="min-height:100vh">
    
            <div class="more-container">
                <div class="more-logo">
                    <?php echo "<img src='data:image;base64,".base64_encode($row['logo'])."'width='150px'> "; ?>
                </div>
                
                <div class="more-title">
                    <h1><?php echo $row['name']; ?></h1>
                </div>
                <div class="more-description">
                    <p><?php echo $row['description']; ?></p>
                    <?php
                        echo "<p> Mode of Payment : ".$row['mode']."</p>";
                        echo "<p> Price will vary based Number of ".$row['type']."</p>";
                    ?>
                </div>
                <div class="more-buy">
                <?php
                        echo "<br><br><a href='booking.php?&msg=".$id."' ><button class='accept-btn'>Book Service</button></a>";
                ?>
                </div>
            </div>
            
            <div>
            <span class="back-btn" id="nav-back"><a href="subservices.php?msg=<?php echo $service; ?>" style="color:rgb(66, 57, 57)">Back</a></span>
            </div>
            
    </div>
</body>
</html>