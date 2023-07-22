<?php 
include('init.php');
$invoice='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 

    <style type="text/css" rel="stylesheet" media="all"> 
    .Name{
    margin-top:5vh; 
    margin-left: 30vw;
}
.heading{
    margin-top:2vh; 
    margin-left: 30vw; 
    width: 39vw;
}
.Container{
    margin:0vh; 
    height: 45vh;
    width: 39vw;
    margin-left: 30vw;
    margin-right: 30vw;
    background-color: lightgray;
}
.date{
    float: right;
}
.email{
    margin: 1.5vh; 
    margin-bottom: 0vh;
}
.Phoneno{
    margin: 7.5vh;
    margin-top: 0vh;

}
table{
    border: 1px solid black;
    margin-left: 2.5vw;
    height: 25vh;
}
table thead td{
    text-align: center;
}
table thead td:nth-child(1){
    text-align: center; 
    width: 12vw;
}
table thead td:nth-child(2){ 
    text-align: center;
    width: 5vw;
}
table thead td:nth-child(3){ 
    text-align: center;
    width: 8vw;
}
table thead td:nth-child(4){ 
    text-align: center;
    width: 8vw;
} 
table tbody tr td:nth-child(1){ 
    text-align: center;
    width: 12vw;
}
table tbody tr td:nth-child(2){ 
    text-align: center;
    width: 5vw;
}
table tbody tr td:nth-child(3){ 
    text-align: center;
    width: 8vw;
}
table tbody tr td:nth-child(4){ 
    text-align: center;
    width: 8vw;
}
.totalcontainer{
display: flex;
float: right; 
}
h2{ 
margin-right: 2.5vw;
}
     </style>
</head>
<body>  
    <h1 class="Name">Hello Sanjay</h1>
    <p class="heading">This Is Your Invoice For the Order Id 1234. </p>
    <div class="Container"> 
        <p class="date">Date : <?php echo date("Y-m-d"); ?> </p>
        <p class="email">Huddersmart@gmail.com</p>
        <p class="Phoneno">9823616783</p>
         <table>
             <thead>
                 <td>Product</td>
                 <td>Rate</td>
                 <td>Qty</td>
                 <td>Price</td>
             </thead>
             <tr>
                <td>Food</td>
                <td>200</td>
                <td>2</td>
                <td>400</td>
             </tr>
             <tbody>
             </tbody>
         </table> 
    </div>
</body>
</html>';
	include('smtp/PHPMailerAutoload.php');
	$email=$_SESSION['registerEmail'];
	echo smtp_mailer( $email,'Huddersmart Registration', ( $invoice));
	//"Dear Trader, You Are Registered In Hudder's Mart WithThis ".$email."Whit this Email Address"

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
		}else{  
			 
		}
	}  
?>