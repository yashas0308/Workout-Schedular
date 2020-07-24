<?php
session_start();
require_once('connect.php');
  
  if (isset($_POST['loginButton'])) {
    if (empty($_POST['UNTxt']) || empty($_POST['UPTxt'])) {

      header("location:index.php?Emp=Enter something");
    }
    else
    {
       $query = "select * from users where uname='".$_POST['UNTxt']."' and upwd='".$_POST['UPTxt']."'";
       $res = mysqli_query($conn,$query);

       if(mysqli_fetch_assoc($res))
       {
        $_SESSION['User'] = $_POST['UNTxt'];
        header("location:homepage.php");
       }
       else
       {
        header("location:index.php?Inv=Those credentials aren't valid");
       }
    }

  }
  else
  {
   echo "bad weed";
  }
?>
