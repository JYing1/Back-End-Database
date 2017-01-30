<?php
	//join_section2.php
	//allows a student to join a section *updates the Student table*
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$old = mysql_query("SELECT * FROM Student WHERE ucid = '$_POST[ucid]'");

	$row = mysql_fetch_assoc($old);

	$new = $row["section_name"] . "," . $_POST[section_name];

	$sql = mysql_query("UPDATE Student SET section_name = '$new' WHERE (ucid = '$_POST[ucid]')");

	echo "true";

	mysql_close($dbh);
?>
