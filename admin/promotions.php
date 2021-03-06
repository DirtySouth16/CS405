<?php

session_start();
if(!isset($_SESSION["employee"])){
  header("location: employee_login.php");
  exit();
}
?>

<?php
require_once('../../../webstore/mysqli_connect.php');
if(isset($_POST['eDate'])){
	$query = "insert into sales values(NULL, ".$_POST['update_price']/100 .", STR_TO_DATE('".$_POST['sDate']."', '%Y-%m-%D'),STR_TO_DATE('".$_POST['eDate']."', '%Y-%m-%D')) ";
	mysqli_query($conn, $query);
	$result = mysqli_query($conn, "select MAX(SID) from sales");
	$row = mysqli_fetch_array($result);
	$SID = $row['MAX(SID)'];
	mysqli_query($conn, "insert into promotes values(".$_SESSION['employee'].", ".$SID.")");
	mysqli_query($conn, "insert into on_sale values( ".$_POST['iid'].", ".$SID.")");
}
?>

<!DOCTYPE html>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Promotions</title>
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
//Output Header
// Create a query for the database
$query = "SELECT IID, name, price, quantity FROM items";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($conn, $query);
// If the query executed properly proceed
if($response){
/*echo '<table align="left"
cellspacing="5" cellpadding="8">*/
echo '<tr><td align="left"><b>Name</b></td>
<td align="left"><b>ID #</b></td>
<td align="left"><b>Price</b></td>
<td align="left"><b>In Stock</b></td>
<td align="left"><b>Sale % &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Start &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; End</b></td></tr>';
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
echo '<tr><td align="left">' .
$row['name'] . '</td><td align="left">' .
$row['IID'] . '</td><td align="left">' .
$row['price'] . '</td><td align="left">' .
$row['quantity'] . '</td><td align="left">' ;
//Input and button for updating sale price
echo '<form id=form'.$row['IID'].' method="post" action="promotions.php">
        <input type="hidden" name="iid" id="iid" value="'.$row['IID'].'" />
        <input type="text" name="update_price" id="update_price"/>
	 <input type="date" name="sDate">
	 <input type="date" name="eDate">
        <input type="submit" name="sale" id="sale" value="Commit"/>
       </form></td>';

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
