<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>login System by OOP PHP</title>
</head>
<body>
  <div class="container">
    <div class="box signup">
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="User name">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd" placeholder="Repeat Password">
        <input type="email" name="email" placeholder="E-mail">
        <button type="submit" name="submit">signup</button>
      </form>
    </div>
    <div class="box login">
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="User name">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">login</button>
      </form>
    </div>
  </div>
</body>
</html>