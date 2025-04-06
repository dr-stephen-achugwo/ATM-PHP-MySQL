<!--deposit cash-->
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Savings_Account_Deposit</title>
	<script type='text/javascript' src='IDGen.js'></script>
	<link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>

<body>
  <?php include "Sky_Header.php" ?>
  
  <main class="skydiv">
    <h2 class="atmani">SAVINGS ACCOUNT</h2>
    <h2 class="atmpay"><em>enter the Amount to Deposit</em></h2>
    
    <form method="POST" action="Deposit_Check_Savings.php">
      <input name="amount" type="number" step="100" min="100" max="100000000" placeholder="Amount" required><br>
      <button type="submit" >DEPOSIT</button><br>
      <button type="reset" id="greybg">RESET</button><br>
    </form>

    <form action="Select_Service.php"><button type="submit" id="greenbg">SELECT SERVICE</button></form>
    <form action="Logout.php"><button type="submit" id="redbg">LOGOUT</button></form>
  </main>
  
  <?php include "Sky_Footer.php" ?>
</body>
</html>