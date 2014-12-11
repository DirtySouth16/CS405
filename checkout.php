<?php session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

if(!isset($_SESSION["CID"])){
        header("location: customer_login.php");
        exit();
}

if(isset($_POST['checkout'])){
require_once('../../webstore/mysqli_connect.php');
$query =  "insert into transactions values(NULL, 'Pending',". $_POST["total"].",now())"; 
mysqli_query($conn,$query);


$result =mysqli_query($conn, "select MAX(TID) from transactions");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$TID = $row["MAX(TID)"];

mysqli_query($conn, "insert into purchased values ('".$_SESSION["CID"]."', ".$TID.")");

$query = "select in_cart.IID, in_cart.quantity from items, in_cart where in_cart.CID = ? and in_cart.IID = items.IID";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $_SESSION["CID"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $IID, $quantity);//, $price, $name, $CID, $cart_IID, $cart_quantity);
mysqli_stmt_store_result($stmt);
$productCount = mysqli_stmt_num_rows($stmt); // count the output amount
$total = 0;
if ($productCount > 0) {
        while($row = mysqli_stmt_fetch($stmt)){
                        $id = $IID;
			$quantity = $quantity;
			mysqli_query($conn, "insert into ordered values (".$TID.",".$id.",".$quantity.")");
			mysqli_query($conn, "delete from in_cart where CID = '".$_SESSION["CID"]."'");
			}

		}
mysqli_close($conn);
header("location: my_orders.php");

//header("location: product.php?id=".$_POST["iid"]);
}
?>

