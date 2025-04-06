<?php 
// function setBalance($amount,$process,$accountno){
//   $con = new mysqli('localhost','root','','php');
//   $array = $con->query("select * from d1_useraccounts where accountno='$accountno'");
//   $row = $array->fetch_assoc();
//   if($process == 'credit'){
//   	$deposit = $row['deposit'] + $amount;
//   	return $con->query("update d1_useraccounts set deposit = '$deposit' where accountno = '$accountno'");
//   }else{
//   	$deposit = $row['deposit'] - $amount;
//   	return $con->query("update d1_useraccounts set deposit = '$deposit' where accountno = '$accountno'");
//   }
// }"select * from atm_current_account where acc_no='$acc_no'"
// $sql="select current_balance from atm_current_account where c_id=(select c_id from atm_account_details where acc_no='$_SESSION[db_usr]')";
// $result=mysqli_query($conn,$sql);

  // $conn = new mysqli('localhost','root','','php');
  // $balance = $conn->query("select current_balance from atm_current_account where c_id=(select c_id from atm_account_details where acc_no='$_SESSION[db_usr]')");

  date_default_timezone_set("Africa/Lagos");
  $time=date("H:i:s");
  $date=date("Y/m/d");
  $conn=mysqli_connect('localhost','root','','php');
  $amt=$_POST['amount'];
  $tid=mysqli_query($conn,"select * from atm_transaction_id");
  $val=mysqli_fetch_assoc($tid);


function trans_current_dep($t_type,$tran_id,$acc_no,$t_amount,$balance) {
  $conn = new mysqli('localhost','root','','php');
  $t_balance = $conn->query("select current_balance from atm_current_account where c_id=(select c_id from atm_account_details where acc_no='$_SESSION[db_usr]')");
  $t_amount = $_POST['amount'];
  if ($t_type == 'credit'){
    $t_balance = $t_balance + $t_amount;
    return $conn->query("insert INTO atm_transaction (date,time,t_id,acc_no,account_type,t_amount,t_balance,t_type) 
      values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,$tran_id,$acc_no,'current',$t_amount,$t_balance,'credit')");
  }
}

function trans_current_with($t_type,$tran_id,$acc_no,$t_amount,$balance) {
  $conn = new mysqli('localhost','root','','php');
  $t_balance = $conn->query("select current_balance from atm_current_account where c_id=(select c_id from atm_account_details where acc_no='$_SESSION[db_usr]')");
  $t_amount = $_POST['amount'];
  if ($t_type == 'debit'){
    $t_balance = $t_balance - $t_amount;
    return $conn->query("insert INTO atm_transaction (date,time,t_id,acc_no,account_type,t_amount,t_balance,t_type) 
      values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,$tran_id,$acc_no,'current',$t_amount,$t_balance,'debit')");
  }
}


function trans_saving_dep($t_type,$tran_id, $acc_no, $t_amt, $balance){
}

function trans_saving_with($t_type,$tran_id, $acc_no, $t_amt, $balance){
}
