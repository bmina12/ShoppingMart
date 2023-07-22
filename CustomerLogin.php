<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/style.css?<?=filemtime("css/style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="loginContainer">
	<div class="container1">
		<div class="logo"><img src="img/logo.png"></div>
		<form class="loginForm">
			<label for="txt_username" class="login_label">Username</label><br>
			<input type="text" name="txt_username" class="login_input"><br><br>
			<label for="txt_password" class="login_label">Password</label><br>
			<input type="password" name="txt_password" class="login_input"><br><br>
			
			<label for="cars" class="login_label">User Type</label><br>
			<select id="accountType" name="accountType" class="login_input">
  				<option value="customer">Customer</option>
  				<option value="trader">Trader</option>
  				<option value="admin">Admin</option>
			</select><br><br>
			<input type="submit" name="txt_login" value="Sign In" class="login_submit">
			<div class="register_here">
			<h6>Don't have an account ? <span style="text-decoration: none;"><a href="#">Click here</a></span> </h6>
			</div>
		</form>

	</div>

</div>
</body>
</html>