<?php
	//get_answers.php
	//allows a student to view their solutions to the exams they took
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
	
	$result = mysql_query("SELECT * FROM Answers WHERE (exam_id = '$_POST[exam_id]') AND (ucid = '$_POST[ucid]')");
	$row = mysql_fetch_assoc($result);

	if ($row['release_grade'] == 1){
		echo "{\"input\":".$row['json1'].$row['json2'].$row['json3'].$row['json4'].$row['json5'].$row['json6'].$row['json7'].$row['json8'].$row['json9'].$row['json10'].",\"credit\":".$row['credit']."}";
	}

	else{
		echo "false";
	}
	
	mysql_close($dbh);
?>
