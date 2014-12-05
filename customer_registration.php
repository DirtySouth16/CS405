<html>
<head>
<title>Customer Registration</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>

<?php
if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['FirstName'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['FirstName']);

    }

    if(empty($_POST['LastName'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else{

        // Trim white space from the name and store the name
        $l_name = trim($_POST['LastName']);

    }

    if(empty($_POST['CID'])){

        // Adds name to array
        $data_missing[] = 'Email';

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

        require_once('../../webstore/mysqli_connect.php');

        $query = "INSERT INTO customers (CID, last_name, first_name, password, start_date, is_vip)
         VALUES (?, ?, ?, ?, NOW(), 0)";

        $stmt = mysqli_prepare($conn, $query);
        /*
        i Integers
        d Doubles
        b Blobs
        s Everything Else
      */
        mysqli_stmt_bind_param($stmt, 'ssss', $email, $l_name,
                               $f_name, $pass);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Account Created';

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}
?>	 

<form action="http://www.cs.uky.edu/~llwi222/webstore/customer_registration.php" method="post">
<div align="center" id="mainWrapper">                                                                              
  <?php include_once("template_header.php");?>                                                                     
  <div id="pageContent">
<h2><b>Customer Registration</b></h2>
<div class="input-group">
  <span class="input-group-addon">First Name:</span> 
  <input type="text" placeholder="First" name="FirstName" size="30" value="">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">Last Name:</span>
  <input type="text" placeholder="Last" name="LastName" size="30" value="">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">Email:</span>
  <input type="text" placeholder="Email" name="CID" size="30" value="">
</div>
<br />
<div>
  <span class="input-group-addon">Password:</span>
  <input type="text" placeholder="password" name= "password" size="30" value="">
</div>   
<!--                                                                           
<p>First Name:                                                                                                     
<input type="text" name="FirstName" size="30" value="" />                                                          
</p>                                                                                                               
                                                                                                                   
<p>Last Name:                                                                                                      
<input type="text" name="LastName" size="30" value="" />                                                           
</p>                                                                                                               
                                                                                                                   
<p>Email:                                                                                                          
<input type="text" name="CID" size="30" value="" />                                                                
</p>                                                                                                               
                                                                                                                   
<p>Password:                                                                                                       
<input type="text" name="password" size="30" value="" />                                                           
</p>
-->   
<br />
<button type="submit" name="submit" class="btn btn-default">Submit</button>
<br />
</form>
</div>
	<?php include_once("template_footer.php");?>
</div>

</body>
</html>
