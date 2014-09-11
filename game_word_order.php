<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Sortable - Display as grid</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <style>
  #sortable { 
  	list-style-type: none; 
  	margin: 0; 
  	padding: 0; 
  	width: 750px; 
  }
  #sortable li { 
  	margin: 3px 3px 3px 0; 
  	padding: 1px; 
  	float: left; 
  	width: auto; 
  	height: 50px; 
  	font-size: 1em; 
  	text-align: center; 
  }
  </style>
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });

	function hint()
	{
		alert("Seriously, you need Hint? It's only from first 13 pages of Guru Granth Sahib Ji (NitNem)");
	}

	function check()
	{
		alert("Working on this feature.");
	}	
  
  </script>
</head>
<body>
 
 <?php
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

$result = mysqli_query($con,"SELECT text, id, page, line FROM scriptures where page<=13 order by RAND() LIMIT 1");

$row = mysqli_fetch_array($result);
$line = $row['text'];
$words = explode(' ',$line);
shuffle($words);
echo "<!-- ".$line." -->";
//echo "<br>";



?>
<h2>Gurbani - Game - Word Order</h2>
<h3>Please Drag and Drop words of Gurbani line in Correct Order.</h3> 
<hr/>
<ul id="sortable">
<?php 
foreach ($words as $word)
	echo '<li class="ui-state-default">'.$word.'</li>';
?>

</ul>

<div style='clear: both;'></div>

<hr/>

<button onclick="check()">Check Answer</button>
<br/><br/>
<button onclick="hint()">Hint</button>
 
 
</body>
</html>