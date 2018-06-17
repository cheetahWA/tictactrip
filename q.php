<?php
	if(!empty($_POST['q'])){
	$q = $_POST['q'];
	$type = ucfirst($_POST['type']);
	$url = "http://www-uat.tictactrip.eu/api/cities/autocomplete/?q=" . $q;
	$popularFrom = file_get_contents($url);
	$popularFromData = json_decode($popularFrom, true);
		if($type == "from"){
			echo '<h4>Choisissez une gare de départ</h4>';
		}
		else{
			echo '<h4>Choisissez une gare de retour</h4>';
		}
		
		echo '<ul class="topCityList">';
		$i = 0;
		foreach($popularFromData as $v2){
			echo '<li class="selectCity'. $type .'"><i class="fas fa-map-marker"></i>' . ucfirst($v2['unique_name']) . '</li><br>';
			$i++;
			if($i > 5){
				break;
			}
		}
		echo '</ul>';
		return true;
	}
?>