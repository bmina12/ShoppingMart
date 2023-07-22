<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Success</title>
</head>
<body>
	<?php include('header.php');?>
	<h1>Success</h1>
	<?php 
	// Final Order Insert
	$lv_userid=$_SESSION['USERID'];
	$sql="INSERT INTO FINALORDER(PRODUCTID, PRODUCTNAME, PRODUCTIMGNAME, PRODUCTPRICE, CUSTOMERID, QUANTITY, SELLERID, SHOPID,INVOICENO ) SELECT PRODUCTID, PRODUCTNAME, PRODUCTIMGNAME, PRODUCTPRICE, CUSTOMERID, QUANTITY, SELLERID, SHOPID ,ORDERID FROM CART_ORDER WHERE CUSTOMERID=$lv_userid";
	$qry=oci_parse($conn, $sql);
	oci_execute($qry);

	// Payment Insert
	$cartsql="Select C.*,P.PRODUCTPRICE From CART_ORDER C INNER JOIN PRODUCT P ON P.PRODUCTID=C.PRODUCTID Where CUSTOMERID=$lv_userid ";
	$cartqry=oci_parse($conn, $cartsql);
	oci_execute($cartqry); 
	while($row = oci_fetch_assoc($cartqry)){

		$amount=$row['PRODUCTPRICE'];
		$trader=$row['SELLERID'];
		$productid=$row['PRODUCTID'];
		$invoice= ("".$row['ORDERID']);
		$Paymentsql="INSERT INTO PAYMENT(AMOUNT,TRADER_ID,CUSTOMER_ID,PRODUCT_ID,INVOICENO) VALUES($amount,$trader,$lv_userid,$productid,$invoice)";
		$Paymentqry=oci_parse($conn, $Paymentsql);
		oci_execute($Paymentqry);

		//Collection slot insert
		$day=$_SESSION['day'];
		$time=$_SESSION['time'];
		$OrderDate=date("Y-m-d");
		$sqlupdate="UPDATE FINALORDER SET COLLECTIONDAY='$day',COLLECTIONTIME='$time', ORDERDATE=date'$OrderDate' WHERE INVOICENO=$invoice"; 
		$qryupdate=oci_parse($conn, $sqlupdate);
		oci_execute($qryupdate);
 
		} 

		if($qry)
		{
			$status="Successfull";
		}
		else
		{
			$status="UnSuccessfull";
		}
	echo'<script>window.location="paymentMail.php"</script>'; 
	?> 
</body>
</html>