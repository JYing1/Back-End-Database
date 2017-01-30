<?php
	//get_sections.php
	//allows the user to get the sections they are associated with
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$temp = "{";

	if ($_POST[type] == "instructor"){
		$sql1 = mysql_query("SELECT * FROM Section WHERE (instructor_id = '$_POST[ucid]')");
		while ($row1 = mysql_fetch_array($sql1)){
			$temp = $temp.$row1['section_name'].",";
		}
		$temp = substr($temp,0,-1)."}";
	}
	
	else{
		$sql2 = mysql_query("SELECT * FROM Student WHERE (ucid = '$_POST[ucid]')");
		$row2 = mysql_fetch_array($sql2);
		$temp = $temp.substr($row2['section_name'],1)."}";
	}

	echo $temp;

	mysql_close($dbh);
?>
