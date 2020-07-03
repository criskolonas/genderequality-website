<?php
session_start();

if (isset($_POST['bio-submit'])){
  require 'db-inc.php';

  $bio=mysqli_real_escape_string($conn,$_POST['bio']);
  $profileImageName=time() . '-' .$_FILES['img']['name'];
  $target='../images/'.$profileImageName;

  if(move_uploaded_file($_FILES['img']['tmp_name'],$target)){
    $sql="UPDATE users SET profile_image='$profileImageName',bio='$bio' WHERE username='".$_SESSION['usr']."'";
    if(mysqli_query($conn,$sql)){
      $_SESSION['profpic']=$profileImageName;
      $_SESSION['bio']=$bio;
      header("Location: ../myacc.php?updatebio=success");
      exit();
    }
  }else {
    $sql="UPDATE users SET bio='$bio' WHERE username='".$_SESSION['usr']."'";
    if(mysqli_query($conn,$sql)){
      $_SESSION['bio']=$bio;
      header("Location: /myaccount/myacc.php?updatebio=success");
      exit();
    }
}
}