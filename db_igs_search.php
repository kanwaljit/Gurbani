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
<span>
<?php 
ini_set('display_errors',1);
error_reporting (E_ALL);
set_time_limit(0);

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


$sql="SELECT ID,gurmukhi FROM igs where page>2 and page<=100 order by ID";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)) {
	//echo $row['text'] . '<br/>';
	$id = $row['ID'];
	$text= $row['gurmukhi'];
	$words = explode(' ', $text);
	//$page = $row['page'];
	//$line = $row['line'];
	//echo $page . ' - ' . $line . '<br/>';
	$search = ''; 
	foreach($words as $word)
		$search .= $word[0];
	
	echo $text . ' = ' . $search . '<br/>';
			
	$sql="UPDATE igs set search = '$search' where ID=$id";
	mysqli_query($con, $sql);		
}

mysqli_close($con);


?>
</span>
</body>
</html>