<?php
	include('init.php');
	$id="";
	 
	if(isset($_POST['saveReview'])){
        $id=$_SESSION['productId'];
		$msg=$_POST['msg'];
		$customer=$_SESSION['USERID']; 
        $date= date("d-m-y");
		$reviewsql=oci_parse($conn, "INSERT INTO REVIEW(REVIEWDETAILS,CUSTOMERID,PRODUCTID,REVIEWDATE) VALUES('$msg','$customer','$id',$date)");
		oci_execute($reviewsql);
		if($reviewsql){
 
            echo'<script>alert(" Review  Successfully ")</script>'; 
            echo'<script>window.location="index.php"</script>'; 
        }
		else{
 
            echo'<script>alert(" Error Occure ")</script>'; 
            echo'<script>window.location="index.php"</script>'; 
        }
	}
    ?>