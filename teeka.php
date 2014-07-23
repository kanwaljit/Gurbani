<?php
//header('Content-Type: text/html; charset=utf-8');
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


if($_GET['shabad'])
{
	$shabad = $_GET['shabad'];
} else 
{
	$shabad = rand(1,5540);
}

$sql = "SELECT teeka, english FROM igs where shabd=$shabad order by ID";

$result = mysqli_query($con,$sql);

//echo $sql;
echo "<span id='txtPanFont'>";
while($row = mysqli_fetch_array($result)) {
  echo $row['teeka'];
  echo "\n";
}
echo "</span>";

echo "<hr/>";

echo "<span id='txtUniFont'>";
echo "</span>";

echo "<hr/>";

echo '<input value="Convert" onclick="convert()" type="button">';

echo $shabad; 

mysqli_close($con);


?>
</body>
</html>