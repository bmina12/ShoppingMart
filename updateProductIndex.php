<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/traderStyle.css?<?=filemtime("css/traderStyle.css")?>" rel="stylesheet" type="text/css" />
    <title>Update Product</title>
</head>
<body>
    <!-- Header -->
    <?PHP 
    include('traderHeader.php'); 
    if(isset($_GET['id'])){

        $ID=$_GET['id'];
        $sql=oci_parse($conn," SELECT * FROM PRODUCT WHERE PRODUCTID=$ID ");
        oci_execute($sql);
        $row=oci_fetch_assoc($sql);
        $PNAME=$row['PRODUCTNAME'];
        $price=$row['PRODUCTPRICE'];
        $description=$row['PRODUCTDESCRIPTION'];
        $type=$row['PRODUCTTYPEID'];
        $brand=$row['PRODUCTBRAND']; 
        $shop=$row['SHOPID'];
        $quantity=$row['QUANTITY'];
        $allergy=$row['ALLERGYINFO'];
        $img=$row['PRODUCTIMGNAME']; 
        $_SESSION['ProductId']=$_GET['id'];
          
    } 
    
    
    ?>
    <h1 Id="traderTitle">Update Product</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <form action="updateProduct.php" method="post">
                <ul> 
                    <li> 
                        <label for="txt_productName" class="login_label">Name :</label><br>
                        <input type="text" name="txt_productName"  class="login_input" value=" <?php echo $PNAME; ?>"> <br> 
                    </li>
                    <li> 
                        <label for="txt_productPrice" class="login_label">Price :</label><br>
                        <input type="number" name="txt_productPrice" class="login_input" value= "<?php echo $price?>"><br> 
                    </li>
                    <li> 
                        <label for="txt_productDescription" class="login_label">Description :</label><br>
                        <input type="text" name="txt_productDescription" class="login_input" Value="<?PHP echo  $description;?>"><br> 
                    </li>
                    <li> 
                        <label for="txt_productType" class="login_label">Product Type :</label><br>
                        <input type="text" name="txt_productType" class="login_input" Value="<?PHP echo $type;?>"><br> 
                    </li>
                    <li> 
                        <label for="txt_productBrand" class="login_label">Product Brand :</label><br>
                        <input type="text" name="txt_productBrand" class="login_input" Value="<?PHP echo $brand;?>"><br> 
                    </li> 
                    <li> 
                        <label for="txt_shopName" class="login_label">Shop Name :</label><br>
                        <input type="text" name="txt_shopName" class="login_input" Value="<?PHP echo  $shop;?>"><br> 
                    </li>
                    <li> 
                        <label for="txt_allergyInfo" class="login_label">Allergy Info :</label><br>
                        <input type="text" name="txt_allergyInfo" class="login_input" Value="<?PHP echo  $allergy;?>"><br> 
                    </li>
                    <li> 
                        <label for="txt_imageName" class="login_label">Image Name :</label><br>
                        <input type="text" name="txt_imageName" class="login_input" Value="<?PHP echo $img?>"><br> 
                    </li>
                    <li> 
                        <label for="txt_addedDate" class="login_label">Date :</label><br>
                        <input type="text" name="txt_addedDate" class="login_input" value="<?php echo date("Y-m-d"); ?>" readonly><br> 
                    </li>
                    <li> 
                        <label for="txt_productQty" class="login_label">Quantity :</label><br>
                        <input type="number" name="txt_productQty" class="login_input"  Value="<?PHP echo $quantity?>"><br> 
                    </li>
                    <li> 
                        <input type="submit" name="updateProduct" value="Save Product" class="login_submit">
                    </li> 
                </ul> 
            </form>
        </div> 
    </div>
    
    <?PHP
    include('footer.php'); 
     ?>
    
</body>
</html>