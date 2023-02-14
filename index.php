<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link rel="stylesheet" href="css/style.css">
</head>
`

<body>
  <header>
    <h1 class="login-title">PHP Lanaco Projekat</h>
  </header>

  <div class="form-container">
    <form id="form" action="login_request.php" method="post">
      <div class="input-group">
        <input type="text" name="username" required placeholder="Enter User Name">
      </div>
      <div class="input-group">
        <input type="password" name="password" required placeholder="Enter Password">
      </div>
      <div class="input-group">
        <input type="submit" name="login_btn" class="btn" value="Log in">
      </div>

      <div class="input-group">
        <p>Ako nemate nalog <a href="register.php">Registruj se!</a></p>
      </div>
    </form>
  </div>

</html>