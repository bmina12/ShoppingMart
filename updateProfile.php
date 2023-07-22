<?php  
    include('traderHeader.php');
    if(isset($_POST['profileUpdate']))
    {
        $lv_UserId=trim($_POST['edit_Id']);
        $lv_email=trim($_POST['edit_Email']);
        $lv_fname=trim($_POST['edit_Fname']);
        $lv_lname=trim($_POST['edit_Lname']);
        $lv_address=trim($_POST['edit_Address']);
        $lv_phone=trim($_POST['edit_Phone']);
        $lv_pw1=trim($_POST['edit_password1']);
        $lv_pw2=trim($_POST['edit_password2']); 
         
        if(trim($lv_pw1)==trim($lv_pw2))
        {
            $sql=oci_parse($conn, "UPDATE users SET Email='$lv_email', FirstName='$lv_fname', LastName='$lv_lname', Password='$lv_pw1', Address='$lv_address', PhoneNumber='$lv_phone' Where USERID='$lv_UserId'");
            oci_execute($sql);
        }
        else{ 
            ?> 
            <script>
                alert('Password Donot Matched');
            </script>
            <?php
        }
        $_SESSION['email']=$lv_email;
		$_SESSION['fname']=trim($_POST['edit_Fname']);
		$_SESSION['lname']=trim($_POST['edit_Lname']);
		$_SESSION['password']=trim($_POST['edit_password1']);
		$_SESSION['address']=trim($_POST['edit_Address']);
		$_SESSION['phoneno']=trim($_POST['edit_Phone']);
        
		header('Location:index.php');
    } 
    
    ?> 