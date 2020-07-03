<?php
require '../includes/db-inc.php';
session_start();
$id = $_GET['update_id'];
$username=$_GET['uname'];
$useremail=$_GET['email'];
$userbio = $_GET['ubio'];
$useradmin =$_GET['admin'];
$sql="UPDATE users SET username='$username',email='$useremail',bio='$userbio',admin='$useradmin' WHERE id='$id' ";
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
header('Location: editmembers.php');

?>
