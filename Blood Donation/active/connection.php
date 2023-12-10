<?php
// php tasg has been applied for this page
$servername = "localhost";
// username has been written for the database connection
$username = "root";
// password has been written for the database connection
$password = "";
// database file name has been written for the database connection
$dbname = "onlineblood";
// conn variable has been applied here to select all the other variables.
$conn = new mysqli($servername, $username, $password, $dbname);
// if condition has been applied here to check the connection
if(!$conn){
    // die has been applied if database is connect successfully.
 die('Could not Connect MySql:' .mysql_error());
 // php tag has bee stopped
}
?>