<?php
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
  
	$ucid = $_POST["ucid"];
	$password = $_POST["password"];
	$hashpass = md5($password);

	$sql_one = mysql_query("SELECT * FROM UCID WHERE ucid = '$ucid'");
	$num_rows_one = mysql_num_rows($sql_one);
	if ($num_rows_one == 0){
		echo "This UCID was not found in our database. Please try again.";
	}
	elseif ($num_rows_one == 1){
		$sql_two = mysql_query("SELECT * FROM UCID WHERE ucid = '$ucid' AND password = '$hashpass'");
		$num_rows_two = mysql_num_rows($sql_two);
		if ($num_rows_two == 0) {
			echo "This UCID and password combination was not found in our database. Please try again.";
		}
		elseif ($num_rows_two == 1){
			echo "This UCID matches the password in our database. Welcome.";
		}
		else{
			echo ("We dun goofed.");
		}
	}
	else{
		echo ("We dun goofed.");
	}
	
	mysql_close($dbh);
?>
