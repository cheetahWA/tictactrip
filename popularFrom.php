<?php
	if(!empty($_POST['ville'])){
	$ville = $_POST['ville'];
	$url = "http://www-uat.tictactrip.eu/api/cities/popular/from/" . $ville . "/5";
	$popularFrom = file_get_contents($url);
	$popularFromData = json_decode($popularFrom, true);
		echo '<h4>Choisissez une gare de retour</h4>';
		echo '<div class="topCityToTitle">Depuis '. $ville .'</div>';
		echo '<ul class="topCityList">';
		foreach($popularFromData as $v2){
			echo '<li class="selectCityTo"><i class="fas fa-map-marker"></i>' . ucfirst($v2['unique_name']) . '</li><br>';
		}
		echo '</ul>';
		return true;
	}
?>