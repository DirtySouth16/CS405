<?php session_start();

if (!isset($_SESSION["employee"])){
        header("location: employee_login.php");
        exit();
}
if(isset($_POST['update'])){
require_once('../../../webstore/mysqli_connect.php');
$query = "UPDATE items set quantity=? where IID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ii', $_POST["update_quantity"], $_POST["iid"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


mysqli_close($conn);
header("location: inventory.php");

//header("location: product.php?id=".$_POST["iid"]);
}
?>
