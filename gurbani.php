<?php
header('Content-Type: text/html; charset=utf-8');
// Create connection
$con=mysqli_connect("localhost","gurbani","gurbani","gurbani");

// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* change character set to utf8 */
if (!$con->set_charset("utf8")) {
    //printf("Error loading character set utf8: %s\n", $con->error);
} else {
    //printf("Current character set: %s\n", $con->character_set_name());
}

$line_id = rand(1,60341);
$shabad_id=0;
$hymn=0;
$page=0;
$line=0;

$result = mysqli_query($con,"SELECT text, shabad_id, hymn, page, line FROM Scriptures where id=$line_id");

while($row = mysqli_fetch_array($result)) {
  echo "<h2>".$row['text']."<h2>";
  $shabad_id = $row['shabad_id'];
  $hymn = $row['hymn'];
  $page = $row['page'];
  $line = $row['line'];
  echo "<br>";
}

echo "<hr/>";

$result = mysqli_query($con,"SELECT text FROM translations where language_id=13 and scripture_id=$line_id");

while($row = mysqli_fetch_array($result)) {
  echo "<h2>".$row['text']."<h2>";
  echo "<br>";
}

echo "<hr/>";

echo ' - Scripture Id: ';

echo $line_id; 

mysqli_close($con);

echo ' - Shabad: ';

echo "<a href='shabad.php?shabad_id=$shabad_id'>".$shabad_id."</a>";

echo ' - Hymn: ';

echo "<a href='hymn.php?hymn=$hymn'>".$hymn."</a>";

echo ' - Page: ';

echo "<a href='page.php?page=$page'>".$page."</a>";

echo ' - Line: ';

echo $line;
?>