<?php 
  session_start();
  if ($_SESSION==false) {
    echo '<script>window.location.href = "Login.php";</script>';
    exit();
  }

  date_default_timezone_set("Africa/Lagos");
  $time=date("H:i:s");
  $date=date("Y/m/d");
  $conn=mysqli_connect('localhost','root','','atm');
  $amt=$_POST['amount'];
  $sql="select saving_balance from saving_account where c_id=(select c_id from account_details where acc_no='$_SESSION[db_usr]');";
  $result=mysqli_query($conn,$sql);
  $tid=mysqli_query($conn,"select * from transaction_id");
  $val=mysqli_fetch_assoc($tid);

  if($amt==0) {
  	echo '<script language="javascript">';
  	echo 'alert("Please Enter a valid Amount");window.location="Withdraw_Cash_Savings.php"';
  	echo '</script>';	
  }

  if($amt%100==0) {
    if (mysqli_num_rows($result)>0) {
      while($row=mysqli_fetch_assoc($result)) {
        if ($row["saving_balance"]>=$amt){
          $trans=$val["t_id"];
          ++$trans;
          $actamt=$row["saving_balance"]-$amt;
          $sql1="update saving_account set saving_balance=$actamt WHERE c_id=(select c_id from account_details where acc_no='$_SESSION[db_usr]')";
          $sql2="call trans_saving_with($trans,'$_SESSION[db_usr]',$amt,$actamt);";
          	$sql3="update transaction_id set t_id=$trans";
          mysqli_query($conn,$sql1);
          mysqli_query($conn,$sql2);
          mysqli_query($conn,$sql3);
          echo '<script language="javascript">';
          echo 'alert("Thank you for banking with us!!\n\nYour Transaction Number is "+"'.$trans.'"); window.location="../index.php"';
          echo '</script>';	
   	    }
   	    else {
          echo '<script language="javascript">';
          echo 'alert("You have Insufficient funds in your account"); window.location="Withdraw_Cash_Savings.php"';
          echo '</script>';
        }
	    }
    }
  }
  else {
  	echo '<script language="javascript">';
  	echo 'alert("Please Enter the amount in multiples of 100"); window.location="Withdraw_Cash_Savings.php"';
  	echo '</script>';
  }