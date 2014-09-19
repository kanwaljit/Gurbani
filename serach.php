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

/*
SELECT s.`search`, COUNT(*) AS tot FROM scriptures s GROUP BY search ORDER BY tot DESC;
SELECT TEXT FROM scriptures WHERE search='';



 */
mysql_set_charset('utf8', $con);

$sql = "SELECT letter, tot FROM letter ORDER BY letter";

$result = mysqli_query($con,$sql);

$row_cnt = $result->num_rows;

echo "Total letters = " . $row_cnt;

while($row = mysqli_fetch_array($result)) {
	$letter = $row['letter'];
	$tot = $row['tot'];
  echo "<b><a href='letter.php?letter=$letter'>".$letter."</a></b> (".$tot.") - ";
}

echo "<hr/>";

if($_GET['letter'])
{
	$letter = $_GET['letter'];
	
	mysql_set_charset('utf8', $con);
	
	$sql = "SELECT word, tot from word where	word like '$letter%' order by word";
	
	$result = mysqli_query($con,$sql);
	
	$row_cnt = $result->num_rows;
	
	echo "Total words = " . $row_cnt;
	
	echo "<br><br>";
	
	while($row = mysqli_fetch_array($result)) {
		
	$word = $row['word'];
	$tot = $row['tot'];
	echo "<b><a href='akhar.php?akhar=$word'>".$word."</a></b> - " . $tot;		
	echo "<br>";
	}
	
	echo "<hr/>";
	
} 

mysqli_close($con);


?>