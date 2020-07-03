<?php
session_start();
require '../includes/db-inc.php';
$uid=$_SESSION['usrid'];


$sql = "INSERT INTO articles(ArticleId,id,ArticleName,ArticleClicks,ArticleDate,ArticleImage,ArticleContent) VALUES (default,'$uid','New Article',0,default,default,'')";
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }


mysqli_close($conn);

?>
