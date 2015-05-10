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
$sql="SELECT id, search FROM scripturesfix where page>254 and page<=255 order by id";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	$id=intval($row['id']);
	$srp[$id]=$row['search'];
}

$t = count($srp);
echo count($srp);

echo "<hr/>";

$igs=array();
$sql="SELECT ID, search FROM igs  where page>254 and page<=255 order by ID";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	$id=intval($row['ID']);
	$igs[$id]=$row['search'];
}

echo count($igs);

echo "<hr/>";

$d=0;
for($n=1; $n <= $t; $n++)
{
	$s=$srp[$n];
	$r=$n+$d;
	$i=$igs[$r];
	
	if($s!=$i)
	{
		echo "<hr/><br/>Mismatch at $n vs $r for <br/>$s <br/>$i";

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
		
		
		if($l1!==0) {
			echo " ERROR";
			$sql="UPDATE scripturesfix set new_id=$r where id=$n";
			mysqli_query($con, $sql);
		}
		else 
		{
			echo " > Lines jumped $p";

			
			//$sql="UPDATE scripturesfix set new_id=$r where id=$n";
			//mysqli_query($con, $sql);			
			
			for($new=1; $new<=$p; $new++)
			{
				$new_id=$r+$new;
				$new_search =  $igs[$new_id];
				// insert new lines with adjusted id
				//$sql="INSERT INTO scripturesfix (new_id,search) values ($new_id, '$new_search')";
				//mysqli_query($con, $sql);
			}
			// cut out and paste into new line ?
			
		}
		// how many lines to jump ?

		// checkout  
		
		
	} else {
		//$sql="UPDATE scripturesfix set new_id=$r where id=$n";
		//mysqli_query($con, $sql);		
	}	
	
	
	
}

echo "<hr/>$d";

mysqli_close($con);


?>