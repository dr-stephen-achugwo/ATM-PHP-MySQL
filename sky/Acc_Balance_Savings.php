<?php session_start() ?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BALANCE ENQUIRY</title>
  <link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>

<body>
  <?php include "Sky_Header.php" ?>

  <main class="skydiv">
	<?php
	  $conn=mysqli_connect('localhost','root','','atm');
	  $sql="select saving_balance from saving_account where c_id=(select c_id from account_details where acc_no='$_SESSION[db_usr]')";
	  $result=mysqli_query($conn,$sql);

	  if (mysqli_num_rows($result)>0) {
	  	while($row=mysqli_fetch_assoc($result)) {
	  	  echo
	  	  "<div style='margin-top:50px;'>
	  	  	<h2 style='font-family:Tahoma;'>SAVINGS ACCOUNT</h2>
			<h2 style='font-family:cursive;'>Available Balance: <span style='color:red;'>&#8358;" . $row["saving_balance"] . "</span></h2>
	  	  	<h3 style='color:#4AE;'><em>Thank you for Banking with us!</em></h3>
	  	  </div>";
	  	}
	  }
	  else {
        echo '<script>window.location.href = "Login.php";</script>';
        exit();
      } 
	?>

	<form action="Acc_Balance_Current.php"><button type="submit" value="Submit">CURRENT ACCOUNT BALANCE</button></form>
	<form action="Select_Service.php"><button type="submit" value="Submit" id="greenbg">SELECT SERVICE</button></form>
	<form action="Logout.php"><button type="submit" value="Submit" id="redbg">LOGOUT</button></form>
  </main>
    
  <?php include "Sky_Footer.php" ?>
</body>
</html>