<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>Dobrodosli na stranicu!</h2>
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

<?php include("includes/footer.php");?>

</body>
</html>