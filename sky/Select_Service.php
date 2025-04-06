<?php
	session_start();

  if ($_SESSION==false) {
      echo '<script>window.location.href = "Login.php";</script>';
      exit();
  }
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Select_Service</title>
    <link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
	<link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>

<body>
 	<?php include "Sky_Header.php" ?>

  <main class="skydiv">
    <?php
      $conn=mysqli_connect('localhost','root','','atm');
      $sql="select * from customer where c_id=(select c_id from account_details where acc_no='$_SESSION[db_usr]');";
      $result=mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
          echo "<div style='margin-top:20px'><h2>Welcome <span style='color:#00A;'>". $row["c_fname"] ." ".$row["c_lname"] . " </span><br> to Sky Bank ATM</h2></div>";
        }
      } 
    ?>

    <h2 class="atmpay"><em>Select a Service</em></h2>

    <form action="Withdraw_Cash.php"><button type="submit" name="Withdraw">WITHDRAW CASH</button></form>
    <form action="Deposit_Cash.php"><button type="submit" name="Deposit">DEPOSIT CASH</button></form>
    <form action="Acc_Balance.php"><button type="submit" name="Balance">ACCOUNT BALANCE</button></form>
    <form action="Bank_Statement.php"><button type="submit" name="Bank_Statement">BANK STATEMENT</button></form>
    <form action="Change_Pin.php"><button type="submit" name="Change_Pin">CHANGE PIN</button></form>
    <form action="Logout.php"><button id="redbg" type="submit">LOGOUT</button></form>
  </main>

  <?php include "Sky_Footer.php" ?>
</body>
</html> 