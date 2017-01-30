<?php
	//add_exam.php
	//allows instructor to make a new exam from a list of available questions
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$sql = mysql_query("INSERT INTO Exams (exam_id, questions, ucid) VALUES ('$_POST[exam_id]', '$_POST[questions]', '$_POST[ucid]')");

	echo "true";

	mysql_close($dbh);
?>
