<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select_Account_Type</title>
  <link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>

<body>
  <header class="topsky">
  	<?php include"Sky_Header.php" ?>
  </header>

  <main class="skydiv">
    <h1 class="atmpay">Withdraw Cash</h1>

    <form action="Withdraw_Cash_Savings.php">
      <button type="submit" name="Savings">SAVINGS ACCOUNT</button></form>
    <form action="Withdraw_Cash_Current.php">
      <button type="submit" name="Current">CURRENT ACCOUNT</button></form>

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
