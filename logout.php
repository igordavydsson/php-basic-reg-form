<?php
  session_start();
  session_destroy();

  header("Location: http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
  exit();
?>
