<?php
include('init.php');
if(isset($_POST['txt_login']))
{
	$lv_email=$_POST['txt_email'];
	$lv_password=$_POST['txt_password'];
	$lv_account=$_POST['accountType'];
	$error="";

	$sql=oci_parse($conn, "SELECT * FROM users where Email='$lv_email' AND Password='$lv_password' AND accountType='$lv_account'");
	oci_execute($sql);
	if($row=oci_fetch_assoc($sql))
	{
		$_SESSION['email']=$lv_email;
		$_SESSION['USERID']=$row['USERID']; 
		$_SESSION['fname']=$row['FIRSTNAME'];
		$_SESSION['lname']=$row['LASTNAME'];
		$_SESSION['password']=$row['PASSWORD'];
		$_SESSION['address']=$row['ADDRESS'];
		$_SESSION['phoneno']=$row['PHONENUMBER'];
		$_SESSION['status']=$row['STATUS'];
		$_SESSION['accounttype']=$row['ACCOUNTTYPE'];
		if($lv_account=='customer')
		{
			header('Location:index.php');
		}
		else if($lv_account=='trader')
		{
			header('Location:traderIndex.php');
		}
		else{
			header('Location:adminIndex.php'); 
		}
	}
	else 
	{
		echo'<script>alert("Invalid Login Credentials !!!")</script>';
			echo'<script>window.location="index.php"</script>';
	}

}


?>