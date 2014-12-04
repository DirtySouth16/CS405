<?php
session_start();
error_reporting(E_ALL);
if (isset($_SESSION["employee"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["EID"]) && isset($_POST["password"])) {

	$EID = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["EID"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    require_once('../../../webstore/mysqli_connect.php'); 
   // include "../../../webstore/mysqli_connect.php";
    $query= "SELECT is_manager FROM employees WHERE EID = ? AND password = ? LIMIT 1"; // query the person
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, 'is', $EID, $password);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt,$manager);
	mysqli_stmt_store_result($stmt);
	//mysqli_stmt_bind_result($manager);
	 // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_stmt_num_rows($stmt); // count the row nums
    if ($existCount == 1) { // evaluate the count
	while($row = mysqli_stmt_fetch($stmt)){ 
	  //   $manager = $row["is_manager"];
	 }
	 $_SESSION["manager"] = $manager;
	 $_SESSION["employee"] = $EID;
	 $_SESSION["password"] = $password;
	 header("location: index.php");
         mysqli_stmt_close($stmt);
	 mysqli_close($conn);
	 exit();
    } else {
		echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
		exit();
	}
}
?>
<!DOCTYPE html>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Log In </title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("../template_header.php");?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Please Log In To Manage the Store</h2>
      <form id="form1" name="form1" method="post" action="employee_login.php">
        User Name:<br />
          <input name="EID" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
       
      </form>
      <p>&nbsp; </p>
    </div>
    <br />
  <br />
  <br />
  </div>
  <?php include_once("../template_footer.php");?>
</div>
</body>
</html>
