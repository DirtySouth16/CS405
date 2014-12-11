<?php session_start();

if (!isset($_SESSION["employee"])){
        header("location: employee_login.php");
        exit();
}
if(isset($_POST['ship'])){
require_once('../../../webstore/mysqli_connect.php');
$query = "UPDATE transactions set status=? where IID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'si', $_POST["Shipped"], $_POST["tid"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


mysqli_close($conn);
header("location: Ordesrs.php");

//header("location: product.php?id=".$_POST["iid"]);
}

