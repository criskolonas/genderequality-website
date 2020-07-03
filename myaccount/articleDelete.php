<?php
  require '../includes/db-inc.php';
  session_start();
  $id = $_GET['id'];
  $sql = "DELETE FROM articles WHERE articleId=$id";
  if (!mysqli_query($conn,$sql))
    {
    die('Error: ' . mysqli_error($conn));
    }
  mysqli_close($conn);
 ?>
