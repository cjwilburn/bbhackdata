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
b.yearID,
m.birthCountry,
m.birthState,
m.birthCity,
(b.H / b.AB) as battingAVG,
((b.H + b.BB + b.HBP)/(b.AB + b.BB + b.HBP + b.SF)) as OBP,
(b.H - (b.2B + b.3B + b.HR)) as singles,
(((b.H - (b.2B + b.3B + b.HR)) + b.2B + b.3B + b.HR)/b.AB) as slugging,
(((b.H - (b.2B + b.3B + b.HR)) + b.2B + b.3B + b.HR)/b.AB) + ((b.H + b.BB + b.HBP)/(b.AB + b.BB + b.HBP + b.SF)) as OPS
from scotchbox.Master m join Batting b where m.playerID = b.playerID");

$rows = array();

while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}

//print_r(json_encode($rows));

$file = "batting.json";

file_put_contents($file, json_encode($rows,TRUE));

?>