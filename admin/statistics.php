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
<title><?php echo $_GET['interval'] ?> Days</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("../template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
   <p><a href="statistics.php?interval=7">7 days</a>|<a href="statistics.php?interval=30">30 days</a>|<a href="statistics.php?interval=365">365 days</a></p>

<?php
require_once('../../../webstore/mysqli_connect.php');

$query = "SELECT *, SUM(ordered.quantity) FROM transactions natural join (ordered, items) where items.IID = ordered.IID and tDate BETWEEN NOW() - INTERVAL ".$_GET['interval']." DAY AND NOW() group by ordered.IID";

//$query = "SELECT distinct TID, total, status, tDate FROM transactions where tDate BETWEEN NOW() - INTERVAL ".$_GET['interval']." DAY AND NOW()";
// Get a response from the database by sending the connection
// and the query
$total_rev = 0;
//$total = 0;
$response = @mysqli_query($conn, $query);
// If the query executed properly proceed
if($response){
//cellspacing="5" cellpadding="8">
echo'<tr><td align="left"><b>IID #</b></td>
<td align="left"><b>Price </b></td>
<td align="left"><b>Quantity Sold</b></td>
<td align="left"><b>Total</b></td></tr>';
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

$quantity = $row["SUM(ordered.quantity)"];
$price= $row['price'];
$total = $price * $quantity;
$total_rev += $total;
echo '<tr><td>'.$row['IID'].'</td><td align="left">' .
$row['price'] . '</td><td align="left">' .
$row['SUM(ordered.quantity)'] . '</td><td align="left">' .
'$' . $total . '</td><td align="left">';
echo '</tr>';

}
echo "Total Revenue for the past ".$_GET['interval']." Days: ".$total_rev;
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
