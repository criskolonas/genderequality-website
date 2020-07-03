
<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login and Registration Form</title>
  <link rel="icon" href="/images/genderequal.png" type="image/png" sizes="16x16">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/log_reg.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light  " style="background-color:  #59c0b6;">
    <a class="navbar-brand" href="index.php">
      <img class="" src="/images/sdg_logo.png"height="80px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
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

    </div>
  </nav>



  <div class="bg">
    <div class="container-fluid back">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"> </div>
        <div class="col-md-4 col-sm-4 col-xs-12"> </div>
        <div class="col-md-4 col-sm-4 col-xs-12">

          <div class="form-box">
            <div class="button-box">
              <div id="btn"></div>
              <button type="button" class="toggle-btn" onclick="login()">Log In</button>
              <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <?php
              if(isset($_GET['error'])){
                if($_GET['error']=="wrongpwd"){
                  echo '<p style="color:red;text-align:center">Wrong Password</p>';
                }else if ($_GET['error']=="noUser"){
                  echo '<p style="color:red;text-align:center">Wrong Username</p>';
                }else if($_GET['error']=="takenid"){
                  echo '<p style="color:red;text-align:center">Username Already Taken</p>';
                }else if ($_GET['error']=="pwdshort") {
                  echo '<p style="color:red;text-align:center">Password Should Be At Least 8 Characters</p>';
                }else if($_GET['error']=="sameinfo"){
                  echo '<p style="color:red;text-align:center">Username And Password Cannot Be The Same</p>';
                }else if($_GET['error']=="didntagree"){
                  echo '<p style="color:red;text-align:center">Must Agree To Terms And Conditions</p>';
                }
              }
             ?>
            <form id="login" action="includes/log-inc.php" method="POST" class="input-group">
              <input type="text" class="input-field" name="usrid" value="<?php if(isset($_COOKIE['usrnm'])){echo $_COOKIE["usrnm"];} ?>"placeholder="User ID" required>
              <input type="password" class="input-field" name="passwrd"value="<?php if(isset($_COOKIE["pswrd"])){echo $_COOKIE["pswrd"];} ?>" placeholder="Enter password" required>
              <input type="checkbox" name="remember" class="chech-box"><span  class="spanclass">Remember password</span>
              <button  class="submit-btn" name="login-submit"  >Log in</button>
            </form>
            <?php
              if(isset($_GET['signup'])){
                if($_GET['signup']=="success"){
                  echo '<p style="color:green;text-align:center">Signup Succesful</p>';
                }
              }
             ?>
            <form id="register" action="includes/reg-inc.php" method="POST" class="input-group">
              <input type="text" class="input-field" name="regid" placeholder="User ID" required>
              <input type="email" class="input-field" name="regemail" placeholder="Email" required>
              <input type="password" class="input-field" name="regpass" placeholder="Enter password" required>
              <input type="checkbox" name="agree" class="chech-box"><span  class="spanclass">I agree to the terms & conditions</span>
              <button type="submit" class="submit-btn" name="signup-submit">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  <script src="js/log_reg.js"></script>
</body>




</html>
