<?php
$username = "root";
$password = "root";
$hostname = "localhost";
$dbname = "scotchbox";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, $dbname) 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

?>