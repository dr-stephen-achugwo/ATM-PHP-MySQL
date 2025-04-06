<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ACCOUNT TYPE</title>
  <link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>
<body>
  <?php include "Sky_Header.php" ?>
  <main class="skydiv">
    <h1 class="atmpay">Deposit Cash</h1>
    <form action="Deposit_Cash_Savings.php"><button type="submit" name="Savings">SAVINGS ACCOUNT</button></form>
    <form action="Deposit_Cash_Current.php"><button type="submit" name="Current">CURRENT ACCOUNT</button></form>
    <form action="Select_Service.php"><button id="greenbg" type="submit">SELECT SERVICE</button></form>
    <form action="Logout.php"><button id="redbg" type="submit">LOGOUT</button></form>
  </main>
  <?php include "Sky_Footer.php" ?>
</body>
</html>