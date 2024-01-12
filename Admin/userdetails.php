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
    <title>User Details</title>
    <link rel="website icon" type="png" href="../Logo/1.png">
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='admindashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">User Details</span>
        <span class="back-btn"><a href="admindashboard.php">Back</a></span>
      </nav>
    </div>

    <div class="details-container">
    <?php
  $con=new mysqli("localhost","root","","project");
  $sql="SELECT * FROM userdetails WHERE phone NOT IN (SELECT contact FROM worker)";
  $result=mysqli_query($con,$sql);
  $numrow=mysqli_num_rows($result);
  if($numrow!=0)
  {
    echo '<table>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Contact</th>';
    echo '<th>Email</th>';
    echo '<th>Gender</th>';
    echo '<th>Address</th>';
    echo '</tr>';
    while($row=mysqli_fetch_assoc($result))
    {
    echo "<tr>";
    echo "<td style='text-align:center'>". $row['name'] ."</td>";
    echo "<td>". $row['phone'] ."</td>";
    echo "<td>". $row['email'] ."</td>";
    echo "<td>". $row['gender'] ."</td>";
    echo "<td>". $row['address1'] . "<br>" . $row['address2'] . "-" . $row['zipcode'] ."</td>";
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
