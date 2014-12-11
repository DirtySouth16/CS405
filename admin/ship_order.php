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

$query = "select * from ordered where TID = ".$_POST["tid"];

$result = mysqli_query($conn, $query);
//mysqli_query($conn, $result);

while($row = mysqli_fetch_array($result)){
		$iid = $row["IID"];
		echo $iid;
		$query = "UPDATE items set quantity = quantity-(select quantity from ordered where TID = ".$_POST["tid"]." and IID = ".$iid.") where IID = ".$iid;
		mysqli_query($conn, $query);
}
mysqli_close($conn);
header("location: Orders.php");
}
?>
