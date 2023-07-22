<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/productStyle.css?<?=filemtime("css/productStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title>Product</title>
</head>
<body>
	<?php
	include('header.php');
	$id="";
	if(isset($_GET['id']))
	{
		$id=$_GET['id']; 
		$_SESSION['productId']=$_GET['id'];
		$reviewsql=oci_parse($conn, "SELECT * FROM REVIEW WHERE PRODUCTID=$id");
		oci_execute($reviewsql);

	} 
	$sql=oci_parse($conn, "SELECT * FROM product where PRODUCTID=$id");
	oci_execute($sql);
	?>
	<?php $row=oci_fetch_array($sql, OCI_ASSOC) ?>
	<div class="mainContainer">
		<div class="imageBox">
			<?php $src=$row['PRODUCTIMGNAME'] ?>
					<img src="img/<?php echo $src; ?>" />
		</div>
		<div class="productDescription">
			<form method="POST" action="addToCart.php">
			<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
			<div class="desc"><?php echo $row['PRODUCTDESCRIPTION'];
			?></div>
			<br>
			<hr style="background-color: grey;">
			<div class="price">£ <?php echo $row['PRODUCTPRICE']?></div>
			<div class="rating">Available Stock: <?php echo $row['QUANTITY']?></div>
			<div class="shop">Sold By: Thomas Sausages</div>
			<div class="brand">Brand: <?php echo $row['PRODUCTBRAND']?></div>
			<div class="quantity">Quantity: <input type="text" name="qty" value="1"></div>

			<input type="hidden" name="productID" value="<?php echo $row['PRODUCTID']?>">
			<input type="hidden" name="productImgName" value="<?php echo $row['PRODUCTIMGNAME']?>">
			<input type="hidden" name="productName" value="<?php echo $row['PRODUCTNAME']?>">
			<input type="hidden" name="productPrice" value="<?php echo $row['PRODUCTPRICE']?>">
			<input type="hidden" name="sellerID" value="<?php echo $row['SELLERID']?>">
			<input type="hidden" name="shopID" value="<?php echo $row['SHOPID']?>">
			<?php if (isset($_SESSION['update'])) {
				?><button name="updateCart">Update Cart</button>
				<?php 
			} else { ?>
			<button name="addtocart">Add to Cart</button> <button>Add to Wishlist</button>
			<?php } ?>
			</form>
		</div>
		 
	</div>
	<div class="Review">
			<h1>Reviews</h1><br>
			<?php
			if($reviewsql){
				$i=1;
				while($row=oci_fetch_assoc($reviewsql) and $i<5){
					?>
					<li id="reviewTrader"><?php  

					$traderid=$row['CUSTOMERID'];
					$tradersql="SELECT * FROM USERS WHERE USERID=$traderid";
					$traderqry=oci_parse($conn,$tradersql);
					oci_execute($traderqry); 
					while($trow=oci_fetch_assoc($traderqry)){
						echo $trow['FIRSTNAME'].' '.$trow['LASTNAME'];

					}
					
					?></li>
					<li id="reviewMsg"><?php echo $row['REVIEWDETAILS']?></li>
					<?php
					$i=$i+1; 
				}
			}  
			if(isset($_SESSION['USERID'])){
			?>
			<form action="reviewProduct.php" method="POST"> 
				<input type="text" id="reviewInbox" name="msg"><input type="submit" Id="reviewbutton" name="saveReview" value="Send Review"> 
			</form>
			<?php
		}
		?>
		</div>
		<?php
	include('footer.php');
	?>
</body>
</html>