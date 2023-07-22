<?php 
    include('connection.php');
    if(isset($_GET['id'])){

        $ID=$_GET['id'];

        $sql=oci_parse($conn," DELETE FROM PRODUCT WHERE PRODUCTID=$ID");
        oci_execute($sql);
        header('Location:viewProductIndex.php');

    }
    else
    {
        echo "Error Occured";
    }
?>