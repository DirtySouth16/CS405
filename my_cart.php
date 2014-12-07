
<?php
session_start();

// Run a select query to get my letest 6 items
// Connect to the MySQL database  
require_once('../../webstore/mysqli_connect.php');
$dynamicList = "";
$query = "select * from items, in_cart where in_cart.CID = ? and in_cart.IID = items.IID";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $_SESSION["CID"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $IID, $quantity, $price, $name,$CID, $IID2);
mysqli_stmt_store_result($stmt);
$productCount = mysqli_stmt_num_rows($stmt); // count the output amount
if ($productCount > 0) {
 	while($row = mysqli_stmt_fetch($stmt)){
       			$id = $IID;
                         $product_name = $name;
                         $price = $price;
                         $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td valign="top"><div id="thumbnail"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="http://cs.uky.edu/~llwi222/webstore/image_assets/' . $id . '.jpg" alt="' . $product_name . '" border="1" /></a></div></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
        $dynamicList = "We have no products listed in our store yet";
}
?>

<!DOCTYPE html>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
      <p><?php echo $dynamicList; ?><br />
      </td>
  </tr>
</table>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>
