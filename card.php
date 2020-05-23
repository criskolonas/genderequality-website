<?php
include 'php/connection.php';

$sql = "INSERT INTO articles(ArticleId,ArticleName,ArticleClicks,ArticleDate,ArticleImage,ArticleContent) VALUES (default,'New Article',0,default,default,'')";
if (!mysqli_query($link,$sql))
  {
  die('Error: ' . mysqli_error($link));
  }


mysqli_close($link);

?>
