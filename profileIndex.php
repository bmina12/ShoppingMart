 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/profileStyle.css?<?=filemtime("css/profileStyle.css")?>" rel="stylesheet" type="text/css" />
     <title>Document</title>
 </head>
 <body>
     <!-- Header  -->
	<?php  
	include('header.php');  
    ?> 
    <!-- Main Content -->  
    <div Id="mainContent">
            
        <div Id="contentHeader"><h1>Edit Profile</h1></div>
        <div Id="contentBody"> 
            <div Id="profile-Img">
                <img src="./img/abc.jpg" alt="No Image Found"> 
            </div>
            <div Id="profile-Details">
                <h1 id="profile-Title">Welcome <?php echo $_SESSION['fname'];?> !</h1>
                <form class="updateDetails" action="updateProfile.php" method="POST"> 
                    <div class="lb-Block"> 
                        <label for="edit_Email" class="edit_label">Email</label><br>
                        <input type="text" name="edit_Email" value= "<?php echo $_SESSION['email'];?> " class="edit_input"> 
                        <input type="hidden" value= "<?php echo $row['USERID'];?> " name="edit_Id">
                         
                    </div>
                    <div class="lb-Block"> 
                        <label for="edit_Fname" class="edit_label">Firstname</label><br>
                        <input type="text" name="edit_Fname" value= "<?php echo $_SESSION['fname'];?>" class="edit_input">
                    </div> 
                    <div class="lb-Block"> 
                        <label for="edit_Lname" class="edit_label">Lastname</label><br>
                        <input type="text" name="edit_Lname" value= "<?php echo $_SESSION['lname'];?>" class="edit_input">
                    </div> 
                    <div class="lb-Block"> 
                        <label for="edit_Address" class="edit_label">Address</label><br>
                        <input type="text" name="edit_Address" value= "<?php echo $_SESSION['address'];?>" class="edit_input">
                     </div> 
                    <div class="lb-Block"> 
                        <label for="edit_Phone" class="edit_label">Phone Number</label><br>
                        <input type="text" name="edit_Phone" value= "<?php echo $_SESSION['phoneno'];?>" class="edit_input">
                    </div> 
                    <div class="lb-Block"> 
                        <label for="edit_password1" class="edit_label">Password</label><br>
                        <input type="text" name="edit_password1" value= "<?php echo $_SESSION['password'];?>" class="edit_input">
                    </div> 
                    <div class="lb-Block"> 
                        <label for="edit_password2" class="edit_label">Confirm Password</label><br>
                        <input type="password" name="edit_password2" value= "<?php echo $_SESSION['password'];?>" class="edit_input">
                    </div> 
                    <div class="input-Block"> 
                        <input type="submit" name="profileUpdate" value="Save Changes" class="login_submit">
                    </div> 
                </form> 
            </div>
        </div> 
    </div>
    <!-- Footer -->
    <?php
	include('footer.php');
	?>
     
 </body>
 </html>