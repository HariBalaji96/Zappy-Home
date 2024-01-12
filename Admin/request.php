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
    <title>Request</title>
    <link rel="website icon" type="png" href="../Logo/1.png">
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='admindashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Employee Request</span>
        <span class="back-btn"><a href="admindashboard.php">Back</a></span>
      </nav>
    </div>

    <div class="details-container">
    <?php
  $con=new mysqli("localhost","root","","project");
  $sql="SELECT * FROM request";
  $result=mysqli_query($con,$sql);
  $numrow=mysqli_num_rows($result);
  if($numrow!=0)
  {
    echo '<table>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Contact</th>';
    echo '<th>Date 0f Birth</th>';
    echo '<th>Email</th>';
    echo '<th>Gender</th>';
    echo '<th>Posting</th>';
    echo '<th>Experience</th>';
    echo '<th>Photo</th>';
    echo '<th>Aadhar No</th>';
    echo '<th>Resume</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    while($row=mysqli_fetch_assoc($result))
    {
    echo "<tr>";
    echo "<td>". $row['name'] ."</td>";
    echo "<td>". $row['contact'] ."</td>";
    echo "<td>". $row['dob'] ."</td>";
    echo "<td>". $row['mail'] ."</td>";
    echo "<td>". $row['gender'] ."</td>";
    echo "<td>". $row['posting'] ."</td>";
    echo "<td>". $row['experience'] ."</td>";
    echo "<td>"."<img src='data:image;base64,".base64_encode($row['photo'])."'width='100px'> "."</td>";
    echo "<td>". $row['aadharno'] ."</td>";
    echo "<td>"."<a href="."Resume/".$row['resume']." target='_blank'><button class='accept-btn'>Resume</button></a>"."</td>";
    echo "<td>"."<a href="."accept.php?msg=".$row['contact']."><button class='accept-btn'>Accept</button></a>  "."<a href="."decline.php?msg=".$row['contact']."><button class='decline-btn'>Decline</button></a>"."</td>";
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
