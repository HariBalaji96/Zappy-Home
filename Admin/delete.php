<?php
if(isset($_GET['msg']))
  {
    $id=$_GET['msg'];
    $con=new mysqli("localhost","root","","project");
    $sql="DELETE FROM services WHERE id='$id'";
    $result=mysqli_query($con,$sql);
    header("Location: updateservices.php");
  }
?>