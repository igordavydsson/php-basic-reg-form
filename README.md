# Features

- Register / login with email and password
- Input protected from SQL injections
- Password is hashed with PHP's `password_hash()` function
- Email format validation at registration and login
- Displays errors if:
  * email format is wrong
  * email has not yet been registered (upon logging in)
  * password is incorrect (upon logging in)

# Usage
