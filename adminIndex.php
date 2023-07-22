<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/traderStyle.css?<?=filemtime("css/traderStyle.css")?>" rel="stylesheet" type="text/css" />

    <title>Traders Request</title>
</head>
<body>
    <?php 
        include('adminHeader.php');
    ?>
    <h1 Id="traderTitle">Trader Request</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <ul>
                <li> 
                    <?php
                    $userid=$_SESSION['USERID'];
                    $sql=oci_parse($conn,"SELECT * FROM PENDINGUSER ");
                    oci_execute($sql);
                    if($sql){
                        ?>
                        <table class="table">
							<thead>
									<tr>
										<th class="Product">Email</th> 
										<th>Firstname</th>
										<th>Lastname</th>
										<th>Phone Number</th>
									</tr>
							</thead>
							
                                <?php
                                while ($row = oci_fetch_assoc($sql))
                                {
                                    ?> 
                                    <tbody>
                                    <tr>
									    <td><?Php echo $row['EMAIL']?></td> 
									    <td><?Php echo $row['FIRSTNAME'];?></td> 
									    <td> <?Php echo $row['LASTNAME'];?></td>
									    <td><?Php echo $row['PHONENUMBER'];?></td>
									    <td><button Id="table1RemoveBtn" name="removebtn" > <a href="adminDeleteUser.php?id=<?php echo $row['USERID']?>">Reject</a> </button>
                                            <button Id="table1RemoveBtn" name="updatebtn"><a href="adminVerifyTrader.php?id=<?php echo $row['USERID']?>">Approve </a></button>
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