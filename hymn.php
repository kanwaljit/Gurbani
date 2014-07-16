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


if($_GET['hymn'])
{
	$hymn = $_GET['hymn'];
} else 
{
	$hymn = rand(1,5540);
}

$result = mysqli_query($con,"SELECT scriptures.text as text, translations.text as trans FROM translations inner join scriptures on scriptures.id = translations.scripture_id
where translations.language_id=13 and hymn=$hymn order by scripture_id");

while($row = mysqli_fetch_array($result)) {
  echo "<b>".$row['text']."</b>";
  echo "<br>";
  echo "".$row['trans']."";
  echo "<br><br>";  
  
}

echo "<hr/>";

echo $hymn; 

mysqli_close($con);


?>