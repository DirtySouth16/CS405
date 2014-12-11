<html>
<head>
<title>Add Customer</title>
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

<form action="http://www.cs.uky.edu/~llwi222/webstore/customer_added.php" method="post">
    
<b>Add a New Customer</b>
    
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

<p>
    <input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>
