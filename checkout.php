 
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal Payment</title>
    <link href="css/checkoutStyle.css?<?=filemtime("css/checkoutStyle.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
    include('header.php');

    $lv_userid =$_SESSION['USERID'];
    $cartsql="Select C.*,P.PRODUCTPRICE From CART_ORDER C INNER JOIN PRODUCT P ON P.PRODUCTID=C.PRODUCTID Where CUSTOMERID=$lv_userid ";
	$cartqry=oci_parse($conn, $cartsql);
	oci_execute($cartqry); 
    $count=0;
	while($row = oci_fetch_assoc($cartqry)){
        $count +=$row['QUANTITY'];

    }

    if($count>=20){
		echo'<script>alert("Slot Limit Reached Add Less Than 20 Items At A Itme")</script>';
			echo'<script>window.location="CartIndex.php"</script>';
	}
    else{ 

        if(isset($_POST['day'])){
            $_SESSION['day']=$_POST['day'];
            $_SESSION['time']=$_POST['time']; 

        } 
        ?>
        <h1>CheckOut</h1>
        <h4>Select Collection Slot</h4>
        <div class="slot">
            
            <form method="POST" action="checkout.php">
            <label for="day">Day</label>
            <select name="day">
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
            <label for="time">Time</label>
            <select name="time">
                <option value="10:00-13:00">10:00-13:00</option>
                <option value="13:00-16:00">13:00-16:00</option>
                <option value="16:00-19:00">16:00-19:00</option>
            </select>
            <button type="submit" name="saveSlot">Save</button>
        <div id="paypal-payment-button" class="paypal" name="slotSubmit"></div></div>
        </form> 
        <?php include('footer.php');?>
            <script src="https://www.paypal.com/sdk/js?client-id=AdoDvXyPZFxSUk_eRjaa1KgwdLv72XLUXZaO96rfuaVC-_tBUvsP8y4cQUfmKR65bUF_tXZMNXXssyXa&disable-funding=credit,card"></script>
            <script>
                
    paypal.Buttons({
        style:{
            shape:'pill'
        },
        createOrder:function(data,actions)
        {return actions.order.create({
            purchase_units:[{
                amount:{
                    value:'<?php echo $_SESSION['grandTotal'] ?>'
                },
                currency:{
                    value:'GBP'
                }
            }]
        });
    },
    onApprove:function(data,actions)
    {
        return actions.order.capture().then(function(details)
        {
            console.log(details)
            window.location.replace("success.php")
        })
    },
    onCancel:function(data,actions)
    {
        window.location.replace("index.php")
    }
    }).render('#paypal-payment-button');

            </script> 
    <?php
    }
 ?>
</body>
</html>