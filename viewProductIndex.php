<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/traderStyle.css?<?=filemtime("css/traderStyle.css")?>" rel="stylesheet" type="text/css" />

    <title>View Product</title>
</head>
<body>
    <?php 
        include('traderHeader.php');
    ?>
    <h1 Id="traderTitle">View Product</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <ul>
                <li> 
                    <?php
                    $userid=$_SESSION['USERID'];
                    $sql=oci_parse($conn,"SELECT * FROM PRODUCT WHERE SELLERID=$userid");
                    oci_execute($sql);
                    if($sql){
                        ?>
                        <table class="table">
							<thead>
									<tr>
										<th class="Product">Product</th> 
										<th>Name</th>
										<th>Price</th>
										<th>Brand</th>
									</tr>
							</thead>
							
                                <?php
                                while ($row = oci_fetch_assoc($sql))
                                {
                                    ?> 
                                    <tbody>
                                    <tr>
									    <td><div Id="picture"> <img src="./img/<?Php echo $row['PRODUCTIMGNAME']?>" alt="No Image Found"></div></td> 
									    <td><?Php echo $row['PRODUCTNAME'];?></td> 
									    <td> <?Php echo $row['PRODUCTPRICE'];?></td>
									    <td><?Php echo $row['PRODUCTBRAND'];?></td>
									    <td><button Id="table1RemoveBtn" name="removebtn" > <a href="deleteProduct.php?id=<?php echo $row['PRODUCTID']?>">Remove</a> </button>
                                            <button Id="table1RemoveBtn" name="updatebtn"><a href="updateProductIndex.php?id=<?php echo $row['PRODUCTID']?>">Update </a></button>
                                        </td>
								    </tr>
                                    </tbody> 
							        <tbody Id="tbodySeperator"></tbody>
							        <?php
                                }
                                ?> 
						</table> 
                        <?Php 
                    }
                    ?>
                </li>
            </ul>

        </div>
    </div>
    <?php
        include('footer.php')
    ?>
</body>
</html>