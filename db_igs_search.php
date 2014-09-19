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


$sql="SELECT ID,gurmukhi FROM igs where page<=20 order by ID";

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
		$search .= convert(($word[0]=='i')?$word[1]:$word[0]);
	
	echo $text . ' = ' . $search . '<br/>';
			
	$sql="UPDATE igs set search = '$search' where ID=$id";
	mysqli_query($con, $sql);		
}

$sql="update igs set search = replace(search, ']','');";
mysqli_query($con, $sql);

mysqli_close($con);

function convert($letter)
{
	 switch ($letter)
	{
		case 'a':
			  return 'ੳ';
		      break;
		case 'A':
		      return 'ਅ';
		      break;
		case 's':
		      return 'ਸ';
		      break;
		case 'S':
		      return 'ਸ਼';
		      break;
		case 'd':
		      return 'ਦ';
		      break;
		case 'D':
		      return 'ਧ';
		      break;
		case 'f':
		      return 'ਡ';
		      break;
		case 'F':
		      return 'ਢ';
		      break;
		case 'g':
		      return 'ਗ';
		      break;
		case 'G':
		      return 'ਘ';
		      break;
		case 'h':
		      return 'ਹ';
		      break;
//		case 'H':
//		      return '੍ਹ';
//		      break;
		case 'j':
		      return 'ਜ';
		      break;
		case 'J':
		      return 'ਝ';
		      break;
		case 'k':
		      return 'ਕ';
		      break;
		case 'K':
		      return 'ਖ';
		      break;
		case 'l':
		      return 'ਲ';
		      break;
		case 'L':
		      return 'ਲ਼';
		      break;
		case 'q':
		      return 'ਤ';
		      break;
		case 'Q':
		      return 'ਥ';
		      break;
//		case 'w':
//		      return 'ਾ';
//		      break;
//		case 'W':
//		      return 'ਾਂ';
//		      break;
		case 'e':
		      return 'ੲ';
		      break;
		case 'E':
//		      return 'ਓ';
		      return 'ੳ';
		      break;
		case 'r':
		      return 'ਰ';
		      break;
//		case 'R':
//        case '®':
//		      return '੍ਰ';
//		      break;
		case 't':
		      return 'ਟ';
		      break;
		case 'T':
		      return 'ਠ';
		      break;
//		case 'y':
//		      return 'ੇ';
//		      break;
//		case 'Y':
//		      return 'ੈ';
//		      break;
//		case 'u':
//		case 'ü':
//		      return 'ੁ';
//		      break;
//		case 'U':
//		      return 'ੂ';
//		      break;
//		case 'i':
//		      return 'ਿ';
//		      break;
//		case 'I':
//		      return 'ੀ';
//		      break;
//		case 'o':
//		      return 'ੋ';
//		      break;
//		case 'O':
//		      return 'ੌ';
//		      break;
		case 'p':
		      return 'ਪ';
		      break;
		case 'P':
		      return 'ਫ';
		      break;
		case 'z':
		      return 'ਜ਼';
		      break;
		case 'z':
		      return 'ਗ਼';
		      break;
		case 'Z':
		      return 'ਗ਼';
		      break;
		case 'x':
		      return 'ਣ';
		      break;
		case 'X':
		      return 'ਯ';
		      break;
		case 'c':
		      return 'ਚ';
		      break;
		case 'C':
		      return 'ਛ';
		      break;
		case 'v':
		      return 'ਵ';
		      break;
		case 'V':
		      return 'ੜ';
		      break;
		case 'b':
		      return 'ਬ';
		      break;
		case 'B':
		      return 'ਭ';
		      break;
		case 'n':
		      return 'ਨ';
		      break;
//		case 'N':
//		case 'ˆ':
//		      return 'ਂ';
//		      break;
		case 'm':
		      return 'ਮ';
		      break;
//		case 'M':
//        case 'µ':
//		      return 'ੰ';
//		      break;
//		case '`':
//		      return 'ੱ';
//		      break;
//        case 'Í':
//              return '੍ਵ'
//              break;
//        case 'ç':
//              return '੍ਚ'
//              break;
//        case '†':
//              return '੍ਟ'
//              break;
//        case 'œ':
//              return '੍ਤ'
//              break;
//        case '~':
//              return '੍ਨ'
//              break;
//        case '´':
//              return '੍ਯ'
//              break;
		case '1':
//		      return '੧';
		      return '';
		      break;
		case '2':
//		      return '੨';
		      return '';
		      break;
		case '3':
//		      return '੩';
		      return '';
		      break;
		case '4':
//		      return '੪';
		      return '';
		      break;
		case '5':
//		      return '੫';
		      return '';
		      break;
		case '6':
//		      return '੬';
		      return '';
		      break;
		case '^':
		      return 'ਖ਼';
		      break;
		case '7':
//		      return '੭';
		      return '';
		      break;
		case '&':
		      return 'ਫ਼';
		      break;
		case '8':
//		      return '੮';
		      return '';
		      break;
		case '9':
//		      return '੯';
		      return '';
		      break;
		case '0':
//		      return '੦';
		      return '';
		      break;
		case '\\':
		      return 'ਞ';
		      break;
		case '|':
		      return 'ਙ';
		      break;
		case ']':
//		      return '||';
			  return '';
		      break;
		case '<':
		      return 'ੴ';
		      break;
//		case 'Ú':
//		      return 'ਃ';
//		      break;
//        case '@':
//		      return '੍ਹ';
//		      break;
		default:
			return -1;
		  //return charToConvert;
	}
}

?>
</span>
</body>
</html>