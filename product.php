
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
	// Connect to the MySQL database  
  require_once('../../webstore/mysqli_connect.php'); 
	$IID = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why

  /*$query = "SELECT * FROM items WHERE IID = ? LIMIT 1";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'i', $IID);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
	*/

	$stmt = mysqli_query($conn,"SELECT * FROM items WHERE IID = $IID LIMIT 1");
	$productCount = mysqli_num_rows($stmt); // count the output amount
    if ($productCount > 0) {
		// get all the product details
		while($row = mysqli_fetch_array($stmt)){ 
			 $product_name = $row["name"];
			 $price = $row["price"];
      			 $stock = $row["quantity"];
      
      /*$details = $row["details"];
			 $category = $row["category"];
			 $subcategory = $row["subcategory"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));*/
         }
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
?>
<!DOCTYPE html>
<html xmlns\>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $product_name; ?></title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td width="19%" valign="top"><img src="image_assets/<?php echo $IID; ?>.jpg" width="142" height="188" alt="<?php echo $product_name; ?>" /><br />
      <a href="image_assets/<?php echo $IID; ?>.jpg">View Full Size Image</a></td>
    <td width="81%" valign="top"><h3><?php echo $product_name; ?></h3>
      <p><?php echo "$".$price; ?><br />
        <br />
       <!-- <?php echo "$subcategory $category"; ?> <br />
<br />-->
        <?php echo $stock. " in stock"; ?> 
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
