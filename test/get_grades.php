<?php
	//get_grades.php
	//gives all the grades from all the exams that student has taken
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
	
	$result = mysql_query("SELECT * FROM Answers WHERE (ucid = '$_POST[ucid]')");
	$temp = "{";
	while ($row = mysql_fetch_assoc($result)){
		$temp = $temp."\"".$row['exam_id']."\":";
		if ($row['release_grade'] == 1){
			$temp = $temp.$row['grade'];
		}

		else{
			$temp = $temp."-1";
		}
		$temp = $temp.",";
	}
	$temp = substr($temp,0,-1)."}";

	echo $temp;
	
	mysql_close($dbh);
?>
