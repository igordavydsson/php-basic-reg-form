# Features

- Integrated connection with MySQL DB
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
- After successful registration / login user session is initialized
- Access to user account page (`/home.php`) only for authorized users, i.e. only with initialized session
- Logout link effectively closes the previously initialized session

# Usage

1. Update the `db.php` with your MySQL specs (host, username and password)
2. Database `phpRegLoginExp` with a table `users` will be created automatically
3. Go to `index.php` for login or `register.php` to register
4. Change `home.php` to your liking or develop the project further according to your needs
