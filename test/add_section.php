<?php
	//add_section.php
	//allows an instructor to create a new section *updates the Section table*
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$sql = "INSERT INTO Section (section_name, instructor_id) VALUES ('$_POST[section_name]', '$_POST[ucid]');";

	if (!mysql_query($sql, $dbh)) {
		die('Error: ' . mysql_error());
	}

	echo "true";

	mysql_close($dbh);
?>
