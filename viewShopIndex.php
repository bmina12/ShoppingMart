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
    <h1 Id="traderTitle">View Shop</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <ul>
                <li> 
                    <?php 
                    $trader=$_SESSION['USERID'];
                    $sql=oci_parse($conn,"SELECT * FROM SHOP WHERE USERID=$trader");
                    oci_execute($sql);
                    if($sql){
                        ?>
                        <table class="table">
							<thead>
									<tr>
										<th>Name</th>
										<th>Description</th>
										<th>Trader Name</th>
									</tr>
							</thead>
							
                                <?php
                                while ($row = oci_fetch_assoc($sql))
                                {
                                    ?> 
                                    <tbody>
                                    <tr>
									    <td><?Php echo $row['SHOPNAME'];?></td> 
									    <td> <?Php echo $row['SHOPDESCRIPTION'];?></td>
									    <td>
                                            <?Php
                                            $sqltrader=oci_parse($conn,"SELECT * FROM USERS WHERE USERID=$trader");
                                            oci_execute($sqltrader);
                                            while($row1=oci_fetch_assoc($sqltrader)){
                                                echo $row1['FIRSTNAME']." ". $row1['LASTNAME'];
                                            } 
                                            ?> 
                                        </td>
									    <td style="text"><button Id="table1RemoveBtn1" name="removebtn" > <a href="deleteShop.php?id=<?php echo $row['SHOPID']?>">Remove</a> </button>
                                            <button Id="table1RemoveBtn1" name="updatebtn"><a href="updateShopIndex.php?id=<?php echo $row['SHOPID']?>">Update </a></button>
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