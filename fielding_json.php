<?php
 
ini_set('memory_limit', '6400M');
ini_set('max_execution_time', 300);

$username = "root";
$password = "root";
$hostname = "localhost";
$dbname = "scotchbox";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, $dbname) 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

$sth = mysqli_query($dbhandle, "select 
m.nameFirst,
m.nameLast,
m.nameGiven,
f.yearID,
m.birthCountry,
m.birthState,
m.birthCity,
f.POS,
f.InnOuts,
f.PO,
f.A
from scotchbox.Master m join Fielding f where m.playerID = f.playerID");

$rows = array();

while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}

//print_r(json_encode($rows));

$file = "fielding.json";

file_put_contents($file, json_encode($rows,TRUE));

?>