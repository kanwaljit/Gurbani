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

$search = $_GET['q'];

echo "Search for: $search";
echo "<hr/>";

mysql_set_charset('utf8', $con);

$sql = "SELECT id, text, page, line, hymn FROM gurbani.scriptures WHERE search LIKE '%" . $search . "%' ORDER BY id;";


$result = mysqli_query($con,$sql);
$row_cnt = $result->num_rows;

echo "Total lines = " . $row_cnt;
echo "<hr/>";

while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
	$text = $row['text'];
	$page = $row['page'];
	$line = $row['line'];
	$hymn = $row['hymn'];
	
  echo "<b>".$row['text']."</b>";
  echo "<br/>";
  echo 'Scripture Id: ';
  echo $id;
  echo ' - Hymn: ';
  echo "<a href='hymn.php?hymn=$hymn'>".$hymn."</a>";
  echo ' - Page: ';
  echo "<a href='page.php?page=$page'>".$page."</a>";
  echo ' - Line: ';
  echo $line;
  echo ' - Teeka: ';
  echo "<a href='teeka.php?page=".$page."&line=".$line."'>".$page."-". $line."</a>";
  echo "<br/><hr/>";
}

mysqli_close($con);

echo "<hr/>";

?>