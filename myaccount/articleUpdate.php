<?php
require '../includes/db-inc.php';
session_start();
$id = $_GET['update_id'];
$name=  $_GET['aname'];
$content =  $_GET['content'];
$image =  $_GET['image'];
$sql="UPDATE articles SET articleName='$name',articleContent='$content',articleImage='$image' WHERE articleId=$id ";
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
header('Location: editcontent.php');
?>
