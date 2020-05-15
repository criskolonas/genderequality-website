<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Admininstration Page</title>
  <link rel="icon" href="images/genderequal.png" type="image/png" sizes="16x16">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="css/editcontent.css" rel="stylesheet" type="text/css">
</head>

<body>

  <?php
  $link = mysqli_connect("localhost", "genderequality_db");

  // data processing

  mysqli_close($link);
  ?>

  <!-- Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-light  " style="background-color:  #59c0b6;">
    <a class="navbar-brand" href="index.html">
      <img class="" src="images/sdg_logo.png" height="80px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            My Account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="myacc.html">Account Information</a>
            <a class="dropdown-item" href="editcontent.php">Edit Content</a>
            <a class="dropdown-item" href="editmembers.html">Edit Members</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="log_reg.html">Sign In</a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="feed.html">Feed</a>
            <a class="dropdown-item " href="statistics.html">Statistics</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>


  <!-- Jumbotron component for page description-->
  <div  class="container-">
    <div class="jumbotron">
      <h1 class="display-4">Edit Content</h1>
      <p class="lead">Here you can manipulate page content by adding or removing new sections.</p>
    </div>
    <div class="col-sm-12">
    </div>
  </div>
  <!-- Dropdown for Section Sorting-->
  <div id="sortdropdown" class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sort by
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Date Added</a>
      <a class="dropdown-item" href="#">Popularity</a>
    </div>
  </div>

  <!-- Container for the modal -->
  <div id="modal-container"></div>

  <div class="container-fluid">
    <div class="row">
      <!-- Dynamic Card Creation container --->
      <div class="container-fluid">
        <div class="row" id="card-container"></div>
      </div>
      <!-- Add new section Card -->
      <div class="col-sm">
        <div class="card h-100 card-body" style="width: 18rem;">
          <img class="card-img-top" src="https://designshack.net/wp-content/uploads/placeholder-image.png" alt="Card image cap">
          <div class="card-body">
            <button onclick="appendCard()" type="button" class="btn btn-primary">Add Section</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/editcontent.js"></script>

</body>

</html>
