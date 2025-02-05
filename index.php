<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>login System by OOP PHP</title>
</head>
<body>
  <a href="app/includes/logoutInc.php" class="logout">signout</a>
  <div class="container">
    <div class="welcome-section">
      <h1>welcome, name</h1>
    </div>
  </div>
  <div class="container">
    <div class="section">
      <div class="box signup">
        <form action="app/includes/signupInc.php" method="post">
          <input type="text" name="uid" placeholder="User name">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwdRepeat" placeholder="Repeat Password">
          <input type="email" name="email" placeholder="E-mail">
          <button type="submit" name="submit">signup</button>
        </form>
      </div>
      <div class="divisor"></div>
      <div class="box login">
        <form action="app/includes/loginInc.php" method="post">
          <input type="text" name="uid" placeholder="User name">
          <input type="password" name="pwd" placeholder="Password">
          <button type="submit" name="submit">login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>