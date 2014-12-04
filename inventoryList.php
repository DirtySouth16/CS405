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
echo '<table align="left"
cellspacing="5" cellpadding="8">
<tr><td align="left"><b>Name</b></td>
<td align="left"><b>ID #</b></td>
<td align="left"><b>Price</b></td>
<td align="left"><b>In Stock</b></td></tr>';
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
echo '<tr><td align="left">' . 
$row['name'] . '</td><td align="left">' . 
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
