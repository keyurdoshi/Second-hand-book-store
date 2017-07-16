<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body><center>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <button onclick="window.location.href='webapp.php'">BookDB</button>
      <button onclick="window.location.href='userdb.php'">UserDB</button>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </center></body>
   
</html>