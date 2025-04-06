<!--withdraw cash-->
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Withdraw_Money_Savings</title>
	<script type='text/javascript' src='IDGen.js'></script>
	<link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>

<body>
<body>
  <header class="topsky">
  	<?php include"Sky_Header.php" ?>
  </header>

  <main class="skydiv">
    <h2 class="atmani">SAVINGS ACCOUNT</h2>
    <h2 class="atmpay"><em>enter the Amount to Withdraw</em></h2>
    <p>minimum: &#8358;500 || maximum: &#8358;1,000,000</p>

    <form method="POST" action="Withdrawal_Check_Savings.php">
      <div class="inputbox"><input name="amount" type="number" step="500" min="500" max="1000000" placeholder="Amount" required></div>
      <div class="btnbox"><button type="submit">WITHDRAW</button></div>
      <div class="btnbox"><button type="reset" id="greybg">RESET</button></div>
    </form>

    <form action="Select_Service.php">
      <button id="greenbg" type="submit">SELECT SERVICE</button></form>
    <form action="Logout.php">
      <button id="redbg" type="submit">LOGOUT</button></form>
  </main>
  
  <footer class="skybase">
    <?php include"Sky_Footer.php" ?>
  </footer>
</body>
</html>