<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_POST['signup-submit']) && isset($_POST['agree'])){
  require 'db-inc.php';

  $regid=$_POST['regid'];
  $regemail=$_POST['regemail'];
  $regpass=$_POST['regpass'];
  $hashedpwd=password_hash($regpass,PASSWORD_DEFAULT);

  $query="SELECT * FROM users WHERE username=?";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$query)){
    header("Location: ../log_reg.php?error=sqlerror");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt,'s',$regid);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0){
      header("Location: ../log_reg.php?error=takenid");
      exit();
    }else{
      if(strlen($regpass)<8){
        header("Location: ../log_reg.php?error=pwdshort");
        exit();
      }else if($regid==$regpass){
        header("Location: ../log_reg.php?error=sameinfo");
        exit();
      }else{
        $sql = "INSERT INTO users (username,email,pwd,profile_image,bio,admin) VALUES (?,?,?,'profile-icon.jpg','',0)";
        $stmt=mysqli_stmt_init($conn);//create prepared statement
        if (!mysqli_stmt_prepare($stmt,$sql)){  //check if the prepared statement was succesfully prepared
          header("Location: ../log-reg.php?error=sqlerror");
          exit();
        }else{
          mysqli_stmt_bind_param($stmt,"sss",$regid,$regemail,$hashedpwd); //bind the parameters with the placeholders
          mysqli_stmt_execute($stmt);
        }

        header("Location: ../log_reg.php?signup=success");
      }

    }
    }

}else{
  header("Location: ../log_reg.php?error=didntagree");
}
