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

$volume=0.5;
if($_GET['volume'])
{
    $volume=$_GET['volume'];
}

$autoplay='';
if($_GET['autoplay'])
{
    $autoplay='autoplay';
}

?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>

$( document ).ready(function() {
	  // Handler for .ready() called.
	  
	var myAudio = document.getElementById('audio');
	
	myAudio.volume = <?php echo $volume?>;
		
	myAudio.addEventListener("ended", function() 
	{
		
		var volume = parseInt(myAudio.volume,10);
		//console.log(volume);

		document.getElementById('volume').value = volume;
		
		document.getElementById('page').value = parseInt(document.getElementById('current_page').value,10) + 1; 

		document.mainform.submit(); 
		
	    //alert("ended");
	    
	}
	);
	  
	});
	


</script>
     
</head>
<body>

<?php 
echo "Page: " . $page . "";
$prev = $page - 1;
$next = $page + 1;
echo " - <a id='prev_page' href='page.php?page=$prev'>Prev</a>";
echo " - <a id='next_page' href='page.php?page=$next'>Next</a>";
?>
<form name="mainform" action="page.php" method="get">
Go to Page: <input id='page' type="text" name="page" size="4" maxlength="4">
<input id='volume' type="hidden" name="volume" value='<?php echo $volume?>'>
<input type="submit" value="Submit">
</form>
<input id='current_page' type="hidden" name="current_page" value="<?php echo $page?>">

<audio id="audio" controls autoplay>
  <source src="../audio/Page <?php echo $page; ?>.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<?php 
echo "<hr/>";

$result = mysqli_query($con,"SELECT scriptures.text as text, translations.text as trans FROM translations inner join scriptures on scriptures.id = translations.scripture_id
where translations.language_id=13 and page=$page order by scripture_id");

while($row = mysqli_fetch_array($result)) {
  echo "<b>".$row['text']."</b>";
  echo "<br>";
  echo "".$row['trans']."";
  echo "<br><br>";  
  
}
mysqli_close($con);
echo "<hr/>";
?>
</body>
</html>