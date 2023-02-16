<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="form-container">
    <form id="form" action="register_request.php" method="post">
      <div class="input-group">
        <input type="text" name="username" required placeholder="Enter User Name">
      </div>
      <div class="input-group">
        <input type="password" name="password" required placeholder="Enter Password">
      </div>
        <div class="input-group">
      <div class="input-group">
        <input type="submit" name="login_btn" class="btn" value="REGISTER">
      </div>
    </form>
  </div>
</body>

</html>