<?php session_start();
if (!isset($_SESSION["CID"])){
	header("location: customer_login.php");
	exit();
}
if(isset($_POST['submit'])){
require_once('../../webstore/mysqli_connect.php');
$query = "INSERT INTO in_cart (CID, IID) VALUES ( ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'si', $_SESSION["CID"], $_POST["iid"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


mysqli_close($conn);
header("location: product.php?id=".$_POST["iid"]);
}
?>
