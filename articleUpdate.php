<?php
include 'php/connection.php';
$id = $_GET['update_id'];
$name=  $_GET['aname'];
$content =  $_GET['content'];
$image =  $_GET['image'];
$sql="UPDATE articles SET articleName='$name',articleContent='$content',articleImage='$image' WHERE articleId=$id ";
$result=mysqli_query($link,$sql);
mysqli_close($link);
header('Location: editcontent.php');
?>
