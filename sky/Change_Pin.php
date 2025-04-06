<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change_Pin</title>
  <link rel="shortcut icon" type="image/x-icon" href="../media/sky.png">
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>

<body>
  <?php include "Sky_Header.php" ?>

  <main class="skydiv">
    <h2 class="atmpay"><em>change your ATM PIN</em></h2>

    <form method="POST" action="Change_Pin_Check.php" class="box">
      <input type="password" name="oldpin" placeholder="enter Old PIN" required><br>
      <input type="password" name="write_newpin" placeholder="enter New PIN" required><br>
      <input type="password" name="rewrite_newpin" placeholder="re-enter New PIN" required><br>
      <button type="submit">CHANGE ATM PIN </button>
    </form>

    <form method="get" action="Select_Service.php">
      <div class="btnbox">
        <button type="submit" id="greenbg">SELECT SERVICE</button></div></form>
    <form method="get" action="Logout.php">
      <div class="btnbox">
        <button type="submit" id="redbg">LOGOUT</button></div></form>
  </main>
  
  <?php include "Sky_Footer.php" ?>
</body>
</html>