<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/searchStyle.css?<?=filemtime("css/searchStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title>Category</title>
</head>
<body>
	<?php include('header.php');
	if(isset($_POST['catSubmit']))
	{
		$lv_productType=$_POST['catSubmit']; 
		$sql="SELECT * FROM PRODUCT WHERE PRODUCTTYPE='$lv_productType'"; 
		$qry=oci_parse($conn, $sql);
		oci_execute($qry);

		while ($row=oci_fetch_array($qry, OCI_ASSOC)) 
		{ ?>
			<div class="mainContainer">
		<div class="productBox">
			<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
			<?php $src=$row['PRODUCTIMGNAME'] ?>
			<div class="productImg"><img src="img/<?php echo $src ?>"></div>
			<div class="productDescription"><?php echo $row['PRODUCTDESCRIPTION']?></div>
			<div class="productPrice">£ <?php echo $row['PRODUCTPRICE']?></div>
			<div class="addToCart"><button>Add to Cart</button><a href="product.php?id=<?php echo $row['PRODUCTID']?>"><button>Open Product</button></a></div>
		</div>
		</div>				
		<?php }
	} 
	 include('footer.php');?>
</body>
</html>