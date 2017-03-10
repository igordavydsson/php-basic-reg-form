<?php
  require __DIR__ . "/post_login.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
  </head>
  <body>
    <h2>Login form:</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span><br>
    Password: <input type="password" name="password" value="<?php echo $pswd;?>">
    <span class="error"><?php echo $pswdErr;?></span><br>
    <input type="submit">
    </form>

    <h3>Have not registered yet? Go here to <a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/register.php"?>">register</a></h3>

  </body>
  <style>
    .error {
      color: red;
    }
  </style>
</html>
