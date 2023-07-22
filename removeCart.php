<?php 
include('init.php');
$lv_productID=$_POST['productID'];
$lv_userID=$_SESSION['USERID'];
if(isset($_POST['removeBtn']))
		{
			$selectQuantity="SELECT * FROM PRODUCT WHERE PRODUCTID='$lv_productID'";
			$selectQuantityQry=oci_parse($conn,$selectQuantity);
			oci_execute($selectQuantityQry);
			while($row=oci_fetch_assoc($selectQuantityQry)){
				$qty=$row['QUANTITY']+$_SESSION['cartQty']; 
			}
			$updateStockqry=oci_parse($conn, "UPDATE PRODUCT SET QUANTITY=$qty WHERE PRODUCTID='$lv_productID'");
			oci_execute($updateStockqry);
			$qry=oci_parse($conn, "DELETE FROM CART_ORDER WHERE PRODUCTID='$lv_productID' and CUSTOMERID='$lv_userID'");
			oci_execute($qry);
			if($qry)
			{
				echo'<script>alert("Product successfully removed from your Cart")</script>';
				echo'<script>window.location="index.php"</script>';
			}
			else 
			{
				echo 'error';
			}
		}
		else 
		{
			echo 'not set';
		}
?>