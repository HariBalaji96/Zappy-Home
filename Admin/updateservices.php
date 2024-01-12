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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <span class="name">Update Service</span>
        <span class="back-btn"><a href="menu.php">Back</a></span>
      </nav>
    </div>

    <div class="details-container">
    <?php
  $con=new mysqli("localhost","root","","project");
  $sql="SELECT * FROM services";
  $result=mysqli_query($con,$sql);
  $numrow=mysqli_num_rows($result);
  if($numrow!=0)
  {
    echo '<table>';
    echo '<tr>';
    echo '<th>Logo</th>';
    echo '<th>Name</th>';
    echo '<th>Category</th>';
    echo "<th style='max-width:250px'>Description</th>";
    echo '<th>Price</th>';
    echo '<th>Payment Mode</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    while($row=mysqli_fetch_assoc($result))
    {
    echo "<tr>";
    echo "<td>"."<img src='data:image;base64,".base64_encode($row['logo'])."'width='100px'> "."</td>";
    echo "<td>". $row['name'] ."</td>";
    echo "<td>". $row['category'] ."</td>";
    echo "<td style='max-width:250px;'>". $row['description'] ."</td>";
    echo "<td>Rs.". $row['price'] . " / " . $row['type'] ."</td>";
    echo "<td>". $row['mode'] ."</td>";
    echo "<td>"."<a href="."delete.php?msg=".$row['id']."><button class='decline-btn'>Delete</button></a>"."<a href="."update.php?msg=".$row['id']."><button class='accept-btn' style='margin-left:5px'>Update</button></a>"."</td>";
    echo "</tr>";
  }
  echo '</table>';
}
  else{
    echo "<span class='name' style='color:#000'>Record not exist</span>";
  }
?>
    </div>
  </body>
</html>
