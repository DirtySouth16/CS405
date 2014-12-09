<?php session_start();

if (!isset($_SESSION["CID"])){
	header("location: customer_login.php");
	exit();
}
if(isset($_POST['add_to_cart'])){
require_once('../../webstore/mysqli_connect.php');
$query = "INSERT INTO in_cart (CID, IID, quantity) VALUES ( ?, ?, ?) ON DUPLICATE KEY UPDATE quantity=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'siii', $_SESSION["CID"], $_POST["iid"], $_POST["cart_quantity"], $_POST["cart_quantity"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


mysqli_close($conn);
header("location: my_cart.php");

//header("location: product.php?id=".$_POST["iid"]);
}
?>
