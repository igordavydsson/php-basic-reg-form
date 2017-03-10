# Features

- Register / login with email and password
- Input protected from SQL and script injections
- Password is hashed with PHP's `password_hash()` function
- Email format validation at registration and login
- Double input of password at registration
- Displays errors if:
  * email format is wrong (at registration and login)
  * second password does not match the first one (at registration)
  * email has not yet been registered (at login)
  * password is incorrect (at login)
- After registration / login user session is initialized
- Access to user account page (`/home.php`) only for authorized users

# Usage
