<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/traderStyle.css?<?=filemtime("css/traderStyle.css")?>" rel="stylesheet" type="text/css" />
    <title>UpdateProduct</title>
</head>
<body>
    <!-- Header -->
    <?PHP 
    include('traderHeader.php'); 
    if(isset($_GET['id'])){

        $ID=$_GET['id'];
        $sql=oci_parse($conn," SELECT * FROM SHOP WHERE SHOPID=$ID ");
        oci_execute($sql);
        $row=oci_fetch_assoc($sql); 
        $description=$row['SHOPDESCRIPTION']; 
        $shop=$row['SHOPNAME']; 
        $_SESSION['shopId']=$_GET['id'];
          
    } 
    
    
    ?>
    <h1 Id="traderTitle">Add Product</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <form action="updateShop.php" method="post">
                <ul>   
                    <li> 
                        <label for="txt_shopName" class="login_label">Shop Name :</label><br>
                        <input type="text" name="txt_shopName" class="login_input" Value="<?PHP echo  $shop;?>"><br> 
                    </li> 
                    <li> 
                        <label for="txt_shopDescription" class="login_label">Description :</label><br>
                        <input type="text" name="txt_shopDescription" class="login_input" Value="<?PHP echo  $description;?>"><br> 
                    </li>
                    <li> 
                        <input type="submit" name="updateShop" value="Save Shop" class="login_submit">
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