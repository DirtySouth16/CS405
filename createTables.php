<?php
$dbhost = 'mysql.cs.uky.edu';
$dbname = 'llwi222';
$dbuser = 'llwi222';
$dbpass = 'britt1an'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


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
