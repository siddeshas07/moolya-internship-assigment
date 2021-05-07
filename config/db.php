<?php
$conn = mysqli_connect("remotemysql.com", "BYUH85VYgd", "e6JL7jF0xB", "BYUH85VYgd");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "<h2>Connection is made successfully</h2>";
?>
