<?php
  session_start();
  
  $loginpin=$_SESSION['db_pass'];
  $oldpin=$_POST['oldpin'];
  $pin=$_POST['write_newpin'];
  $repin=$_POST['rewrite_newpin'];
  $conn=mysqli_connect('localhost','root','','atm');

  if($pin==$repin&&$loginpin==$oldpin) {	
  	$sql="update account_details set pin=$repin WHERE acc_no='$_SESSION[db_usr]'";
  	mysqli_query($conn, $sql);
  	echo '<script language="javascript">';
  	echo 'alert("Pin Successfully Changed!"); window.location="Select_Service.php"';
  	echo '</script>';
  }
  else {
  	echo '<script language="javascript">';
  	echo 'alert("PIN incorrect or mismatched"); window.location="Change_Pin.php"';
  	echo '</script>';
  }