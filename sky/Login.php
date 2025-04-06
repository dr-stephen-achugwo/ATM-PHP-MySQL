<html>
<head>
	<title>Login</title>
	<script type='text/javascript' src='authenticate.js'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style/uitheme.css">
	<link rel="shortcut icon" href="../media/sky.png" type="image/x-icon"/>
</head>

<body>
  <?php include "Sky_Header.php" ?>

  <main class="skydiv">
    <h2 style='font-family:cursive; color:#00A;'><em>enter your Account Details</em></h2>
       
    <form action="Authenticate.php" method="POST" class="box">
      <input name="username" type="text" placeholder="Account Number" required><br>
      <input name="password" type="password" placeholder="ATM PIN" required><br>
      <button type="submit">LOGIN</button><br>
      <button type="reset">RESET</button><br>
    </form>

    <form action="index.php" method="GET">
      <button type="submit" id="redbg">SKYHOME</button>
    </form>
  </main>
  
  <?php include "Sky_Footer.php" ?>
</body>
</html>