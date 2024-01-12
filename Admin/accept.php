<?php
if(isset($_GET['msg']))
  {
    $contact=$_GET['msg'];
    $con=new mysqli("localhost","root","","project");
    $sql="INSERT INTO worker (contact,name,password,dob,mail,gender,posting,experience,photo,aadharno,address1,address2,city,state,country,zipcode) SELECT contact,name,password,dob,mail,gender,posting,experience,photo,aadharno,address1,address2,city,state,country,zipcode FROM request WHERE contact='$contact'";
    $result=mysqli_query($con,$sql);
    $sql2="DELETE FROM request WHERE contact='$contact'";
    $result2=mysqli_query($con,$sql2);
    header("Location: request.php");
  }
?>