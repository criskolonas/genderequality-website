<?php 
require '../includes/db-inc.php';
  session_start();
  $id = $_GET['id'];
  $sql = "DELETE FROM users WHERE id=$id";
  if (!mysqli_query($conn,$sql))
    {
    die('Error: ' . mysqli_error($conn));
    }
  $sql = "DELETE FROM articles WHERE id=$id";
  if (!mysqli_query($conn,$sql))
    {
    die('Error: ' . mysqli_error($conn));
    }
  mysqli_close($conn);
?>