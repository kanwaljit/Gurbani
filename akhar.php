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


if($_GET['akhar'])
{
	$akhar = $_GET['akhar'];
} else 
{
	// pick random from akhar table
	$sql = "SELECT word FROM word ORDER BY RAND() LIMIT 1;";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$akhar=$row['word'];
}
echo $akhar;

mysql_set_charset('utf8', $con);

$sql = "SELECT text, page, line from scriptures where
(text like '$akhar %' ) OR 
(text like '% $akhar %' ) OR
(text like '% $akhar' ) 
order by id";

//echo "<br><br>";

//echo $sql;

echo "<br><br>";

$result = mysqli_query($con,$sql);

$row_cnt = $result->num_rows;

echo "Total Tuks = " . $row_cnt;

echo "<br><br>";


while($row = mysqli_fetch_array($result)) {
  $page=$row['page'];
  $line=$row['line'];
  echo "<b>".$row['text']."</b> - page: <a href='page.php?page=$page'>".$page."</a> - line: " .$row['line'] ." - <a href='teeka.php?page=".$page."&line=".$line."'>Teeka</a>";
  echo "<br>";  
  
}

echo "<hr/>";

echo $shabad_id; 

mysqli_close($con);


?>