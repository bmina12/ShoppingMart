<?php
include('connection.php');
$sql=oci_parse($conn, "SELECT * FROM product");
oci_execute($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/indexStyle.css?<?=filemtime("css/indexStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title>HuddersMart</title>
</head>
<body>
	<?php include('header.php')?>
	<div class="slideshow_container">
		<div class="sliderimage fade">
			<img src="img/banner1.jpg" alt="slideshow img">
		</div>
		<div class="sliderimage fade">
			<img src="img/slider1.png" alt="slideshow img">
		</div>
		<div class="sliderimage fade">
			<img src="img/banner3.jpg" alt="slideshow img">
		</div>
	</div>
	<script type="text/javascript">
		let slideIndex = 0;
		showSlides();

		function showSlides() 
		{
  			let i;
  			let slides = document.getElementsByClassName("sliderimage");
  			for (i = 0; i < slides.length; i++) 
  			{
    			slides[i].style.display = "none";
  			}
  			slideIndex++;
  			if (slideIndex > slides.length) {slideIndex = 1}
  			slides[slideIndex-1].style.display = "block";
  			setTimeout(showSlides, 3000); // Change image every 2 seconds
		}
	</script>
	<div class="heading">Featured Products</div>
	<div class="container1">
		<div class="miniContainer1">
			<?php
			$i=0;
			while($row=oci_fetch_array($sql, OCI_ASSOC) AND $i<4){ 
			?>
			
			<div class="productBox"><a href="product.php?id=<?php echo $row['PRODUCTID']?>">
				<?php $src=$row['PRODUCTIMGNAME'] ?>
				<img src="img/<?php echo $src; ?>" />
				<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
				<div class="productPrice"><?php echo '£ '.$row['PRODUCTPRICE']?></div></a>
				<button><a href="product.php?id=<?php echo $row['PRODUCTID']?>" style="color: #fff;">Add to Cart</a></button>
			</div>
		<?php $i=$i+1;} ?>
		</div>
	</div>

<div class="heading">Mega Deals</div>
	<div class="container2">
		<div class="miniContainer2">

			<?php
			$date=date('d-m-y');
			$date2= date('d-m-y', (strtotime(' -1 month', strtotime($date))));
			$sql2=oci_parse($conn, "SELECT * FROM product WHERE PRODUCTPRICE<70 AND ADDEDDATE>'01-05-22'");
			oci_execute($sql2);
			$i=0;
			while($row=oci_fetch_array($sql2, OCI_ASSOC) AND $i<8){ 
			?>
			
			<div class="productBox"><a href="product.php?id=<?php echo $row['PRODUCTID']?>">
				<?php $src=$row['PRODUCTIMGNAME'] ?>
				<img src="img/<?php echo $src; ?>" />
				<div class="productName"><?php echo $row['PRODUCTNAME']?></div>
				<div class="productPrice"><?php echo '£ '.$row['PRODUCTPRICE']?></div></a>
				<button><a href="product.php?id=<?php echo $row['PRODUCTID']?>" style="color: #fff;">Add to Cart</a></button>
			</div>
		<?php $i=$i+1;} ?>
			
		</div>
	</div>
	<div class="heading">Recently Added</div>
		<div class="container1">
		<div class="miniContainer1">
			<div class="productBox"><a href="#">
				<img src="img/product1.jpg">
				<div class="productName">Sweet Italian Chicken Sausages</div>
				<div class="productPrice">Rs.350</div></a>
				<button>Add to Cart</button>
			</div>
			

			<div class="productBox"><a href="#">
				<img src="img/product2.jpg">
				<div class="productName">Sweet Italian Chicken Sausages</div>
				<div class="productPrice">Rs.350</div></a>
				<button>Add to Cart</button>
			</div>
			

			<div class="productBox"><a href="#">
				<img src="img/product3.jpg">
				<div class="productName">Fresh Avocados</div>
				<div class="productPrice">Rs.350</div></a>
				<button>Add to Cart</button>
			</div>
			

			<div class="productBox"><a href="#">
				<img src="img/product4.jpg">
				<div class="productName">Miso Caramel Apple Danish</div>
				<div class="productPrice">Rs.350</div></a>
				<button>Add to Cart</button>
			</div>


		</div>
	</div>
	<footer>
		<div class="footer">
			<div class="column">
				<img src="img/logo.png">
			</div>
			<div class="column">
				<ul>
					<li><a href="#">About us </a></li>
					<li><a href="#">Login/Sign up</a></li>
					<li><a href="#">How to buy ?</a></li>
					<li><a href="#">Collection Procedure</a></li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
			<div class="column">
				<div class="footerPaypal">
					<a href="#"><img src="img/paypal.png"></a>
				</div>
			</div>

			<div class="column">
				<div class="footerAddress">
					<p>Cleckhudderfax, United Kingdom</p>
					<p><i>Your trusted market place turned online</i></p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>