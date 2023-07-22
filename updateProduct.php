<?php
 include('init.php');
if(isset($_POST['updateProduct'])){
    $_PNAME=$_POST['txt_productName'];
    $_price=$_POST['txt_productPrice'];
    $_description=$_POST['txt_productDescription'];
    $_type=$_POST['txt_productType'];
    $_brand=$_POST['txt_productBrand']; 
    $_shop=$_POST['txt_shopName'];
    $_allergy=$_POST['txt_allergyInfo'];
    $_img=$_POST['txt_imageName']; 
    $_Id=$_SESSION['USERID']; 
    $date=$_POST['txt_addedDate'];
    $qty=$_POST['txt_productQty'];
    $ID=$_SESSION['ProductId'];

    $sql1=oci_parse($conn, " UPDATE PRODUCT SET PRODUCTNAME='$_PNAME',PRODUCTPRICE='$_price', PRODUCTIMGNAME='$_img',PRODUCTDESCRIPTION='$_description', ALLERGYINFO='$_allergy',PRODUCTBRAND='$_brand', PRODUCTTYPEID='$_type',QUANTITY='$qty', SHOPID=$_shop, SELLERID=$_Id, ADDEDDATE=$date Where PRODUCTID=$ID ");

    oci_execute($sql1);
    header('Location:viewProductIndex.php');
    
}
else{

    echo "Error Occured";

}

?>