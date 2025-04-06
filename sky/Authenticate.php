<?php
  session_start();
  $username=$_POST['username'];
  $password=$_POST['password'];
  $_SESSION['db_usr']=$username;
  $_SESSION['db_pass']=$password;
  $conn=mysqli_connect('localhost','root','','atm');
  $check=mysqli_query($conn,"select * from account_details where acc_no='$username' and pin='$password'");
  
  if(mysqli_num_rows($check)==true) {
    echo '<script language="javascript">window.location="Select_Service.php"</script>';
  } else {
    echo '<script language="javascript">window.location="Login_retry.php"</script>';
  }
