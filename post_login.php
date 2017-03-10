<?php
// define variables and set to empty values
$emailErr = $pswdErr = "";
$email = $pswd = "";

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

  if (empty($_POST["password"])) {
    $pswdErr = "Password is required";
  } else {
    $pswd = test_input($_POST["password"]);
  }

  if ((empty($emailErr) == TRUE) && (empty($pswdErr) == TRUE)) {
    require_once __DIR__ . '/db.php';

    // secure the user input
    $useremail = $conn->real_escape_string($email);
    $userpassword = $conn->real_escape_string($pswd);

    $sql = "SELECT * FROM users WHERE email = '$useremail'";

    $result = $conn->query($sql);
    $num_rows = $result->num_rows;

    // check if queryset returned the user
    if ($num_rows != 1) {
      $emailErr = "No such email registered";
    } else {
      // proceed to password verification
      $user = $result->fetch_array(MYSQLI_ASSOC);

      $hashed_password = $user['password'];
      if ( password_verify ( $userpassword , $hashed_password )) {
        if ( password_needs_rehash($hashed_password , PASSWORD_DEFAULT)) {
          /* recreate the hash */
          $rehashed_password = password_hash($pass, PASSWORD_DEFAULT );
          /* store the rehashed password in MySQL */
          $sql = "UPDATE users SET password = '$rehashed_password' WHERE email = '$useremail'";
          $result = $conn->query($sql);
          $pswdErr = "Password needed to be rehashed. Please, try again";
        }
        /* password verified, let the user in */
        session_start();
        $_SESSION['email'] = $useremail;
        header("Location: http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/home.php");
        $conn->close();
        exit();
      }
      else {
        /* password not verified, tell the intruder to get lost */
        $pswdErr = "Wrong password! Please, try again";
      }
    }
    $conn->close();
  }
}

?>
