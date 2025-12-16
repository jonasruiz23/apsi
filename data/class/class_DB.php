<?php

session_start();
error_reporting(0);


date_default_timezone_set('Asia/Manila');




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apsiserveronline";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}







// DB credentials.
define('DB_HOST',$servername);
define('DB_USER',$username);
define('DB_PASS',$password );
define('DB_NAME',$dbname);
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}



// echo accountlogs("Do","Form","Description","$No",$userid);

?>

