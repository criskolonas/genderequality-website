<?php
  $link = mysqli_connect("127.0.0.1","root","", "genderequality_db");
  $id = $_GET['id'];
  $sql = "DELETE FROM articles WHERE articleId=$id";
  if (!mysqli_query($link,$sql))
    {
    die('Error: ' . mysqli_error($link));
    }
  mysqli_close($link);
 ?>
