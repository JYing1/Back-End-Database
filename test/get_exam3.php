<?php
	//get_exam3.php
	//takes all the sections of the student and give all the exam names associated with that section
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);
	
	$sql1 = mysql_query("SELECT * FROM Student WHERE (ucid = '$_POST[ucid]')");
	$row1 = mysql_fetch_array($sql1);
	$sections = explode(",",substr($row1["section_name"],1));
	echo "{";
	
	foreach ($sections as $section){
		$temp = "";
		$sql2 = mysql_query("SELECT * FROM Section WHERE (section_name = '$section')");
		$row2 = mysql_fetch_array($sql2);
		if ($row2 != ''){

			$exams = explode(",",substr($row2["exam_id"],1));
			foreach ($exams as $taken){
				$sql3 = mysql_query("SELECT * FROM Answers WHERE (ucid = '$_POST[ucid]') AND (section_name = '$section') AND (exam_id = '$taken')");
				if (mysql_num_rows($sql3) == 0){
					$temp = $temp.$taken.",";
				}
			}
			if ($temp != ""){
				echo $section.":".substr($temp,0,-1).";";
			}
		}
	}
	echo "}";

	mysql_close($dbh);
?>
