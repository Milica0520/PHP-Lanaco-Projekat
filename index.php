<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>


<div class="container" id="main-content">

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
<style>
  .form-container {
  display: flex;
  height: 300px;
  justify-content: center;
  align-items: center;
}
#form {
  min-width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #b0c4de;
  background: white;
  border-radius: 10px 10px 10px 10px;
  box-shadow: 20px 20px 50px grey;
}
.input-group {
  margin: 10px 10px 10px 10px;
  text-align: center;
}
.input-group a {
  font-weight: bold;
  color: rgb(29, 136, 244);
  text-decoration: none;
}
.input-group a:hover {
  cursor: pointer;
  color: rgb(20, 97, 175);
  text-decoration-line: underline;
}

.input-group input {
  height: 32px;
  width: 95%;
  padding: 5px 10px;
  font-size: 15px;
  border-radius: 10px;
  border: 1px solid gray;
}
.btn {
  cursor: pointer;
  padding: 12px;
  font-size: 16px;
  color: white;
  background: rgb(29, 136, 244);
  border: none;
  border-radius: 10px;
  align-items: center;
}
.btn:hover {
  background-color: rgb(20, 97, 175);
}
</style>
<?php include("includes/footer.php");?>

</body>
</html>