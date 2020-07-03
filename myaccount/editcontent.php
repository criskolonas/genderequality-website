<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Edit your Posts</title>
  <link rel="icon" href="/images/genderequal.png" type="image/png" sizes="16x16">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="/css/editcontent.css" rel="stylesheet" type="text/css">
  <script src="/js/articleAJAX.js"></script>

</head>

<body>
  <!-- Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-light  " style="background-color:  #59c0b6;">
    <a class="navbar-brand" href="/index.php">
      <img class="" src="/images/sdg_logo.png"height="80px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php
          if(isset($_SESSION['usr'])){
            echo '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="myacc.php">Account Information</a>
                <a class="dropdown-item" href="editcontent.php">Edit Content</a>';
                if(($_SESSION['adm']==1)){
                  echo '<a class="dropdown-item" href="editmembers.php">Edit Members</a>';
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
            <a class="dropdown-item" href="/data/feed.php">Feed</a>
            <a class="dropdown-item" href="/data/statistics.php">Statistics</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact.php">Contact Us</a>
        </li>
      </ul>

        <?php
          if(isset($_SESSION['usr'])){
            echo '<form action="../includes/logout-inc.php" method="POST" class="form-inline my-2 my-lg-0"><button class="btn btn-light my-2 my-sm-0" type="submit">Log Out</button></form>';
          }
          else{
            echo '<form action="../log_reg.php" class="form-inline my-2 my-lg-0"><button class="btn btn-light my-2 my-sm-0" type="submit">Sign In</button></form>';
          }
         ?>


    </div>
  </nav>



  <!-- Jumbotron component for page description-->
  <div  class="container-">
   <div class="jumbotron">
     <h1 class="display-4">Edit Content</h1>
     <p class="lead">Here you can manipulate feed content by adding, editing and removing Articles.</p>
   </div>
   <div class="col-sm-12">
   </div>
 </div>
 <!--Button for Creating new section -->
 <button  type="button" class="btn btn-primary" id="cardbutton">Add Article</button>

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

 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title">Edit your post.</h4>
     </div>
     <div class="modal-body">
       <form class="dataupd" action="articleUpdate.php" action="GET">
         <input type="hidden"  name="update_id" id="update_id">
         <div class="form-group">
           <label for="name">Article Name</label>
           <input type="text" id="arName" class="form-control" name="aname" >
         </div>
         <div class="form-group">
           <label for="arContent">Article Content</label>
         <textarea class="form-control" id="arContent" name="content" rows="20"></textarea>
       </div>
         <div>
           <label for="image">Article Image</label>
           <input type="text" id="arImage" class="form-control" name="image" placeholder="Paste your image URL here">
         </div>
         <div class="modal-footer">
           <button type="submit" id="#savebtn" class="btn btn-success" >Save Changes</button>
         </div>
       </form>
     </div>

   </div>
 </div>
</div>

   <div class="row">
     <!-- Dynamic Card Creation container --->
     <div class="container-fluid">
       <div class="card-deck" id="card-container">
         <?php include 'showCards.php'; ?>
       </div>
     </div>

   </div>
 <script>
 $(document).ready(function(){
       $('#cardbutton').click(function(){
           $.ajax({
               url:'card.php',
               dataType: "html",
               success: function(Response){
                 location.reload();
               }
           });
       });
   });
 </script>

</body>
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


</html>
