<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="shortcut icon" href="../media/sky.png" type="image/x-icon"/>
  <link rel="stylesheet" type="text/css" href="../style/uitheme.css">
</head>

<body>
  <?php include "Sky_Header.php" ?>

  <main class="skydiv">
    <h3 class="atmpay">Invalid Account Number or ATM PIN</h3>
    <h2 class="atmani"><em>Please enter your Account Details</em></h2>

    <form action="Authenticate.php" method="POST" class="box">
      <div class="inputbox"><input name="username" type="text" placeholder="enter Account Number"></div>
      <div class="inputbox"><input name="password" type="password" placeholder="enter ATM PIN"></div>
      <div class="btnbox"><button type="submit">LOGIN</button></div>
    </form>

    <form action="index.php"><button id= "redbg" type="submit">SKYHOME</button></form>
  </main>
  
  <?php include "Sky_Footer.php" ?>
</body>
</html>