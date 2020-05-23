<?php
include 'php/connection.php';

//CHANGE QUERRIES FOR ARTICLES ONLY MADE BY LOGGED MEMBER
if(!isset($_GET['sortBy'])){
  $sql = "SELECT * FROM articles";
}elseif($_GET['sortBy']=="dateAdded"){
  $sql = "SELECT * FROM articles ORDER BY ArticleDate DESC";
}else{
  $sql = "SELECT * FROM articles ORDER BY ArticleClicks DESC";
}
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
  {
    $articleId =$row['ArticleId'];
    $articleName=$row['ArticleName'];
    $articleContent=$row['ArticleContent'];
    $articleImage = $row['ArticleImage'];
    echo '<div class="col-sm-3" id="'.$articleId.'">
    <div class="card h-100 card-body" width="18rem">
    <div class="card-body">
    <img class="card-img-top" src="'.$articleImage.'">

    <p class="card-text">'.$articleName.' </p>
    <button type="button" onclick="previewArticle('.$articleId.')" data-toggle="modal" data-target="#myModal" class="btn btn-warning oncli">Edit</button>
    <button type="button" onclick="deleteArticle('.$articleId.')" class="btn btn-danger">Delete</button>

    </div>
    </div>
    </div>';
  }

mysqli_close($link);
?>
