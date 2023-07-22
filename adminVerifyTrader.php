<?php
include('init.php');  
$ID=$_GET['id'];
$sql="INSERT INTO USERS(EMAIL, FIRSTNAME, LASTNAME, ADDRESS, PHONENUMBER, PASSWORD, ACCOUNTTYPE) SELECT EMAIL, FIRSTNAME, LASTNAME, ADDRESS, PHONENUMBER, PASSWORD, ACCOUNTTYPE FROM PENDINGUSER WHERE USERID=$ID";
$sql2="DELETE FROM PENDINGUSER WHERE USERID='$ID'"; 
$qry=oci_parse($conn, $sql);
oci_execute($qry);
$qry2=oci_parse($conn, $sql2);
oci_execute($qry2);
if($qry)
{
    echo'<script>alert("Approved Successful !!!")</script>'; 
    echo'<script>window.location="adminIndex.php"</script>';
}
else
{
    echo'<script>alert("Approved UnSuccessful !!!")</script>';
} 
?>