<?php
include 'php/connection.php';
$id = $_GET['id'];
$name= $_GET['name'];
$content = $_get['content'];
$image = $_get['image'];
$sql="UPDATE articles SET ArticleName=$name,ArticleContent=$content,ArticleImage=$image WHERE ArticleId=$id ";
$query=mysqli_query($link,$sql);
?>
