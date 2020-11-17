<?php
   include('conn.php');

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select user_id, username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $login_userid = $row['user_id'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>