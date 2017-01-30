<?php
	//add_question.php
	//allows an instructor to add a new question to the question bank
	$dbhost = "sql.njit.edu";
	$dbuser = "jy74";
	//$dbpass = ""; hidden
	$dbh = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL.");
	$dbname = "jy74";
	$selected = mysql_select_db($dbname, $dbh);

	$json = ($_POST["json"]);

	if (strlen($json) <= 250){	//length <= 250 
		$json1 = $json;
		$json = "";
	}
	else{
		$json1 = substr($json, 0, 250);
		$json = substr($json, 250, strlen($json));
	}
	
	if (strlen($json) == 0){	//250<length<501
		$json2 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json2 = $json;
			$json = "";
		}
		else{
			$json2 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}

	if (strlen($json) == 0){	//500<length<751
		$json3 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json3 = $json;
			$json = "";
		}
		else{
			$json3 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}

	if (strlen($json) == 0){	//750<length<1001
		$json4 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json4 = $json;
			$json = "";
		}
		else{
			$json4 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}

	if (strlen($json) == 0){	//1000<length<1251
		$json5 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json5 = $json;
			$json = "";
		}
		else{
			$json5 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}

	if (strlen($json) == 0){	//1250<length<1501
		$json6 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json6 = $json;
			$json = "";
		}
		else{
			$json6 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}

	if (strlen($json) == 0){	//1500<length<1751
		$json7 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json7 = $json;
			$json = "";
		}
		else{
			$json7 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}

	if (strlen($json) == 0){	//1750<length<2001
		$json8 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json8 = $json;
			$json = "";
		}
		else{
			$json8 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}


	if (strlen($json) == 0){	//2000<length<2251
		$json9 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json9 = $json;
			$json = "";
		}
		else{
			$json9 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}


	if (strlen($json) == 0){	//2250<length<2501
		$json10 = "";
	}
	else{
		if (strlen($json) <= 250){
			$json10 = $json;
			$json = "";
		}
		else{
			$json10 = substr($json, 0, 250);
			$json = substr($json, 250, strlen($json));
		}
	}

	$sql = mysql_query("INSERT INTO Questions(json1, json2, json3, json4, json5, json6, json7, json8, json9, json10) VALUES ('$json1', '$json2', '$json3', '$json4', '$json5', '$json6', '$json7', '$json8', '$json9', '$json10');");

	echo "true";

	mysql_close($dbh);
?>
