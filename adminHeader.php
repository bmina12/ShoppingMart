<?php
include('init.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/traderHeaderStyle.css?<?=filemtime("css/traderHeaderStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title></title>
</head>
<body> 
	<nav class="navbar">
		<div class="logo">
			<a href="traderIndex.php"><img src="img/logo.png"></a>
		</div>
		<div class="searchBar">
			<form class="searchForm" action="adminSearchResult.php" method="POST">
			<input type="text" name="txtSearch" Id="txtSearchId" class="bar" placeholder="Search items" value="<?php if(isset($_POST['txtSearch'])) echo $_POST['txtSearch']?>">
			<div class="searchIcon"><button name="searchSubmit" type="submit" class="searchButton"><i class="fa fa-search" aria-hidden="true"></i></button></div> </form>

			<?php if(isset($_SESSION['email']))
			{
				?>
				<div class="accountDisplay">
					<div class="navIcon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
						<div class="accountName"> <a href="profileIndex.php">
							<div class="name">
							<?php
							$lv_email=$_SESSION['email'];
							$sql1=oci_parse($conn, "SELECT * FROM USERS WHERE EMAIL='$lv_email' ");
							oci_execute($sql1);
							$row=oci_fetch_array($sql1, OCI_ASSOC);  
							echo $row['FIRSTNAME']." ".$row['LASTNAME'];
							?>
							</div> </a>
							<div class="logout"><a href="logout.php"><i class="fa fa-retweet" aria-hidden="true"></i> Logout</a></div>
						</div>
				</div>
				<?php
			}
			else
			{
			?>

			<div class="signInOption">
			<button onclick="openLoginForm()" class="signInButton">SignIn</button>
			<div class="loginFormContainer" id="loginFormContainer">
			<div class="formLogo"><img src="img/logo.png"></div>
			<form class="loginForm" action="login.php" method="POST">
				<label for="txt_email" class="login_label">Email</label><br>
				<input type="text" name="txt_email" class="login_input"><br><br>
				<label for="txt_password" class="login_label">Password</label><br>
				<input type="password" name="txt_password" class="login_input"><br><br>
				
				<label for="cars" class="login_label">User Type</label><br>
				<select id="loginAccountType" name="accountType" class="login_input">
					<option value="customer">Customer</option>
					<option value="trader">Trader</option>
					<option value="admin">Admin</option>
				</select><br><br>
				<input type="submit" name="txt_login" value="Sign In" class="login_submit">
				<div class="register_here">
				<h6>Don't have an account ?<button onclick="closeForm();openRegisterForm()" id="openButton">Click Here</button></h6>
				<button type="button" class="btn cancel" id="closeButton" onclick="closeForm()">Close</button>
				</div>
			</form> 
		</div> 
		<!-- registration form -->
		<div class="registerFormContainer" id="registerFormContainer">
			<div class="formLogo"><img src="img/logo.png"></div>
			<form class="registerForm" action="register.php" method="POST">
				<label for="txt_Email" class="login_label">Email</label><br>
				<input type="text" name="txt_Email" class="login_input"><br>
				<label for="txt_Fname" class="login_label">Firstname</label><br>
				<input type="text" name="txt_Fname" class="login_input"><br>
				<label for="txt_Lname" class="login_label">Lastname</label><br>
				<input type="text" name="txt_Lname" class="login_input"><br>
				<label for="txt_Address" class="login_label">Address</label><br>
				<input type="text" name="txt_Address" class="login_input"><br>
				<label for="txt_Phone" class="login_label">Phone Number</label><br>
				<input type="text" name="txt_Phone" class="login_input"><br>
				<label for="txt_password1" class="login_label">Password</label><br>
				<input type="password" name="txt_password1" class="login_input"><br>
				<label for="txt_password2" class="login_label">Confirm Password</label><br>
				<input type="password" name="txt_password2" class="login_input"><br>
				<label for="accountType" class="login_label">User Type</label><br>
				<select id="registerAccountType" name="accountType" class="login_input">
					<option value="customer">Customer</option>
					<option value="trader">Trader</option>
					<option value="admin">Admin</option>
				</select><br><br>
				<input type="submit" name="txt_Register" value="Register" class="login_submit">
				<div class="register_here">
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
				</div>
			</form> 
		</div>
				<div class="navIcon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
		</div>
		<?php }?> 
		</div>
		
		<script>
			function openLoginForm() {
					document.getElementById("loginFormContainer").style.display = "flex";
			}
			function openRegisterForm() {
					document.getElementById("registerFormContainer").style.display = "flex";
			}
			function closeForm() {
				document.getElementById("loginFormContainer").style.display = "none";
				document.getElementById("registerFormContainer").style.display = "none";
			}
		</script> 
	</nav>
	<div Id="trader-navbar2">
		<ul>
			<li> 
				<a href="http://localhost:8080/apex/f?p=102:1:5231786464164:::::">Dashboard</a> 
			</li>
		</ul>
	</div>
</body>
</html>