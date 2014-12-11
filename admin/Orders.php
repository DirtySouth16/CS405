<?php
session_start();


if (!isset($_SESSION["employee"])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("../template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">


<?php
// Get a connection for the database
require_once('../../../webstore/mysqli_connect.php');
//Display Header
// Create a query for the database
$query = "SELECT distinct TID, total, status, tDate FROM transactions order by status";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($conn, $query);
// If the query executed properly proceed
if($response){
echo //'<table align="left"
//cellspacing="5" cellpadding="8">
'<tr><td align="left"><b>Order #</b></td>
<td align="left"><b>Status </b></td>
<td align="left"><b>Order Placed</b></td>
<td align="left"><b>Total</b></td></tr>';
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
echo '<tr><td>'.$row['TID'].'</td><td align="left">' .
$row['status'] . '</td><td align="left">' .
$row['tDate'] . '</td><td align="left">' .
'$' . $row['total'] . '</td><td align="left">';
if($row['status'] == "Pending"){
echo '<form id=form'.$row['TID'].' method="post" action="ship_order.php">
        <input type="hidden" name="tid" id="tid" value="'.$row['TID'].'" />
        <input type="hidden" name="ship" value="Shipped"/>
	<input type="submit" name="ship" id="ship" value="Ship Order"/>
       </form></td>';
}
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
  <?php include_once("../template_footer.php");?>
</div>
</body>
</html>
