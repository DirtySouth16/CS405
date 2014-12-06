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



<?php
// Get a connection for the database
require_once('../../webstore/mysqli_connect.php');
//Display Header
include_once("template_header");
// Create a query for the database
$query = "SELECT IID, name, price, quantity FROM items";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($conn, $query);
// If the query executed properly proceed
if($response){
echo //'<table align="left"
//cellspacing="5" cellpadding="8">
'<tr><td align="left"><b>Name</b></td>
<td align="left"><b>ID #</b></td>
<td align="left"><b>Price</b></td>
<td align="left"><b>In Stock</b></td></tr>';
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
echo '<tr><td align="left"><a href="http://www.cs.uky.edu/~llwi222/webstore/product.php?id='.$row['IID'].'">' . 
$row['name'] . '</a></td><td align="left">' . 
$row['IID'] . '</td><td align="left">' .
'$' . $row['price'] . '</td><td align="left">' .
$row['quantity'] . '</td><td align="left">' ; 
echo '</tr>';
}
echo '</table>';
} else {
echo "Couldn't issue database query<br />";
echo mysqli_error($conn);
}
// Close connection to the database
mysqli_close($conn);
?>

  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>

