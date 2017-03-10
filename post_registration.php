<?php
// define variables and set to empty values
$emailErr = $pswdErr = $confirmPswdErr = "";
$email = $pswd = $confirmPswd = "";

// function to be used to secure input from hacks
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["password1"])) {
    $pswdErr = "Password is required";
  } else {
    $pswd = test_input($_POST["password1"]);
  }

  if (empty($_POST["password2"])) {
    $confirmPswdErr = "Please, confirm your password";
  } else {
    $confirmPswd = test_input($_POST["password2"]);
  }

  if($_POST['password1'] != $_POST['password2']) {
    $confirmPswdErr = 'Passwords should be the same';
  }

  if ((empty($emailErr) == TRUE) && (empty($pswdErr) == TRUE) && (empty($confirmPswdErr) == TRUE)) {
    require_once __DIR__ . '/db.php';

    // sql to register user
    $hashed_password = password_hash($pswd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, password) VALUES
    ( '" . $email . "','" . $hashed_password . "')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
        session_start();
        $_SESSION['email'] = $email;
        header("Location: http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/home.php");
        $conn->close();
        exit();
    } else {
        echo "Error during registration: " . $conn->error;
    }

    $conn->close();
  }
}
?>
