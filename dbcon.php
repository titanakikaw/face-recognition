<?php
// $con = mysqli_connect("localhost", "admin", "admin", "thesis");
$con = mysqli_connect("localhost", "marvin", "K@t3Orsua166", "thesis");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
