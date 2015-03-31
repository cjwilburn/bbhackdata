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
p.yearID,
m.birthCountry,
m.birthState,
m.birthCity,
p.ERA
from scotchbox.Master m join Pitching p where m.playerID = p.playerID");

$rows = array();

while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}

//print_r(json_encode($rows));

$file = "pitching.json";

file_put_contents($file, json_encode($rows,TRUE));

?>