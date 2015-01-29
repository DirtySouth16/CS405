<div id="pageHeader"><table width="100%" border="0" cellspacing="0" cellpadding="12">
<link rel="shortcut icon" href="http://www.cs.uky.edu/~llwi222/webstore/image_assets/favicon.ico"/>
<?php session_start(); if(!isset($_SESSION["employee"]) && !isset($_SESSION["first"])){

echo '  
	<div style="float:right;height: 21px;width: 80.797;width: 120px;">
        <a href="http://www.cs.uky.edu/~llwi222/webstore/customer_login.php">log in</a>|<a href="http://www.cs.uky.edu/~llwi222/webstore/customer_registration.php">register</a>
</div>';
}elseif(isset($_SESSION["first"])){ 

require_once('../../webstore/mysqli_connect.php');


$query = "SELECT SUM(quantity) FROM in_cart WHERE CID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt,'s',$_SESSION["CID"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $cart_count);
//var_dump($_SESSION["CID"]);
mysqli_stmt_store_result($stmt);
mysqli_stmt_fetch($stmt);

echo '
        <div style="float:right;height: 21px;width: 80.797;width: 240px;">
	Hello, '. $_SESSION["first"] .'| <a href="http://www.cs.uky.edu/~llwi222/webstore/my_cart.php">Cart '.$cart_count.'</a>|
	<a href="http://www.cs.uky.edu/~llwi222/webstore/my_orders.php">Orders</a> |  <a href="http://www.cs.uky.edu/~llwi222/webstore/logout.php">logout</a>

</div>';}
else{

echo '
        <div style="float:right;height: 21px;width: 80.797;width: 160px;">
        Hello, '. $_SESSION["employee"].'| <a href="http://www.cs.uky.edu/~llwi222/webstore/logout.php">logout</a>
	</div>';

}
?>
  <tr>
    <td width="32%"><a href="http://www.cs.uky.edu/~llwi222/webstore/index.php"><img src="http://www.cs.uky.edu/~llwi222/webstore/style/logo.jpg" alt="Logo" width="252" height="36" border="0" /></a></td>
    <td width="68%">&nbsp;</td> 
    <!-- align="right"><a href="http://www.cs.uky.edu/~llwi222/webstore/cart.php">Your Cart</a></td> -->
  </tr>


  <tr>
    <td colspan="1"><a href="http://www.cs.uky.edu/~llwi222/webstore/index.php">Home</a> &nbsp; &middot; &nbsp; <a href="http://www.cs.uky.edu/~llwi222/webstore/inventoryList.php">Products</a> &nbsp; &middot; &nbsp; <a href="http://www.cs.uky.edu/~llwi222/webstore/help.php">Help</a> &nbsp; &middot; &nbsp; <a href="http://www.cs.uky.edu/~llwi222/webstore/contact.php">Contact</a> &nbsp;

    </td>
    <td colspan="1">
    <div id="searchBar" style="float: right;">
        <form method="post" id="searchForm" action="http://www.cs.uky.edu/~llwi222/webstore/search.php"> 
	 <label for="search">Search:</label>
      	<input type="text" name="searchField" name="searchField"/>
	</form>
      </div>
      </td>
    </tr>  

  </table>
</div>

