<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="UnicodeConverter_v1.js"></script>
<style type="text/css">
@font-face {
 font-family: MyCustomFont;
 src: url("Gurblipi.eot") /* EOT file for IE */
}
@font-face {
 font-family: MyCustomFont;
 src: url("Gurblipi.ttf") /* TTF file for CSS3 browsers */
}
span {
 font-family: MyCustomFont;
}
</style>
<title>Gurbani Hymn</title>
</head>
<body>
<?php 
// Create connection
$con=mysqli_connect("localhost","gurbani","gurbani","gurbani");

// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* change character set to utf8 
if (!$con->set_charset("utf8")) {
    //printf("Error loading character set utf8: %s\n", $con->error);
} else {
    //printf("Current character set: %s\n", $con->character_set_name());
}
*/


if($_GET['page'])
{
 
	$page = $_GET['page'];
	$where = " page=".$page;
	if($_GET['line'])
	{
		$line = $_GET['line'];
		$where .= " AND line=".$line;
	}
} else if($_GET['id'])
{
	$id = $_GET['id'];
	$where .= " AND id=".$id;
} else
{
	$id = rand(1,60629);
	$where = " id=".$id;
}

echo "Page: " . $page . "";
echo " - Line: " . $line . "";
echo " - ID: " . $id . "";
$prev_page = $page - 1;
$next_page = $page + 1;
$prev_id = $line_id - 1;
$next_id = $line_id + 1;
echo " - <a id='prev_page' href='teeka.php?page=$prev_page'>Prev Page</a>";
echo " - <a id='next_page' href='teeka.php?page=$next_page'>Next Page</a>";
echo " - <a id='prev_page' href='teeka.php?id=$prev_id'>Prev Line</a>";
echo " - <a id='next_page' href='teeka.php?id=$next_id'>Next Line</a>";
?>
<form name="mainform" action="page.php" method="get">
Go to Page: <input id='page' type="text" name="page" size="4" maxlength="4">
<input type="submit" value="Submit">
</form>

<?php 
echo "<hr/>";

$sql = "SELECT gurmukhi, teeka, english, id FROM igs where $where order by ID";

$result = mysqli_query($con,$sql);



//echo $sql;
//echo "<span id='txtPanFont'>";
while($row = mysqli_fetch_array($result)) {
  echo "<span id='txtPanFont'>".$row['gurmukhi'];
  echo " <br/> ";
  echo $row['teeka']."</span>";
  echo "<br/>";
  //echo "".$row['english']."";
  //echo "<br/>";
  echo "<br/>";    
}
//echo "</span>";

echo "<hr/>";

echo "<div id='txtUniFont'>";
echo "</div>";

echo "<hr/>";

echo '<input value="Convert To Unicode" onclick="convert()" type="button">';

echo "$page - $line - $id"; 

mysqli_close($con);


?>
</body>
</html>