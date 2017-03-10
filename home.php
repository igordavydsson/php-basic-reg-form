<?php
  session_start();

  if (!isset($_SESSION['email'])) {
    header("Location: http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <h1>Welcome to your home page</h1>
    <h3>Your email is: <?php echo $_SESSION['email'] ?></h3>
    <h3>Click here to <a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/logout.php"?>">logout</a></h3>
  </body>
</html>
