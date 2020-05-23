
 <?php
 include 'php/connection.php';
 $id = $_GET['id'];
 $sql = "SELECT * FROM articles WHERE ArticleId=$id";
 $result = mysqli_query($link,$sql);
 $row= mysqli_fetch_array($result);
 $articleId =$row['ArticleId'];
 $articleName=$row['ArticleName'];
 $articleContent=$row['ArticleContent'];
 $articleImage = $row['ArticleImage'];
 $articleDate = $row['ArticleDate'];
 echo json_encode(array("articleId"=>$articleId,"articleName"=>$articleName,"articleImage"=>$articleImage,"articleContent"=>$articleContent));


 mysqli_close($link);
 ?>
