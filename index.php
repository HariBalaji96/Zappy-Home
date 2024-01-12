<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="website icon" type="png" href="Logo/1.png">
    <title>Login</title>
  </head>
  <body>
    <div class="nav-container">
      <nav>
        <div class="logo">
          <img src="Logo/1.png" alt="logo" />
        </div>
        <span class="name">Zappy Home</span>
      </nav>
    </div>
    <div class="login-container">
      <div class="form-box">
        <div class="button-box">
          <div id="slider"></div>
          <button type="button" id="color1" style="color:white" class="toggle-btn" onclick="user()">
            Login
          </button>
          <button type="button" id="color2" class="toggle-btn" onclick="worker()">
            Worker
          </button>
        </div>
        <?php
        if(isset($_GET['msg']))
        {
          echo $_GET['msg'];
        }
      ?>
        <form
          class="input-group"
          id="user"
          method="post"
          action="index.php"
          autocomplete=off
        >
          <input
            type="tel"
            class="input-field"
            name="phone"
            placeholder="Phone No"
            pattern="[0-9]{10}"
            required
          />
          <input
            type="password"
            name="pass"
            class="input-field"
            placeholder="Password"
            required
          />
          <button type="submit" name="usubmit" class="submit-btn">
            Log in
          </button>

          <h3 class="link-create">
            <a href="Client/register.php">Create an Account ?</a>
          </h3>
        </form>

<?php
  $con=new mysqli("localhost","root","","project");
  if(isset($_POST['usubmit']))
  {
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    if ($phone!="" && $pass!="")
    {
      $rs=mysqli_query($con,"SELECT * FROM userdetails WHERE phone='$phone' AND password='$pass'");
      $result=mysqli_num_rows($rs);
      if($result==1)
      {
        $_SESSION["phone"]=$phone;
        header("Location:Client/dashboard.php");
      }
      else{
        echo "<h3 class='link-create'>Incorrect User Details!</h3>";
        $_GET['msg']="";
      }
    }
  }
?>

        <form class="input-group" id="worker" method="post" autocomplete=off>
          <input
            type="text"
            class="input-field"
            name="wphone"
            placeholder="Phone No"
            required
          />
          <input
            type="password"
            class="input-field"
            name="wpass"
            placeholder="Password"
            required
          />
          <button type="submit" name="wsubmit" class="submit-btn">Log in</button>

        </form>

<?php
$con=new mysqli("localhost","root","","project");
if(isset($_POST['wsubmit']))
{
$phone=$_POST['wphone'];
$pass=$_POST['wpass'];
if ($phone!="" && $pass!="")
{
$rs=mysqli_query($con,"SELECT * FROM worker WHERE contact='$phone' AND password='$pass'");
$result=mysqli_num_rows($rs);
if($result==1)
{
$_SESSION["wphone"]=$phone;
header("Location:Employee/empdashboard.php");
}
else{
echo "<h3 class='link-create'>Incorrect User Details!</h3>";
$_GET['msg']="";
}
}
}
?>
      </div>
      <h3 class="link-create" style="font-size:18px">
      <a href="Admin/Admin.php">For Admin</a>
    </h3>
    </div>
    <script>
      var x = document.getElementById("user");
      var y = document.getElementById("worker");
      var z = document.getElementById("slider");
      var c1 = document.getElementById("color1");
      var c2 = document.getElementById("color2");
      function worker() {
        x.style.left = "-400px";
        y.style.left = "40px";
        z.style.left = "155px";
        c1.style.color = "#000";
        c2.style.color = "#ffff";
      }

      function user() {
        x.style.left = "40px";
        y.style.left = "450px";
        z.style.left = "51px";
        c2.style.color = "#000";
        c1.style.color = "#ffff";
      }
    </script>
  </body>
</html>
