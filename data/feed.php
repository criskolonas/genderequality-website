<?php
  require '../includes/db-inc.php';
  session_start();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Feed</title>
    <link rel="icon" href="/images/genderequal.png" type="image/png" sizes="16x16">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="admincss.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <!--<link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" type="text/css" href="/css/feed.css">
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-light  " style="background-color:  #59c0b6;">
      <a class="navbar-brand" href="/index.php">
        <img class="" src="/images/sdg_logo.png"height="80px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php
            if(isset($_SESSION['usr'])){
              echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  My Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/myaccount/myacc.php">Account Information</a>
                  <a class="dropdown-item" href="/myaccount/editcontent.php">Edit Content</a>';
                  if(($_SESSION['adm']==1)){
                    echo '<a class="dropdown-item" href="/myaccount/editmembers.php">Edit Members</a>';
                  }
              '  </div>
              </li>';
            }
           ?>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item active" href="feed.php">Feed</a>
              <a class="dropdown-item" href="statistics.php">Statistics</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact.php">Contact Us</a>
          </li>
        </ul>

          <?php
            if(isset($_SESSION['usr'])){
              echo '<form action="/includes/logout-inc.php" method="POST" class="form-inline my-2 my-lg-0"><button class="btn btn-light my-2 my-sm-0" type="submit">Log Out</button></form>';
            }
            else{
              echo '<form action="/log_reg.php" class="form-inline my-2 my-lg-0"><button class="btn btn-light my-2 my-sm-0" type="submit">Sign In</button></form>';
            }
           ?>


      </div>
    </nav>


    <main>
<!-- Dropdown for Section Sorting-->
 <div id="sortdropdown" class="dropdown">
   <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Sort by
   </button>
   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <a class="dropdown-item" href="?sortBy=dateAdded">Date Added</a>
     <a class="dropdown-item" href="?sortBy=clicks">Popularity</a>
   </div>
 </div>

      <div class="masonryholder">
        <?php
	if(!isset($_GET['sortBy'])){
    $sql = "SELECT * FROM articles ";
  	}elseif($_GET['sortBy']=="dateAdded"){
      $sql = "SELECT * FROM articles ORDER BY ArticleDate DESC";
  }else{
     $sql = "SELECT * FROM articles ORDER BY ArticleClicks DESC";
  }

        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result))
          {
            $articleId =$row['ArticleId'];
            $articleName=$row['ArticleName'];
            $articleContent=$row['ArticleContent'];
            $articleImage = $row['ArticleImage'];

            echo '<a href="article.php?id='.$articleId.'" ><div class="masonryblocks"><img src="'.$articleImage.'"><span class=text-center">'.$articleName.'</span></div></a>';
          }

        mysqli_close($conn);
          ?>
    </div>
    </main>
    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="social-wrapper">
        <ul>
          <li>
            <a href="#" target="_blank">
              <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png" alt="Twitter Logo" class="twitter-icon"></a>
          </li>
          <li>
            <a href="#" target="_blank">
              <img src="https://www.mchenryvillage.com/images/instagram-icon.png" alt="Instagram Logo" class="instagram-icon"></a>
          </li>
          <li>
            <a href="#" target="_blank">
              <img src="http://www.iconarchive.com/download/i54037/danleech/simple/facebook.ico" alt="Facebook Logo" class="facebook-icon"></a>
          </li>
        </ul>
      </div>
    </footer>

  </body>


</html>
