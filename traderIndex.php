<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/traderStyle.css?<?=filemtime("css/traderStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="css/traderIndexStyle.css?<?=filemtime("css/traderIndexStyle.css")?>" rel="stylesheet" type="text/css" />
    <title>Trader</title>
</head>
<body>
    <!-- Header -->
    <?PHP 
    include('traderheader.php');
	$sql=oci_parse($conn, "SELECT * FROM product");
	oci_execute($sql);

	$rsql=oci_parse($conn, "SELECT * FROM product order by ADDEDDATE DESC");
	oci_execute($rsql);
    ?>
     
<div class="heading">Popular Products</div>
<div class="container1">
		<div class="miniContainer1">
			<?php
			$i=0;
			while($row=oci_fetch_array($sql, OCI_ASSOC) AND $i<4){ 
			?>
			<form action="addToCart.php" method="POST">
			<div class="productBox"><a href="product.php?id=<?php echo $row['PRODUCTID']?>">
				<input type="hidden" name="productID" value="<?php echo $row['PRODUCTID']?>">
				<?php $src=$row['PRODUCTIMGNAME'] ?>
				<img src="img/<?php echo $src; ?>" />
				<input type="hidden" name="productImgName" value="<?php echo $row['PRODUCTIMGNAME']?>">
				<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
				<input type="hidden" name="productName" value="<?php echo $row['PRODUCTNAME']?>">
				<div class="productPrice"><?php echo '£ '.$row['PRODUCTPRICE']?></div></a>
				<input type="hidden" name="productPrice" value="<?php echo $row['PRODUCTPRICE']?>">
				</form>
			</div>
		<?php $i=$i+1;} ?>
		</div>
	</div>
	</div>
	<div class="heading">Recently Added</div>
		<div class="container1">
		<div class="miniContainer1">
		<?php
			$i=0;
			while($row=oci_fetch_array($rsql, OCI_ASSOC) AND $i<4){ 
			?>
			<form action="addToCart.php" method="POST">
			<div class="productBox"><a href="product.php?id=<?php echo $row['PRODUCTID']?>">
				<input type="hidden" name="productID" value="<?php echo $row['PRODUCTID']?>">
				<?php $src=$row['PRODUCTIMGNAME'] ?>
				<img src="img/<?php echo $src; ?>" />
				<input type="hidden" name="productImgName" value="<?php echo $row['PRODUCTIMGNAME']?>">
				<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
				<input type="hidden" name="productName" value="<?php echo $row['PRODUCTNAME']?>">
				<div class="productPrice"><?php echo '£ '.$row['PRODUCTPRICE']?></div></a>
				<input type="hidden" name="productPrice" value="<?php echo $row['PRODUCTPRICE']?>">
				</form>
			</div>
		<?php $i=$i+1;} ?>

		</div>
	</div>
    <?PHP
    include('footer.php'); 
     ?>
    
</body>
</html>