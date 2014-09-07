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


if($_GET['page'])
{
	$page = $_GET['page'];
} else 
{
	$page = rand(1,1430);
}

$result = mysqli_query($con,"SELECT scriptures.text as text, translations.text as trans FROM translations inner join scriptures on scriptures.id = translations.scripture_id
where translations.language_id=13 and page=$page order by scripture_id");

while($row = mysqli_fetch_array($result)) {
  echo "<b>".$row['text']."</b>";
  echo "<br>";
  echo "".$row['trans']."";
  echo "<br><br>";  
  
}

echo "<hr/>";

echo $page; 

mysqli_close($con);


?>