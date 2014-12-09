



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
mysqli_stmt_bind_result($stmt, $IID, $quantity, $price, $name, $CID, $cart_IID, $cart_quantity);
mysqli_stmt_store_result($stmt);
$productCount = mysqli_stmt_num_rows($stmt); // count the output amount
$total = 0;
if ($productCount > 0) {
	while($row = mysqli_stmt_fetch($stmt)){
                        $id = $IID;
                         $product_name = $name;
                         $total += $price*$cart_quantity;
						 $select = '';
						 for ($i=1; $i<=$quantity; $i++)
    									{   
									        if($i == $cart_quantity){
								                $select.= '<option value="'.$i.'" selected = "selected">'.$i.'</option>';
        								}
        								else{
                								$select.= '<option value="'.$i.'">'.$i.'</option>';
       									 	} 
    									}    
						 
						 
						 
						 
                         $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td valign="top"><div id="thumbnail"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="http://cs.uky.edu/~llwi222/webstore/image_assets/' . $id . '.jpg" alt="' . $product_name . '" border="1" /></a></div></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
	    <form method="post" action="add_to_cart.php" id="myform">
            <input type="hidden" name="iid" id="iid" value="'.$id.'" />
	    <input type="hidden" name="add_to_cart" id="add_to_cart" value="submit"/>
	    Quantity <select name="cart_quantity" onchange="document.getElementById(\'myform\').submit()">'.$select.'</select><br />
            </form>
	    <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }


} else {
        $dynamicList = "There is nothing in your cart.";
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
  <div id="totalWindow" style="float: right; position: fixed; margin-top: 5px; right: 400px; box-shadow: 0 0 1px 2px #888888;padding: 5px;">
	Total: $<?php echo"$total" ?> <form id="checkoutForm"> <input type="submit" name="checkout" value="checkout"> </form>
  </div>	
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
      <p><?php echo $dynamicList; ?><br />

<script type="text/javascript">
function submitform()
{
  document.myform.submit();
}
</script>
  </tr>
</table>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>
