<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/searchStyle.css?<?=filemtime("css/searchStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="css/traderStyle.css?<?=filemtime("css/traderStyle.css")?>" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<title>Results</title>
</head>
<body>
	<?php
	include('adminHeader.php');   
	$search = isset($_POST['searchSubmit']) ? htmlspecialchars($_POST['txtSearch']) : $_POST['txtHiddenSearch'] ;
	?> 
    <h1 Id="traderTitle">Verify Trader</h1>
    <div Id="traderContainer">
        <div Id="traderList">
            <ul>
                <li> 
                    <?php
                    if(isset($_POST['searchSubmit']))
                    {
                        $lv_search=$_POST['txtSearch']; 
                        $sql="SELECT * FROM VERIFYTRADER WHERE UPPER(EMAIL) LIKE UPPER('%$lv_search%') AND ACCOUNTTYPE ='Trader'"; 
                        $qry=oci_parse($conn, $sql);
                        oci_execute($qry);
                        if($qry){
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
                                    while ($row = oci_fetch_assoc($qry))
                                    {
                                        ?> 
                                        <tbody>
                                        <tr>
                                            <td><?Php echo $row['EMAIL']?></td> 
                                            <td><?Php echo $row['FIRSTNAME'];?></td> 
                                            <td> <?Php echo $row['LASTNAME'];?></td>
                                            <td><?Php echo $row['PHONENUMBER'];?></td>
                                            <td><button Id="table1RemoveBtn" name="removebtn" > <a href="deleteProduct.php?id=<?php echo $row['USERID']?>">Remove</a> </button>
                                                <button Id="table1RemoveBtn" name="updatebtn"><a href="updateProductIndex.php?id=<?php echo $row['USERID']?>">Approve </a></button>
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
                    }
                    ?>
                </li>
            </ul>

        </div>
    </div>
	<?php
	include('footer.php');
	?>
</body>
</html>