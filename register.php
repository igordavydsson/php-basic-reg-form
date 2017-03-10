<?php
  require __DIR__ . "/post_registration.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration Form</title>
  </head>
  <body>
    <h2>Registration form:</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span><br>
    Password: <input type="password" name="password1" value="<?php echo $pswd;?>">
    <span class="error"><?php echo $pswdErr;?></span><br>
    Confirm password: <input type="password" name="password2" value="<?php echo $confirmPswd;?>">
    <span class="error"><?php echo $confirmPswdErr;?></span><br>
    <input type="submit">
    </form>

  </body>
  <style>
    .error {
      color: red;
    }
  </style>
</html>
