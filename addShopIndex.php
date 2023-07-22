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
    <h1 Id="traderTitle">Add Shop</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <form action="addShop.php" method="post">
                <ul> 
                    <li> 
                        <label for="txt_shopName" class="login_label">Name :</label><br>
                        <input type="text" name="txt_shopName" class="login_input"><br> 
                    </li> 
                    <li>
                        <label for="txt_shopDescription" class="login_label">Description :</label><br>
                        <input type="text" name="txt_shopDescription" class="login_input"><br> 
                    </li> 
                    <li> 
                        <label for="txt_traderName" class="login_label">Trader Name :</label><br>
                        <input type="text" name="txt_traderName" class="login_input" 
                        value="
                            <?Php
                            $sqltrader=oci_parse($conn,"SELECT * FROM USERS WHERE USERID=$trader");
                            oci_execute($sqltrader);
                            while($row1=oci_fetch_assoc($sqltrader)){
                                echo $row1['FIRSTNAME']." ". $row1['LASTNAME'];
                            } 
                            ?> 
                            " readonly>
                            <br>  
                    </li> 
                    <li> 
                        <input type="submit" name="saveShop" value="Save Shop" class="login_submit">
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