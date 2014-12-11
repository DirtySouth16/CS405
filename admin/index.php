<?php
session_start();
if(!isset($_SESSION["employee"])){
  header("location: employee_login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Page</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">

  <?php include_once("../template_header.php");?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <p><a href="http://www.cs.uky.edu/~llwi222/webstore/admin/inventory.php">Inventory</a><br />
      <p><a href="http://www.cs.uky.edu/~llwi222/webstore/admin/getCustomerInfo.php">Customers</a><br />
      <p><a href="http://www.cs.uky.edu/~llwi222/webstore/admin/Orders.php">Orders</a><br />
	<?php if($_SESSION["manager"]==1){ echo "<p><a href='http://www.cs.uky.edu/~llwi222/webstore/admin/promotions.php'>Promotions</a><br /><p><a href='http://www.cs.uky.edu/~llwi222/webstore/admin/statistics.php'>Statistics</a><br /> ";}?>
    </div>
    <br />
  <br />
  <br />
  </div>
  <?php include_once("../template_footer.php");?>
</div>
</html>
