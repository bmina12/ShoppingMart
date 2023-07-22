<?php 
    include('connection.php');
    if(isset($_GET['id'])){

        $ID=$_GET['id'];

        $sql=oci_parse($conn," DELETE FROM SHOP WHERE SHOPID=$ID");
        oci_execute($sql);
        header('Location:viewShopIndex.php');

    }
    else
    {
        echo "Error Occured";
    }
?>