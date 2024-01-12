<?php
if(isset($_GET['msg']))
  {
    $contact=$_GET['msg'];
    $con=new mysqli("localhost","root","","project");
    $sql="DELETE FROM request WHERE contact='$contact'";
    $result=mysqli_query($con,$sql);
    header("Location: request.php");
  }
?>