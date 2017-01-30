<?php
	//take_exam.php
	//gives all the exams associated with the student's sections
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$sql = mysql_query("SELECT * FROM Student WHERE ucid = '$_POST[ucid]'");

	$row1 = mysql_fetch_assoc($sql);

	$snames = explode(",",$row1["section_name"]);

	echo "{";

	foreach($snames as &$sname){
		
		$result = mysql_query("SELECT * FROM Section WHERE (section_name = '$sname')");

		$row2 = mysql_fetch_array($result);

		echo $row2["exam_id"];
	}
	
	echo "}";

	mysql_close($dbh);
?>
