<?php
include('init.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/headerStyle.css?<?=filemtime("css/headerStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<nav class="navbar">
		<div class="logo">
			<a href="index.php"><img src="img/logo.png"></a>
		</div>
		<div class="searchBar">
			<form class="searchForm" action="searchResult.php" method="POST">
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
			<h6>Don't have an account ?<a href="register.php">Click Here</a></h6>
			 <button type="button" class="btn cancel" id="closeButton" onclick="closeForm()">Close</button>
			</div>
		</form>

	</div>

				<div class="navIcon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
			</div>
		<?php } ?>
			<div class="cart">
				<div class="navIcon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
				<a href="CartIndex.php">My Cart</a>
				<div class="navIcon"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
			</div>
		</div>
		
		<script>
			function openLoginForm()
			{
					document.getElementById("loginFormContainer").style.display = "flex";
			}
			function openRegisterForm()
			{
				document.getElementById("loginFormContainer").style.display = "none";
			}
			function closeForm()
			{
				document.getElementById("loginFormContainer").style.display = "none";
			}
		</script>
		
	</nav>
	<div class="navbar2">
		<ul>
			<li>
				<?php
				$qry2=oci_parse($conn, "SELECT * FROM PRODUCTTYPE");
				oci_execute($qry2);
				while ($row=oci_fetch_array($qry2, OCI_ASSOC)) {
				?>
				<form method="POST" action="catResult.php">
					<input type="hidden" name="PRODUCTTYPE" value="$row['PRODUCTTYPE']">
					<input type="submit" name="catSubmit" value="<?php echo $row['PRODUCTTYPE'] ?>">
				</form>
			<?php } ?>
			</li>
		</ul>
	</div>
</body>
</html>