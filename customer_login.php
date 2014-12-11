<?php
session_start();

if (isset($_SESSION["CID"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["CID"]) && isset($_POST["password"])) {

	$CID = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["CID"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    
    $data_missing = array();
    
    if(empty($_POST['CID'])){

        // Adds name to array
        $data_missing[] = 'Username';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['CID']);

    }

    if(empty($_POST['password'])){

        // Adds name to array                                                                         
        $data_missing[] = 'password';

    } else {

        // Trim white space from the name and store the name                                          
        $pass = trim($_POST['password']);

    }



	if(empty($data_missing)){

	// Connect to the MySQL database  
    require_once('../../webstore/mysqli_connect.php'); 
   // include "../../../webstore/mysqli_connect.php";
    $query= "SELECT first_name FROM customers WHERE CID = ? AND password = ? LIMIT 1"; // query the person
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, 'is', $CID, $password);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $first_name);
	mysqli_stmt_store_result($stmt);
	 // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_stmt_num_rows($stmt); // count the row nums
    if ($existCount == 1) { // evaluate the count
	 mysqli_stmt_fetch($stmt);
	 
	 $_SESSION["CID"] = $CID;
	 $_SESSION["first"] = $first_name;
	 $_SESSION["password"] = $password;
	 header("location: index.php");
         mysqli_stmt_close($stmt);
	 mysqli_close($conn);
	 exit();
    } else {
		echo 'That information is incorrect, try again <a href="customer_login.php">Click Here</a>';
		exit();
	}
	}else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }
	


}
?>
<!DOCTYPE html>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Log In </title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent"><br />
    <div align="center" style="margin-left:24px;">
      <h2>Please Log In</h2>
      <form id="form1" name="form1" method="post" action="customer_login.php">
       
	<div class="input-group">
  		<span class="input-group-addon">Username:</span>
 		 <input type="text" placeholder="Email" name="CID" size="30" value="">
	</div>
	<br />
	<div>
	  <span class="input-group-addon">Password:</span>
	  <input type="password" placeholder="password" name= "password" size="30" value="">
	</div>
<!--
	 User Name:<br />
          <input name="CID" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
-->    
      <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
      <br />
	<br />
      </form>
    </div>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>
