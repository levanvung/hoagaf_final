<?php
$con = mysqli_connect("MYSQL5031.site4now.net","a7a719_hoagaf","An10122001","db_a7a719_hoagaf");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
mysqli_set_charset($con,"utf8");
?>