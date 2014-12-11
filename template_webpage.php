<!DOCTYPE html>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory</title>//************CHANGE THIS*******************
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
// Create a query for the database
$query = "SELECT IID, name, price, quantity FROM items";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($conn, $query);
// If the query executed properly proceed
if($response){
//*********INSERT PHP CODE*****
} 
else {
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
