<?php

  session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Gender Equality Project</title>
     <link rel="icon" href="images/genderequal.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>

    <body>

      <nav class="navbar navbar-expand-lg navbar-light " style="background-color:  #59c0b6;">
        <a class="navbar-brand" href="index.php">
          <img class="" src="/images/sdg_logo.png"height="80px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php
              if(isset($_SESSION['usr'])){
                echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="myaccount/myacc.php">Account Information</a>
                    <a class="dropdown-item" href="myaccount/editcontent.php">Edit Content</a>';
                    if(($_SESSION['adm']==1)){
                      echo '<a class="dropdown-item" href="myaccount/editmembers.php">Edit Members</a>';
                    }
                '  </div>
                </li>';
              }
             ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="data/feed.php">Feed</a>
                <a class="dropdown-item" href="data/statistics.php">Statistics</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>

            <?php
              if(isset($_SESSION['usr'])){
                echo '<form action="includes/logout-inc.php" method="POST" class="form-inline my-2 my-lg-0"><button class="btn btn-light my-2 my-sm-0" type="submit">Log Out</button></form>';
              }
              else{
                echo '<form action="log_reg.php" class="form-inline my-2 my-lg-0"><button class="btn btn-light my-2 my-sm-0" type="submit">Sign In</button></form>';
              }
             ?>


        </div>
      </nav>

      <main>
        <div class="container-fluid my-container">
          <div class="row justify-content-around">
            <div class="col-sm-6">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="images/slide1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="images/original.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="images/human.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="text-block">
                      <h5>The women at the front lines of India's citizenship law protests</h5>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="welcome">
              <?php
                if(isset($_SESSION['usr'])){
                  echo "<h6 >Welcome to our site<span style='color:#59c0b6;'> ".$_SESSION['usr']."!</span></h6>";
                }else{
                  echo "<h6>Welcome to our site!</h6>";
                }
              ?>
              <p1>In the past few decades we have seen a lot of progress towards gender equality, but despite the great steps that we have taken in achieving this goal, the problem doesn't seize to exist in certain countries, societies or workplaces. The reasoning behind this site, is to raise awareness about these still existing problems, with the use of some data and statistics.</p1>
            </div>
          </div>
        </div>
	<div class="row justify-content-around secondrow">
          <div class="col-sm-4">
            <div class="welcome">
              <p1>On a global scale, achieving gender equality also requires eliminating harmful practices against women and girls, including sex trafficking, femicide, wartime sexual violence, and other oppression tactics.</p1>
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4viXOGvvu0Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>

        <div class="row justify-content-around ">
          <div class="col-sm-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/a4WuurpnSbc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-sm-4 ">
            <div class="welcome">Equity is relational. Inequities are rooted in uneven dynamics that give disproportionate power to one group versus another. Irrespective of the amount we invest in women, men also need to be willing participants in the redistribution of power between genders.</p1>
            </div>
          </div>
        </div>
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
