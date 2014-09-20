<?php
ini_set('display_errors',1);
error_reporting (E_ALL);
set_time_limit(0);
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

$srp=array();
$sql="SELECT id, eng FROM scripturesFix order by id";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	$id=intval($row['id']);
	$srp[$id]=$row['eng'];
}

$t = count($srp);
echo count($srp);

echo "<hr/>";

$igs=array();
$sql="SELECT ID, eng FROM igs order by ID";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	$id=intval($row['ID']);
	$igs[$id]=$row['eng'];
}

echo count($igs);

echo "<hr/>";

$d=0;
for($n=1; $n <= 10000; $n++)
{
	$s=$srp[$n];
	$r=$n+$d;
	$i=$igs[$r];
	if($s!=$i)
	{
		echo "<br/>Mismatch at $n vs $r for <br/>$s <br/>$i";

		$l1 = strlen($s);
		$l2 = strlen($i);
		
		echo "L1 $l1 and L2 $l2 <br/>";
		
		$l1 = $l1-$l2;
		
		$k=$r;
		$p=0;
		while ($l1 > 0)
		{
			$k++;
			$l2=strlen($igs[$k]);
			$l1=$l1-$l2;
			echo "L1 $l1 and L2 $l2 for K $k <br/>";			
			$d++;
			$p++;
		}
		
		if($l1!==0)
			echo " ERROR";
		else 
			echo " > Lines jumped $p"; 
		
		// how many lines to jump ?

		// checkout  
		
		
	}	
	
	
	
}

echo "<hr/>$d";

mysqli_close($con);


?>