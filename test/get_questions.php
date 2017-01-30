<?php
	//get_questions1.php
	//gives all the questions in the database
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
	
	$result = mysql_query("SELECT * FROM Questions");
	$temp = "{";
	while($row = mysql_fetch_array($result)){
		$temp = $temp."\"".$row['question_number']."\"".":".$row['json1'].$row['json2'].$row['json3'].$row['json4'].$row['json5'].$row['json6'].$row['json7'].$row['json8'].$row['json9'].$row['json10'].",";
	}
	$temp = substr($temp,0,-1)."}";

	echo $temp;
	
	mysql_close($dbh);
?>
