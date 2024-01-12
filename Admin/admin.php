<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="website icon" type="png" href="../Logo/1.png">
    <title>Login</title>
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Zappy Home</span>
        <span class="back-btn"><a href="../index.php">Back</a></span>
      </nav>
    </div>
    <div class="login-container">
      <div class="form-box">
        <h1 class="home-title" style="color: rgb(66, 57, 57); font-size: 32px">
          Admin
        </h1>
        <?php
        if(isset($_GET['msg']))
        {
          echo $_GET['msg'];
        }
      ?>
        <form class="input-group" id="user" method="post" action="admin.php" autocomplete=off>
          <input
            type="text"
            class="input-field"
            name="user"
            placeholder="User ID"
            required
          />
          <input
            type="password"
            class="input-field"
            name="pass"
            placeholder="Password"
            required
          />
          <button type="submit" name="submit" class="submit-btn">Log in</button>
        </form>

        <?php
  $con=new mysqli("localhost","root","","project");
  if(isset($_POST['submit']))
  {
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    if ($user!="" && $pass!="")
    {
      $rs=mysqli_query($con,"SELECT * FROM admin WHERE userid='$user' AND password='$pass'");
      $result=mysqli_num_rows($rs);
      if($result==1)
      {
        $_SESSION["user"]=$user;
        header("Location:admindashboard.php");
      }
      else{
        echo "<h3 class='link-create'>Incorrect User Details!</h3>";
        $_GET['msg']="";
      }
    }
  }
?>
      </div>
    </div>
  </body>
</html>
