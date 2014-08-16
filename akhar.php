<?php
ini_set('display_errors',1);
error_reporting (E_ALL);
set_time_limit(0);
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


$sql="SELECT text, page, line FROM scriptures where page<14 order by id";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)) {
	$words = explode(' ', $row['text']);
	$page = $row['page'];
	$line = $row['line'];
	echo $page . ' - ' . $line; 
	foreach($words as $index => $word)
	{
		//$query = "INSERT INTO myCity VALUES (NULL, 'Stuttgart', 'DEU', 'Stuttgart', 617000)";
			$word_count = $index + 1;
			//echo $word_count . ' - ' . $word."<br>";
			$sql="INSERT INTO akhar (akhar, page, line, word) VALUES ('$word', $page, $line,$word_count)";
			mysqli_query($con, $sql);
	}		
}

echo "<hr/>";

mysqli_close($con);


?>