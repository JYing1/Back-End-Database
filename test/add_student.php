<?php
	//add_student.php
	//creates a new student
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
  
	$password = $_POST[password];
	$hashpass = md5($password);
  
	$sql = mysql_query("INSERT INTO Student(ucid, password) VALUES ('$_POST[ucid]', '$hashpass')");

	if (!mysql_query($sql, $dbh)) {
		die('Error: ' . mysql_error());
	}

	echo "true";

	mysql_close($dbh);
?>
