<?php 
  session_start();
  include "db-connect.php"; 


if (isset($_GET['id'])) {
	// Connect to the MySQL database  
    include "db-connect.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why
	$sql = mysql_query("SELECT * FROM Products WHERE ProductID='$id' LIMIT 1");
	$productCount = mysql_num_rows($sql); // count the output amount
    if ($productCount > 0) {
		// get all the product details
		while($row = mysql_fetch_array($sql)){ 
			 $product_name = $row["ProductName"];
			 $price = $row["Product_UnitPrice"];
			 $details = $row["Descriptions"];
			 $category = $row["CategoryID"];
			 $pictureURL = $row["ProductPicture"];
         }
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
mysql_close();
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?php echo $product_name; ?>
    </title>
    <link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<?php
    if(isset($_SESSION['Email'])){
    require_once("logout-header.php");
    }else{  
    require_once("login-header.php");
    }
    ?>

<body>
    <div align="center" id="mainWrapper">
        <div id="pageContent">
            <table width="100%" border="0" cellspacing="0" cellpadding="15">
                <tr>
                    <td width="19%" valign="top"><img src="<?php echo $pictureURL; ?>" width="142" height="188"
                            alt=" <?php echo $product_name; ?>" /><br />
                        <a href="<?php echo $pictureURL; ?>">View Full Size Image</a></td>
                    <td width="81%" valign="top">
                        <h3>
                            <?php echo $product_name; ?>
                        </h3>
                        <p>
                            <?php echo "$".$price; ?><br />
                            <br />
                            <?php echo "$category"; ?> <br />
                            <br />
                            <?php echo $details; ?>
                            <br />
                        </p>
                        <form id="form1" name="form1" method="post" action="cart.php">
                            <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
                            <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <?php include_once("template_footer.php");?>
    </div>
</body>

</html>