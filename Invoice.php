<?php 
include('init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 

     <style> 
     .Name{
    margin-top:5vh; 
    margin-left: 30vw;
}
.heading{
    margin-top:2vh; 
    margin-left: 30vw; 
    width: 39vw;
}
.Container{
    margin:0vh; 
    height: 45vh;
    width: 39vw;
    margin-left: 30vw;
    margin-right: 30vw;
    background-color: lightgray;
}
.date{
    float: right;
}
.email{
    margin: 1.5vh; 
    margin-bottom: 0vh;
}
.Phoneno{
    margin: 7.5vh;
    margin-top: 0vh;

}
table{
    border: 1px solid black;
    margin-left: 2.5vw;
    height: 25vh;
}
table thead td{
    text-align: center;
}
table thead td:nth-child(1){
    text-align: center; 
    width: 12vw;
}
table thead td:nth-child(2){ 
    text-align: center;
    width: 5vw;
}
table thead td:nth-child(3){ 
    text-align: center;
    width: 8vw;
}
table thead td:nth-child(4){ 
    text-align: center;
    width: 8vw;
} 
table tbody tr td:nth-child(1){ 
    text-align: center;
    width: 12vw;
}
table tbody tr td:nth-child(2){ 
    text-align: center;
    width: 5vw;
}
table tbody tr td:nth-child(3){ 
    text-align: center;
    width: 8vw;
}
table tbody tr td:nth-child(4){ 
    text-align: center;
    width: 8vw;
}
.totalcontainer{
display: flex;
float: right; 
}
h2{ 
margin-right: 2.5vw;
}
     </style>
</head>
<body>  
    <?php 
            $lv_userid=$_SESSION['USERID'];
            $cartsql="Select C.*,P.PRODUCTPRICE From CART_ORDER C INNER JOIN PRODUCT P ON P.PRODUCTID=C.PRODUCTID Where CUSTOMERID=$lv_userid ";
            $cartqry=oci_parse($conn, $cartsql);
            oci_execute($cartqry);
    ?>
    <h1 class="Name">Hello <?php echo $_SESSION['fname'];?>,</h1>
    <p class="heading">This Is Your Invoice For the Order Id <?php while($row = oci_fetch_assoc($cartqry)){ echo $row['ORDERID'];};?> . </p>
    <div class="Container"> 
        <p class="date">Date : <?php echo date("Y-m-d"); ?> </p>
        <p class="email">Huddersmart@gmail.com</p>
        <p class="Phoneno">9823616783</p>
         <table>
             <thead>
                 <td>Product</td>
                 <td>Rate</td>
                 <td>Qty</td>
                 <td>Price</td>
             </thead> 
             <tbody>
             
                <?php
                    $lv_userid=$_SESSION['USERID'];
                    $cartsql="Select C.*,P.PRODUCTPRICE From CART_ORDER C INNER JOIN PRODUCT P ON P.PRODUCTID=C.PRODUCTID Where CUSTOMERID=$lv_userid ";
                    $cartqry=oci_parse($conn, $cartsql);
                    oci_execute($cartqry);
                    $Overaltotal=0;
                    while($row= oci_fetch_assoc($cartqry)){ 
                        $total=$row['QUANTITY']*$row['PRODUCTPRICE'];
                        $Overaltotal=$Overaltotal+$total;
                    ?>
                    <tr>
                        <td><?php  echo $row["PRODUCTNAME"];?></td> 
                        <td><?php  echo $row['PRODUCTPRICE'];?></td> 
                        <td><?php  echo $row['QUANTITY'];?></td> 
                        <td><?php  echo $row['QUANTITY']*$row['PRODUCTPRICE'];?></td>
                        </tr> 
                    <?php
                    }
                ?> 
            
            </tbody>
         </table>
         <div class="totalcontainer">
             <h2>Total</h2>
             <h2 class="totalPrice"><?php echo $Overaltotal;?></h2>
         </div>
    </div>
</body>
</html>