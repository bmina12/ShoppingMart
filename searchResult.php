<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/searchStyle.css?<?=filemtime("css/searchStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title>Results</title>
</head>
<body>
	<?php
	include('header.php');   
	$search = isset($_POST['searchSubmit']) ? htmlspecialchars($_POST['txtSearch']) : $_POST['txtHiddenSearch'] ;
	?>
 
	<div class="pageHeading"><h5>Searched Results</h5>
	<form method="POST" action="">
		<label for="txtSort">Sort by Price:</label>
		<input type="hidden"name="txtHiddenSearch" value="<?php echo $search ?>">
		<select name="txtSort" id="txtSort">
			<option value="">None</option>
			<option value="Ascending">Price low to high</option>
			<option value="Descending">Price high to low</option>
		</select>
		<input type="submit" name="sortSubmit">
	</form> 
	</div>

	<div class="mainContainer">
		<?php
		/*if(isset($_POST['txtSort']))
		{
			$lv_order=$_POST['txtSort'];
			if($lv_order=='none')
			{
				$sql=
			}
		}*/

	if(isset($_POST['searchSubmit']))
	{
		$lv_search=$_POST['txtSearch']; 
		$sql="SELECT * FROM PRODUCT WHERE UPPER(PRODUCTNAME) LIKE UPPER('%$lv_search%')"; 
		$qry=oci_parse($conn, $sql);
		oci_execute($qry);

		while ($row=oci_fetch_array($qry, OCI_ASSOC)) 
		{ ?>
		<div class="productBox">
			<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
			<?php $src=$row['PRODUCTIMGNAME'] ?>
			<div class="productImg"><img src="img/<?php echo $src ?>"></div>
			<div class="productDescription"><?php echo $row['PRODUCTDESCRIPTION']?></div>
			<div class="productPrice">£ <?php echo $row['PRODUCTPRICE']?></div>
			<div class="addToCart"><button>Add to Cart</button><a href="product.php?id=<?php echo $row['PRODUCTID']?>"><button>Open Product</button></a></div>
		</div>			
		<?php }
	} 
	if(isset($_POST['txtSort']))
	{ 
		$short = $_POST['txtSort'];
		$hiddensearch=$_POST['txtHiddenSearch']; 
		if($_POST['txtSort']=="Ascending") {
			$sql="SELECT * FROM PRODUCT WHERE UPPER(PRODUCTNAME) LIKE UPPER('%$hiddensearch%') order by productprice ASC";
		} 
		else if ($_POST['txtSort']=="Descending") {
			$sql="SELECT * FROM PRODUCT WHERE UPPER(PRODUCTNAME) LIKE UPPER('%$hiddensearch%') order by productprice DESC";
		} 
		else
		{
			$sql="SELECT * FROM PRODUCT WHERE UPPER(PRODUCTNAME) LIKE UPPER('%$hiddensearch%') ";
		}

		$qry=oci_parse($conn, $sql);
		oci_execute($qry);

		while ($row=oci_fetch_array($qry, OCI_ASSOC)) 
		{ ?>
		<div class="productBox">
			<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
			<?php $src=$row['PRODUCTIMGNAME'] ?>
			<div class="productImg"><img src="img/<?php echo $src ?>"></div>
			<div class="productDescription"><?php echo $row['PRODUCTDESCRIPTION']?></div>
			<div class="productPrice">£ <?php echo $row['PRODUCTPRICE']?></div>
			<div class="addToCart"><button>Add to Cart</button><a href="product.php?id=<?php echo $row['PRODUCTID']?>"><button>Open Product</button></a></div>
		</div>			
		<?php 
		} 
	}   
	?>
		
	</div>



	<?php
	include('footer.php');
	?>
</body>
</html>