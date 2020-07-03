<?php
if(isset($_POST['login-submit'])){
  require 'db-inc.php';

  $usrid=$_POST['usrid'];
  $passwrd=$_POST['passwrd'];

  if (empty($usrid)||empty($passwrd)){
    header("Location: ../log_reg.php?error=emptyfields");
    exit();
  }else{
    $sql="SELECT * FROM users WHERE username=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../log_reg.php?error=sqlerror");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt,s,$usrid);
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);
      if($row=mysqli_fetch_assoc($result)){
        $pwdcheck=password_verify($passwrd,$row['pwd']);
        if($pwdcheck==false){
          header("Location: ../log_reg.php?error=wrongpwd");
          exit();
        }else{
          session_start();
          $_SESSION['usr']=$row['username'];
          $_SESSION['mail']=$row['email'];
          $_SESSION['bio']=$row['bio'];
          $_SESSION['profpic']=$row['profile_image'];
          $_SESSION['adm']=$row['admin'];
          $_SESSION['usrid']=$row['id'];
	  if(isset($_POST['remember'])){
            setcookie("usrnm",$usrid,time()+(30*24*60*60),"/");
            setcookie("pswrd",$passwrd,time()+(30*24*60*60),"/");
          }else {
            setcookie("usrnm","");
            setcookie("pswrd","");
          }
          header("Location: ../index.php?login=success");
          exit();
        }
      }else{
        header("Location: ../log_reg.php?error=noUser");
        exit();
      }
    }
  }
}
