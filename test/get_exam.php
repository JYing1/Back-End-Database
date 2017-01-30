<?php
	//get_exam.php
	//gives all the questions and weights of the scores and the time associated with the exam id 
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$sql = mysql_query("SELECT * FROM Exams WHERE (exam_id = '$_POST[exam_id]')");
	$sql2 = mysql_query("SELECT * FROM Time WHERE (exam_id = '$_POST[exam_id]') AND (section_name = '$_POST[section_name]')");
	
	$row1 = mysql_fetch_assoc($sql);
	$row2 = substr($row1['questions'],1,-1);
	$row3 = mysql_fetch_assoc($sql2);
	
	$qnums = explode(",",$row2);

	echo "{";
	
	foreach($qnums as &$qnum){
		$count = 1;

		while($qnum{$count} != "\""){
			$count = $count + 1;
		}
		
		$temp = substr($qnum, 2, $count);
    		$result2 = mysql_query("SELECT * FROM Questions WHERE (question_number = '$temp')");
		
		while($row = mysql_fetch_array($result2)){
			echo "\"";
			echo $row['question_number'];
			echo "\":";
			echo $row['json1'].$row['json2'].$row['json3'].$row['json4'].$row['json5'].$row['json6'].$row['json7'].$row['json8'].$row['json8'].$row['json10'];
			echo ",";
		}
	}
	
	echo "\"weight\":{";
	$replace = array("{","}");
	echo str_replace($replace,"",$row2);
	
	echo "},\"time\":\"";
	echo $row3["test_time"];
	echo "\"}";

	mysql_close($dbh);
?>
