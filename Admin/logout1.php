<?php
session_start();
session_destroy();
header("Location:admin.php?msg=<h3 class='link-create'>You are Logout</h3>");
?>