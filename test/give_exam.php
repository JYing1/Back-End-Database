<?php
	//give_exam.php
	//assigns a section an exam
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$old = mysql_query("SELECT * FROM Section WHERE section_name = '$_POST[section_name]'");

	$row = mysql_fetch_assoc($old);

	$new = $row["exam_id"] . "," . $_POST[exam_id];

	$sql = mysql_query("UPDATE Section SET exam_id = '$new' WHERE (section_name = '$_POST[section_name]')");
	
	$sql2 = mysql_query("INSERT INTO Time(section_name, exam_id, test_time) VALUES ('$_POST[section_name]', '$_POST[exam_id]', '$_POST[test_time]')");

	echo "true";

	mysql_close($dbh);
?>
