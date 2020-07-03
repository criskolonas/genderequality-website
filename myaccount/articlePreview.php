
 <?php
 require '../includes/db-inc.php';
 session_start();
 $id = $_GET['id'];
 $sql = "SELECT * FROM articles WHERE ArticleId=$id";
 $result = mysqli_query($conn,$sql);
 $row= mysqli_fetch_array($result);
 $articleId =$row['ArticleId'];
 $articleName=$row['ArticleName'];
 $articleContent=$row['ArticleContent'];
 $articleImage = $row['ArticleImage'];
 $articleDate = $row['ArticleDate'];
 echo json_encode(array("articleId"=>$articleId,"articleName"=>$articleName,"articleImage"=>$articleImage,"articleContent"=>$articleContent));


 mysqli_close($conn);
 ?>
