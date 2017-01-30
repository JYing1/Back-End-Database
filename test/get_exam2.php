<?php
	//get_exam2.php
	//gives every single exam id
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
	
	$result = mysql_query("SELECT * FROM Exams");
	
	$temp = "{";
	while($row = mysql_fetch_array($result)){
		$temp = $temp.$row['exam_id'].",";
	}
	echo substr($temp,0,-1)."}";

	mysql_close($dbh);
?>
