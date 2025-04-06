<?php
session_start();
if ($_SESSION===false) {
    echo '<script language="javascript">window.location.href = "Login.php";</script>';
    exit();
}?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank_Statement</title>
  <link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
  <link rel="stylesheet" type="text/css" href="../style/Bank_Statement.css">
</head>

<body>
  <?php include "Sky_Header.php" ?>

  <main class="skydiv">
	<?php
	  $conn=mysqli_connect('localhost','root','','atm');
	  $sql="select * from transaction where acc_no='$_SESSION[db_usr]' order by t_id DESC";
	  $result=mysqli_query($conn,$sql);

	  if (mysqli_num_rows($result)>0) {
	  	$i=0;
	  	echo "<h1 class='atmani'>Bank Statement</h1>";
	  	echo "<p class='say'>showing a range of 1 to 8 Last Transactions</p>";
	  	echo "<table id='tab'>
	  	  <tr>
	  	    <th>Date</th>
	  	    <th>Time</th>
	  	    <th>Transaction Number</th>
	  	    <th>Account Number</th>
	  	    <th>Account Type</th>
	  	    <th>Amount</th>
	  	    <th>Balance</th>
	  	    <th>Transaction Type</th>
	  	  </tr>";

	  	  while($row=mysqli_fetch_assoc($result)) {
	  	    if($i<8) {	
		      echo "
		     	<tr>
		     	<td>".$row["date"]."</td>
		     	<td>".$row["time"]."</td>
		     	<td>".$row["t_id"]."</td>
		     	<td>".$row["acc_no"]."</td>
		     	<td>".$row["account_type"]."</td>
		     	<td>".$row["t_amount"]."</td>
		     	<td>".$row["t_balance"]."</td>
		     	<td>".$row["t_type"]."</td>
		     	</tr>";
		      $i++;
		    }
		  }
	  	echo "</table>";

	  	echo "<button onclick='window.print();'>PRINT THIS PAGE</button>";
	  	echo "<form action='Select_Service.php'>
		  <button type='submit' id='greenbg'>SELECT SERVICE</button></form>";
	  	echo "<form action='Logout.php'>
	  	  <button type='submit' id='redbg'>LOGOUT</button></form>";
	  }	
	  else {
	    echo "<h2>ACCOUNT STATEMENT</h2>";
	    echo "<h2 class='atmpay'><em>there are no recent Transactions</em></h2>";
	    echo "<form action='Select_Service.php'>
	    	<button type='submit'>SELECT SERVICE</button></form>";
	    echo "<form action='Logout.php'>
	    	<button type='submit' id='redbg'>LOGOUT</button></form>";
	  }
	?>
  </main>
  
  <?php include "Sky_Footer.php" ?>
</body>
</html> 