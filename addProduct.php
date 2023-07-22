<?php 
    include('init.php');
    if(isset($_POST['saveProduct'])){

        $pname=$_POST['txt_productName'];
        $price=$_POST['txt_productPrice'];
        $imgname=$_POST['txt_imageName'];
        $description=$_POST['txt_productDescription'];
        $alergy=$_POST['txt_allergyInfo'];
        $brand=$_POST['txt_productBrand'];
        $productType=$_POST['txt_productType'];
        $shopName=$_POST['txt_shopName'];
        $trader=$_SESSION['USERID'];
        $addedDate=$_POST['txt_addedDate'];
        $Qty=$_POST['txt_productQty'];
     
    
        $product_type_sql=oci_parse($conn,"SELECT * FROM PRODUCTTYPE WHERE PRODUCTTYPE='$productType'"); 
        oci_execute($product_type_sql);
        while($row=oci_fetch_assoc($product_type_sql)){
            $productTypeId=$row['PRODUCTTYPEID'];
        } 

        $shop_sql=oci_parse($conn,"SELECT * FROM SHOP WHERE SHOPNAME='$shopName'"); 
        oci_execute($shop_sql);
        while($row=oci_fetch_assoc($shop_sql)){
            $shopId=$row['SHOPID'];
        }


        $sql=oci_parse($conn, "INSERT INTO PRODUCT(PRODUCTNAME,PRODUCTPRICE,PRODUCTIMGNAME,PRODUCTDESCRIPTION,ALLERGYINFO,PRODUCTBRAND,PRODUCTTYPEID,SHOPID,SELLERID,ADDEDDATE,QUANTITY) 
        VALUES('$pname','$price', '$imgname','$description','$alergy','$brand', '$productTypeId', '$shopId', '$trader', DATE'$addedDate','$Qty')");
        oci_execute($sql);

        if($sql){
 
            echo'<script>alert(" Product Added Successfully ")</script>'; 
            echo'<script>window.location="traderIndex.php"</script>'; 
        }
        else{

        }
    }
?>