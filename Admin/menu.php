<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="website icon" type="png" href="../Logo/1.png">
</head>
<body>
<div class="nav-container">
      <nav>
        <div class="logo" onclick="location.href='admindashboard.php';">
          <img src="../Logo/1.png" alt="logo" />
        </div>
        <span class="name">Services</span>
        <span class="back-btn"><a href="admindashboard.php">Back</a></span>
      </nav>
    </div>
    <div class="details-container" style="min-height:100vh; display:flex; justify-content:space-around; flex-direction:row" >
    <div class="services" onclick="location.href='updateservices.php';">
          <div class="service-details">
          <img src="../Logo/update.png" >
          <h1>Update Services</h1>
        </div>
        </div>
    <div class="services" onclick="location.href='addservices.php';">
          <div class="service-details">
          <img src="../Logo/add.png">
          <h1>Add Services</h1>
        </div>
        </div>
    </div>
</body>
</html>