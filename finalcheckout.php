<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php include('header.php');?>
	<div id="paypal-payment-button" class="paypal"></div>
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
    window.location.replace("cancel.php")
}
}).render('#paypal-payment-button');

        </script>

        <?php
        if(isset($_POST['slotSubmit']))
        {
            $lv_day=$_POST['day'];
            $lv_time=$_POST['time'];
            $sql="INSERT INTO FINALORDER(COLLECTIONDAY, COLLECTIONTIME) VALUES('$lv_day', '$lv_time')";
            $qry=oci_parse($conn, $sql);
            oci_execute($qry);
        }
        ?>
</body>
</html>