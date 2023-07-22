<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/traderStyle.css?<?=filemtime("css/traderStyle.css")?>" rel="stylesheet" type="text/css" />
    <title>Trader</title>
</head>
<body>
    <!-- Header -->
    <?PHP 
    include('traderHeader.php'); 

    $trader=$_SESSION['USERID'];
    $product_type_sql=oci_parse($conn,"SELECT * FROM PRODUCTTYPE WHERE SELLERID=$trader"); 
    oci_execute($product_type_sql);
    
    $shop_sql=oci_parse($conn,"SELECT * FROM SHOP WHERE USERID=$trader"); 
    oci_execute($shop_sql); 

    ?>
    <h1 Id="traderTitle">Add Product</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <form action="addProduct.php" method="post">
                <ul> 
                    <li> 
                        <label for="txt_productName" class="login_label">Name :</label><br>
                        <input type="text" name="txt_productName" class="login_input"><br> 
                    </li>
                    <li> 
                        <label for="txt_productPrice" class="login_label">Price :</label><br>
                        <input type="number" name="txt_productPrice" class="login_input"><br> 
                    </li>
                    <li> 
                        <label for="txt_productDescription" class="login_label">Description :</label><br>
                        <input type="text" name="txt_productDescription" class="login_input"><br> 
                    </li>
                    <li> 
                        <label for="txt_productType" class="login_label">Product Type :</label><br> 
                        </select>
                        <select name="txt_productType" class="login_input">
                        <?php
                        while ($row = oci_fetch_assoc($product_type_sql))
                        {?>
                        <option value="<?Php echo $row['PRODUCTTYPE'];?>"><?Php echo $row['PRODUCTTYPE'];?></option>
                        <?php 
                        }
                        ?> 
                        </select>
                    </li>
                    <li> 
                        <label for="txt_productBrand" class="login_label">Product Brand :</label><br>
                        <input type="text" name="txt_productBrand" class="login_input"><br> 
                    </li>
                    
                    <li> 
                        <label for="txt_shopName" class="login_label">Shop Name :</label><br>
                        <select name="txt_shopName" class="login_input">
                        <?php
                        while ($row = oci_fetch_assoc($shop_sql))
                        {?>
                        <option value="<?Php echo $row['SHOPNAME'];?>"><?Php echo $row['SHOPNAME'];?></option>
                        <?php 
                        }
                        ?>
                        </select>
                    </li>
                    <li> 
                        <label for="txt_allergyInfo" class="login_label">Allergy Info :</label><br>
                        <input type="text" name="txt_allergyInfo" class="login_input"><br> 
                    </li>
                    <li> 
                        <label for="txt_imageName" class="login_label">Image Name :</label><br>
                        <input type="text" name="txt_imageName" class="login_input"><br> 
                    </li>
                    <li> 
                        <label for="txt_addedDate" class="login_label">Date :</label><br>
                        <input type="text" name="txt_addedDate" class="login_input" value="<?php echo date("Y-m-d"); ?>" readonly><br> 
                    </li>
                    <li> 
                        <label for="txt_productQty" class="login_label">Quantity :</label><br>
                        <input type="number" name="txt_productQty" class="login_input"><br> 
                    </li>
                    <li> 
                        <input type="submit" name="saveProduct" value="Save Product" class="login_submit">
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