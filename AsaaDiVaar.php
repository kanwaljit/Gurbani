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

$result = mysqli_query($con,"SELECT text FROM scriptures where (page>=462 && line=>17)  && (page<=475 and line<=10) order by id ");

while($row = mysqli_fetch_array($result)) {
  echo "<h2>".$row['text']."<h2>";
  echo "<br>";
}

?>