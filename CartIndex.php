	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/indexStyle.css?<?=filemtime("css/indexStyle.css")?>" rel="stylesheet" type="text/css" />
		<link href="css/cartStyle.css?<?=filemtime("css/cartStyle.css")?>" rel="stylesheet" type="text/css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
		<title>HuddersMart</title>
	</head>
	<body>
	<?php include('header.php'); $grandTotal=0;?>

		<!-- Shopping Cart Container --> 
		<div class="mainContainer">
			<h2>Shopping Cart</h2>
			  	<div class="cartContainer">

				  <!-- Table Container -->
					<div class="containerTable1">
						<table class="table">
							<thead>
									<tr>
										<th class="Product">Product</th> 
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
										<th> </th>
									</tr>
							</thead>
							<tbody>
								<?php
								if(isset($_SESSION['email'])){
								$userid=$_SESSION['USERID'];
								$sql="SELECT * FROM CART_ORDER WHERE CUSTOMERID='$userid' "; 
								$qry=oci_parse($conn, $sql);
								oci_execute($qry);
								
								while($row=oci_fetch_array($qry, OCI_ASSOC)){
								?>
								<tr id="tbodySeperator">
									<td><?php $src= $row['PRODUCTIMGNAME'];?> 
									<img src="img/<?php echo $src ?>"></td>
									<td><?php echo $row['PRODUCTPRICE'];?></td>
									<td><?php echo $row['QUANTITY'];?></td>
									<?php
									$price=(float)$row['PRODUCTPRICE'];
									$qty=(float)$row['QUANTITY'];
									$total=$price*$qty;
									$grandTotal=$grandTotal+$total;
									$_SESSION['grandTotal']=$grandTotal;
									?>
									<td><?php echo $total ?></td>
									
									<td><form action="removeCart.php" method="POST"><button Id="table1RemoveBtn" name="removeBtn">Remove</button>
										<input type="hidden" name="productID" value="<?php echo $row['PRODUCTID']; ?>">

									</form>
									 <a href="product.php?id=<?php echo $row['PRODUCTID']?>">
									 	<button Id="table1RemoveBtn">Update</button>
									 </a>
									</td>
								</tr>
							<?php } 
						} else 
						{
							echo'<script>alert("Please Login First")</script>';
							echo'<script>window.location="index.php"</script>';
						}?>
								 
							</tbody>
							
						</table> 
					</div> 
				<!--  -->
				<div class="containerTable2">
					<div class="table2Box" id='table2Box'>
						<h1 class="summaryTitle">Final Summary</h1> <br> 
						<p class="summaryTotal">Cart Total $ : <?php echo $grandTotal ?></p><br>
						<input type="checkbox" class="summaryCheckbox">
						<label for="checkbox">I Agree to the Term And Condition.</label><br><br> 
						<form method="POST" action="checkout.php"><button class="summaryButton" >CheckOut</button></form>
						<form method="POST" action="customerViewOrder.php"><button class="summaryButton">View Order</button></form>


						
					</div>
				</div> 
			  </div>
		</div>
		<?php include('footer.php'); ?>
	</body>
	</html>