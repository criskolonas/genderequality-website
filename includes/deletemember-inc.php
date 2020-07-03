<?php
require "db-inc.php";
$deletedmember=$_POST["deletedmember"];
echo $deletedmember;
$sql="DELETE FROM users WHERE username='$deletedmember'";
mysqli_query($conn,$sql);
 ?>
