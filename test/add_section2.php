<?php
	//add_section2.php
	//allows an instructor to create a new section *updates the Instructor table*
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$old = mysql_query("SELECT * FROM Instructor WHERE ucid = '$_POST[ucid]'");

	$row = mysql_fetch_assoc($old);

	$new = $row["section_name"] . "," . $_POST[section_name];

	$sql = "UPDATE Instructor SET section_name = '$new' WHERE (ucid = '$_POST[ucid]')";

	if (!mysql_query($sql, $dbh)) {
		die('Error: ' . mysql_error());
	}

	echo "true";

	mysql_close($dbh);
?>
