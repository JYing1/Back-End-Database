<?php
	//join_section.php
	//allows a student to join a section *updates the Section table*
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$old = mysql_query("SELECT * FROM Section WHERE (section_name = '$_POST[section_name]')");

	$row = mysql_fetch_assoc($old);

	$new = $row['student_id'].",".$_POST[ucid];

	$sql = mysql_query("UPDATE Section SET student_id = '$new' WHERE (section_name = '$_POST[section_name]')");

	echo "true";

	mysql_close($dbh);
?>
