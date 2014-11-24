
<?php
/*
$dbhost = 'mysql.cs.uky.edu';
$dbname = 'cs405webstore';
$dbuser = 'adminwS9wZ2Z';
$dbpass = '_yihkn4GmKrd'; 
<<<<<<< HEAD
=======

>>>>>>> 327b93849b8e39f66e31a2f71f0706323e255b94
$db_host = $_ENV['OPENSHIFT_DB_HOST'];
$db_user = $_ENV['OPENSHIFT_DB_USERNAME'];
$db_pass = $_ENV['OPENSHIFT_DB_PASSWORD'];
$db_name = $_ENV['OPENSHIFT_APP_NAME'];
$db_port = $_ENV['OPENSHIFT_DB_PORT'];
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
*/
require_once('../../webstore/mysqli_connect.php');

require_once('../../webstore/mysqli_connect.php');

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$query_file = 'makeTables.sql';
$sql = file_get_contents($query_file);
if($sql === FALSE)
{
  die("Could not open SQL file.");
}
$retval = mysqli_multi_query( $conn, $sql);
printf("Tables created successfully<br>");
mysqli_close($conn);
?>
