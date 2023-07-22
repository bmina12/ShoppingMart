<?php
include('init.php');  
$ID=$_GET['id'];
$sql="DELETE FROM PENDINGUSER WHERE USERID='$ID'"; 
$qry=oci_parse($conn, $sql);
oci_execute($qry); 
if($qry)
{
    echo'<script>alert("Trader Declined Successfully !!!")</script>';
        echo'<script>window.location="adminIndex.php"</script>';
}
else
{
    echo'<script>alert("Verification UnSuccessful !!!")</script>';
} 
?>