<?php 
include('init.php');
$email=$_SESSION['registerEmail'];
$Register="Dear ".$_SESSION['registerFName']." ".$_SESSION['registerLName'].", You Are Registered In Hudder's Mart With This ".$email." Email Address" ;
	include('smtp/PHPMailerAutoload.php');
	echo smtp_mailer( $email,'Huddersmart Registration',$Register); 

	function smtp_mailer($to,$subject, $msg){
		$mail = new PHPMailer(); 
		//$mail->SMTPDebug=3;
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587; 
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Username = "huddersmart@gmail.com";
		$mail->Password ='Vishal@1';
		$mail->SetFrom("huddersmart@gmail.com");
		$mail->Subject = $subject;
		$mail->Body =$msg;
		$mail->AddAddress($to);
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if(!$mail->Send()){
			echo $mail->ErrorInfo;
		}
        else {
			echo'<script>window.location="index.php"</script>';
		}
	}  
?>