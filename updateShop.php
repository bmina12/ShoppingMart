<?php
 include('init.php');
if(isset($_POST['updateShop'])){ 
    $_description=$_POST['txt_shopDescription']; 
    $_shop=$_POST['txt_shopName']; 
    $ID=$_SESSION['shopId'];

    $sql1=oci_parse($conn," UPDATE SHOP SET SHOPNAME='$_shop' ,SHOPDESCRIPTION='$_description' Where SHOPID=$ID "); 
    oci_execute($sql1);
    header('Location:viewShopIndex.php');
    
}
else{ 
    echo "Error Occured"; 
}

?>