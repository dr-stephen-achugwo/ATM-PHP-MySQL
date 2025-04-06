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
  $tid=mysqli_query($conn,"select * from transaction_id");
  $val=mysqli_fetch_assoc($tid);
  
  if($amt==0) {
  	echo '<script language="javascript">';
  	echo 'alert("Please Enter a valid amount ");window.location="Deposit_Cash_Savings.php"';
  	echo '</script>';	
  }
  if ($amt%100==0) {	
  	$sql="select saving_balance from saving_account where c_id=(select c_id from account_details where acc_no='$_SESSION[db_usr]');";
  	$result=mysqli_query($conn,$sql);

  	if (mysqli_num_rows($result)>0) {
      while($row=mysqli_fetch_assoc($result)) {
        $trans=$val["t_id"];
        ++$trans;
        $actamt=$row["saving_balance"]+$amt;
        $sql1="update saving_account set saving_balance =$actamt WHERE c_id=(select c_id from account_details where acc_no='$_SESSION[db_usr]')";
        $sql2="call trans_saving_dep($trans,'$_SESSION[db_usr]',$amt,$actamt);";
        $sql3="update transaction_id set t_id=$trans";
        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql2);
        mysqli_query($conn,$sql3);
        echo '<script language="javascript">';
        echo 'alert("Thank you for banking with us\n\nYour Transaction Number is "+"'.$trans.'"); window.location="Deposit_Cash_Savings.php"';
        echo '</script>';
      }
  	}
  }
  else {
   	echo '<script language="javascript">';
  	echo 'alert("Please enter amount in multiples of 100"); window.location="Acc_Balance_Savings.php"';
  	echo '</script>';
  }
