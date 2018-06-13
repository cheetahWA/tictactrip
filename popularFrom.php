<?php
	if(!empty($_POST['ville'])){
	$ville = $_POST['ville'];
	$url = "http://www-uat.tictactrip.eu/api/cities/popular/from/" . $ville . "/5";
	$popularFrom = file_get_contents($url);
	$popularFromData = json_decode($popularFrom, true);

		foreach($popularFromData as $v2){
			echo ucfirst($v2['unique_name']).'<br>';
		}
		return true;
	}
?>