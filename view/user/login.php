<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | CoderGirl</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <form action="index.php?act=login" method="post">
        <header>Login</header>
        <input type="text" placeholder="Enter your username" name="user_id" value="<?= $user_id ?? '' ?>">
        <span style="color:red">
          <?= $errors['user_id'] ?? '' ?>
        </span>
        <input type="password" placeholder="Enter your password" name="user_password" value="<?= $user_password ?? '' ?>">
        <span style="color:red">
          <?= $errors['user_password'] ?? '' ?>
        </span>
        <input type="submit" class="button" value="Login">
        <div class="signup">
          <span class="signup">Don't have an account?
            <a href="signup.php">Signup</a>
          </span>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>

</html>