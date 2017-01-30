<?php
	//release_exam.php
	//allows instructor to release an exam so that students can check their grade
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
 
	$sql = mysql_query("UPDATE Answers SET release_grade = 1 WHERE (section_name = '$_POST[section_name]') AND (exam_id = '$_POST[exam_id]')");

	echo "true";

	mysql_close($dbh);
?>
