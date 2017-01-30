<?php
	//student_login.php
	//checks if the student's credentials matches the database's
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
  
	$ucid = $_POST[ucid];
	$password = $_POST[password];
	$hashpass = md5($password);

	$sql = mysql_query("SELECT * FROM Student WHERE ucid = '$ucid' AND password = '$hashpass'");
	$num_rows = mysql_num_rows($sql);

	if ($num_rows == 1){
		echo "true";
	}
	else{
		echo "false";
	}

	mysql_close($dbh);
?>
