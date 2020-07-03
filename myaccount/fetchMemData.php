<?php 
require '../includes/db-inc.php';
 session_start();
 $uid = $_GET['uid'];
 $sql = "SELECT * FROM users WHERE id='$uid'";
 $result = mysqli_query($conn,$sql);
 $row= mysqli_fetch_array($result);
 $username=$row['username'];
 $useremail=$row['email'];
 $userbio = $row['bio'];
 $useradmin = $row['admin'];
 echo json_encode(array("username"=>$username,"useremail"=>$useremail,"userbio"=>$userbio,"useradmin"=>$useradmin));


 mysqli_close($conn);
 ?>
