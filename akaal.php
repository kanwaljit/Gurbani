<?php

   
$dbhandle = sqlite_open('akaal.db', 0666, $error);

if (!$dbhandle) die ($error);
    
$query = "SELECT name FROM my_db.sqlite_master WHERE type='table'";
$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
print_r($row);
echo "<br>";

sqlite_rewind($result);
$row = sqlite_fetch_array($result, SQLITE_NUM); 
print_r($row);
echo "<br>";

sqlite_rewind($result);
$row = sqlite_fetch_array($result, SQLITE_BOTH); 
print_r($row);
echo "<br>";

sqlite_close($dbhandle);   
   
?>