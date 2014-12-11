<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_SESSION["employee"])){
        header("location: employee_login.php");
        exit();
}

if(isset($_POST['ship'])){
require_once('../../../webstore/mysqli_connect.php');
$query = "UPDATE transactions set status='Shipped' where TID =".$_POST["tid"];

mysqli_query($conn, $query);
mysqli_close($conn);
header("location: Orders.php");

//header("location: product.php?id=".$_POST["iid"]);
}
?>
